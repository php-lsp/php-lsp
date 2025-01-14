<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager;

use Lsp\Extension\DocumentManager\ArgumentResolver\EditorArgumentResolver;
use Lsp\Extension\DocumentManager\Controller\DocumentChangeController;
use Lsp\Extension\DocumentManager\Controller\DocumentCloseController;
use Lsp\Extension\DocumentManager\Controller\DocumentOpenController;
use Lsp\Extension\DocumentManager\Controller\DocumentSaveController;
use Lsp\Extension\DocumentManager\Editor\Document\DocumentFactory;
use Lsp\Extension\DocumentManager\Editor\Document\DocumentFactoryInterface;
use Lsp\Extension\DocumentManager\Editor\Document\UriFactory;
use Lsp\Extension\DocumentManager\Editor\Document\UriFactoryInterface;
use Lsp\Extension\DocumentManager\Editor\EditorProvider;
use Lsp\Extension\DocumentManager\Editor\EditorProviderInterface;
use Lsp\Server\ConnectionProviderInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class DocumentManagerExtension implements CompilerPassInterface
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

    public function process(ContainerBuilder $container): void
    {
        $this->registerServices($container);
        $this->registerEditorArgumentResolver($container);
        $this->registerControllers($container);
    }

    private function registerServices(ContainerBuilder $container): void
    {
        $container->register(UriFactoryInterface::class, UriFactory::class);

        $container->register(DocumentFactoryInterface::class, DocumentFactory::class)
            ->setArgument('$factory', new Reference(UriFactoryInterface::class));
    }

    private function registerEditorArgumentResolver(ContainerBuilder $container): void
    {
        $container->register(EditorProviderInterface::class, EditorProvider::class)
            ->setArgument('$connections', new Reference(ConnectionProviderInterface::class));

        $container->register(EditorArgumentResolver::class, EditorArgumentResolver::class)
            ->setArgument('$provider', new Reference(EditorProviderInterface::class))
            ->addTag('lsp.dispatcher.argument_resolver');
    }

    private function registerControllers(ContainerBuilder $container): void
    {
        foreach (self::CONTROLLERS as $controller) {
            $container->register($controller, $controller)
                ->setAutowired(true)
                ->addTag('lsp.controller')
                ->addTag('lsp.controller.instance');
        }
    }
}
