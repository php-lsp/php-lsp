<?php

declare(strict_types=1);

namespace Lsp\Kernel\Command;

use Lsp\Kernel\Kernel;
use Lsp\Kernel\LanguageServerKernel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

abstract class KernelAwareCommand extends Command
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

    /**
     * @api
     */
    protected function getKernel(InputInterface $input): Kernel
    {
        $kernel = $input->getArgument('kernel');

        if (!\is_string($kernel)) {
            throw new \InvalidArgumentException('Unsupported kernel argument');
        }

        if (!\is_a($kernel, Kernel::class, true)) {
            throw new \InvalidArgumentException('Unsupported kernel class: ' . $kernel);
        }

        return new $kernel(
            // @phpstan-ignore-next-line
            env: (string) $input->getOption('env'),
            debug: true,
            // @phpstan-ignore-next-line
            projectDirectory: (string) $input->getOption('root'),
        );
    }
}
