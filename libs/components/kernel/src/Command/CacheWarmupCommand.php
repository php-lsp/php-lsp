<?php

declare(strict_types=1);

namespace Lsp\Kernel\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('cache:warmup', description: 'Warm up an empty cache', aliases: ['warmup'])]
final class CacheWarmupCommand extends KernelAwareCommand
{
    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Clearing outdated cache directory</info>');
        $output->writeln(\vsprintf(' - Using project directory: <comment>%s</comment>', [
            // @phpstan-ignore-next-line
            (string) $input->getOption('root'),
        ]));

        $app = $this->getKernel($input);

        $buildDirectory = $app->container->getParameter('kernel.build_dir');
        $output->writeln(\vsprintf('Cache Directory: <comment>%s</comment>', [
            \is_scalar($buildDirectory) ? (string) $buildDirectory : 'unknown',
        ]));

        $output->writeln('<info>Finished</info>');

        return self::SUCCESS;
    }
}
