<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager;

use Lsp\Extension\DocumentManager\Controller\DocumentChangeController;
use Lsp\Extension\DocumentManager\Controller\DocumentCloseController;
use Lsp\Extension\DocumentManager\Controller\DocumentOpenController;
use Lsp\Extension\DocumentManager\Controller\DocumentSaveController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\AbstractExtension;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

final class DocumentManagerExtension extends AbstractExtension
{
    /**
     * @var list<class-string>
     */
    private const CONTROLLERS = [
        DocumentOpenController::class,
        DocumentCloseController::class,
        DocumentSaveController::class,
        DocumentChangeController::class,
    ];

    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        foreach (self::CONTROLLERS as $controller) {
            $builder->register($controller, $controller)
                ->addTag('lsp.controller')
                ->addTag('lsp.controller.instance');
        }
    }
}
