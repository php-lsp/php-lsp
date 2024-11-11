<?php

declare(strict_types=1);

namespace Lsp\Kernel\Command;

use Lsp\Kernel\LanguageServerKernel;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('cache:warmup', description: 'Warm up an empty cache', aliases: ['warmup'])]
final class CacheWarmupCommand extends Command
{
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
            default: \getcwd() ?: '.',
        );
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Clearing outdated cache directory</info>');
        $output->writeln(\vsprintf(' - Using project directory: <comment>%s</comment>', [
            $input->getOption('root'),
        ]));

        $app = new LanguageServerKernel(
            env: $input->getOption('env'),
            debug: true,
            projectDirectory: $input->getOption('root'),
        );

        $output->writeln(\vsprintf('Cache Directory: <comment>%s</comment>', [
            $app->container->getParameter('kernel.build_dir'),
        ]));

        $output->writeln('<info>Finished</info>');

        return self::SUCCESS;
    }
}
