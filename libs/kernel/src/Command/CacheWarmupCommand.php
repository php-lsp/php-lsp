<?php

declare(strict_types=1);

namespace Lsp\Kernel\Command;

use Lsp\Kernel\Kernel;
use Lsp\Kernel\LanguageServerKernel;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('cache:warmup', description: 'Warm up an empty cache', aliases: ['warmup'])]
final class CacheWarmupCommand extends Command
{
    #[\Override]
    protected function configure(): void
    {
        $this->addArgument(
            name: 'kernel',
            mode: InputArgument::OPTIONAL,
            description: 'An application kernel class FQN',
            default: LanguageServerKernel::class,
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

        $kernel = $input->getArgument('kernel');

        if (!\is_string($kernel) && !\is_a($kernel, Kernel::class, true)) {
            throw new \InvalidArgumentException('Unsupported kernel class');
        }

        $app = new $kernel(
            // @phpstan-ignore-next-line
            env: (string) $input->getOption('env'),
            debug: true,
            // @phpstan-ignore-next-line
            projectDirectory: (string) $input->getOption('root'),
        );

        $output->writeln(\vsprintf('Cache Directory: <comment>%s</comment>', [
            // @phpstan-ignore-next-line
            (string) $app->container->getParameter('kernel.build_dir'),
        ]));

        $output->writeln('<info>Finished</info>');

        return self::SUCCESS;
    }
}
