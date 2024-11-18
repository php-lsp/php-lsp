<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection\EventDispatcher;

use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

final class EventListenerLoaderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $this->registerEventListener($container);
    }

    private function registerEventListener(ContainerBuilder $container): void
    {
        $container->registerAttributeForAutoconfiguration(
            attributeClass: AsEventListener::class,
            configurator: $this->configureEventListener(...),
        );
    }

    private function configureEventListener(ChildDefinition $def, AsEventListener $attr, \Reflector $reflector): void
    {
        $tagAttributes = \get_object_vars($attr);

        if ($reflector instanceof \ReflectionMethod) {
            if (isset($tagAttributes['method'])) {
                throw new LogicException(\sprintf(
                    'AsEventListener attribute cannot declare a method on "%s::%s()".',
                    $reflector->class,
                    $reflector->name,
                ));
            }

            $tagAttributes['method'] = $reflector->getName();
        }

        $def->addTag('kernel.event_listener', $tagAttributes);
    }
}
