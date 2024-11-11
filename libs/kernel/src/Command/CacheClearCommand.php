<?php

declare(strict_types=1);

namespace Lsp\Kernel\Command;

use Lsp\Kernel\LanguageServerKernel;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('cache:clear', description: 'Clear an application cache', aliases: ['clear'])]
final class CacheClearCommand extends Command
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
            default: ($directory = \getcwd()) === false ? '.' : $directory,
        );
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Clearing outdated cache directory</info>');
        $output->writeln(\vsprintf(' - Using project directory: <comment>%s</comment>', [
            // @phpstan-ignore-next-line
            (string) $input->getOption('root'),
        ]));

        $app = new LanguageServerKernel(
            // @phpstan-ignore-next-line
            env: (string) $input->getOption('env'),
            debug: true,
            // @phpstan-ignore-next-line
            projectDirectory: (string) $input->getOption('root'),
        );

        $files = new \RecursiveIteratorIterator(
            iterator: new \RecursiveDirectoryIterator(
                // @phpstan-ignore-next-line
                directory: (string) $app->container->getParameter('kernel.build_dir'),
                flags: \FilesystemIterator::SKIP_DOTS,
            ),
            mode: \RecursiveIteratorIterator::CHILD_FIRST,
        );

        /** @var \SplFileInfo $info */
        foreach ($files as $info) {
            /** @var non-empty-string $pathname */
            $pathname = $info->getRealPath();

            if ($info->isDir()) {
                $output->writeln(\sprintf(' - Directory <comment>%s</comment>', $pathname));
                \rmdir($info->getRealPath());
            } else {
                $output->writeln(\sprintf(' - File <comment>%s</comment>', $pathname));
                \unlink($info->getRealPath());
            }
        }

        $output->writeln('<info>Finished</info>');

        return self::SUCCESS;
    }
}
