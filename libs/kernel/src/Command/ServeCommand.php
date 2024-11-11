<?php

declare(strict_types=1);

namespace Lsp\Kernel\Command;

use App\Application;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('serve', description: 'Starts the PHP Language Server', aliases: ['run'])]
final class ServeCommand extends Command
{
    /**
     * @param non-empty-string|null $name
     */
    public function __construct(
        ?string $name = null,
    ) {
        parent::__construct($name);
    }


    #[\Override]
    protected function configure(): void
    {
        $this->addOption(
            name: 'addr',
            shortcut: 'a',
            mode: InputOption::VALUE_OPTIONAL,
            description: 'The TCP host on which the server is running',
            default: $_SERVER['LSP_ADDR'] ?? '127.0.0.1',
        );

        $this->addOption(
            name: 'port',
            shortcut: 'p',
            mode: InputOption::VALUE_OPTIONAL,
            description: 'The TCP port on which the server is running',
            default: $_SERVER['LSP_PORT'] ?? 0,
        );

        $this->addOption(
            name: 'env',
            shortcut: 'e',
            mode: InputOption::VALUE_OPTIONAL,
            description: 'Sets an environment name to run the command in',
            default: $_SERVER['APP_ENV'] ?? 'prod',
        );

        $this->addOption(
            name: 'root',
            shortcut: 'r',
            mode: InputOption::VALUE_OPTIONAL,
            description: 'Sets an application root directory',
            default: \getcwd() ?: '.',
        );
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $title = \vsprintf('PHP Language Server (tcp://%s:%d)', [
            $input->getOption('addr'),
            $input->getOption('port'),
        ]);

        $output->writeln('Running <info>' . $title . '</info>');

        $this->setProcessTitle($title);

        $app = new Application(
            env: $input->getOption('env'),
            debug: false,
            projectDirectory: $input->getOption('root'),
        );

        $app->run(
            port: (int) $input->getOption('port'),
            host: (string) $input->getOption('addr'),
        );

        return self::SUCCESS;
    }
}
