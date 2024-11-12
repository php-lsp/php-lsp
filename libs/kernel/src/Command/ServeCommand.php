<?php

declare(strict_types=1);

namespace Lsp\Kernel\Command;

use Lsp\Kernel\ServerKernelInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('serve', description: 'Starts the PHP Language Server', aliases: ['run'])]
final class ServeCommand extends KernelAwareCommand
{
    #[\Override]
    protected function configure(): void
    {
        parent::configure();

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
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $title = \vsprintf('PHP Language Server (tcp://%s:%d)', [
            // @phpstan-ignore-next-line
            (string) $input->getOption('addr'),
            // @phpstan-ignore-next-line
            (int) $input->getOption('port'),
        ]);

        $output->writeln('Running <info>' . $title . '</info>');

        $this->setProcessTitle($title);

        $app = $this->getKernel($input);

        if (!$app instanceof ServerKernelInterface) {
            throw new \InvalidArgumentException('Unsupported server kernel class: ' . $app::class);
        }

        $app->run(
            // @phpstan-ignore-next-line
            port: (int) $input->getOption('port'),
            // @phpstan-ignore-next-line
            host: (string) $input->getOption('addr'),
        );

        return self::SUCCESS;
    }
}
