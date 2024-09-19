<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Composer\InstalledVersions;
use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\RequestFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Rpc\Codec\Codec;
use Lsp\Rpc\Codec\Decoder;
use Lsp\Rpc\Codec\DecoderFacade;
use Lsp\Rpc\Codec\Encoder;
use Lsp\Rpc\Codec\EncoderFacade;
use Lsp\Rpc\Codec\JsonRPC\Signature;
use Lsp\Rpc\Codec\RequestDecoder;
use Lsp\Rpc\Codec\RequestEncoder;
use Lsp\Rpc\Codec\ResponseDecoder;
use Lsp\Rpc\Codec\ResponseEncoder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;

final class CodecCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!self::isPackageInstalled()) {
            return;
        }

        $this->registerDefaultParameters($container);

        $this->registerEncoder($container);
        $this->registerDecoder($container);

        $this->registerRequestDecoder($container);
        $this->registerRequestEncoder($container);

        $this->registerResponseDecoder($container);
        $this->registerResponseEncoder($container);
    }

    private function registerDefaultParameters(ContainerBuilder $container): void
    {
        $container->setParameter('lsp.codec.json.decoding_flags', Decoder::DEFAULT_JSON_FLAGS_DECODE);
        $container->setParameter('lsp.codec.json.encoding_flags', Encoder::DEFAULT_JSON_FLAGS_ENCODE);
        $container->setParameter('lsp.codec.json.max_depth', Codec::DEFAULT_JSON_DEPTH);
        $container->setParameter('lsp.codec.json.signature', Signature::ALL);
    }

    private static function isPackageInstalled(): bool
    {
        return \class_exists(InstalledVersions::class)
            && InstalledVersions::isInstalled('php-lsp/rpc-codec-jsonrpc');
    }

    private function registerDecoder(ContainerBuilder $container): void
    {
        $container->register(DecoderFacade::class)
            ->setClass(DecoderFacade::class)
            ->addArgument(new Reference(RequestFactoryInterface::class))
            ->addArgument(new Reference(ResponseFactoryInterface::class))
            ->addArgument(new Reference(IdFactoryInterface::class))
            ->addArgument(new Parameter('lsp.codec.json.decoding_flags'))
            ->addArgument(new Parameter('lsp.codec.json.max_depth'))
            ->addArgument(new Parameter('lsp.codec.json.signature'));

        $container->setAlias(DecoderInterface::class, DecoderFacade::class);
        $container->setAlias('lsp.codec.decoder', DecoderFacade::class);
    }

    private function registerEncoder(ContainerBuilder $container): void
    {
        $container->register(EncoderFacade::class)
            ->setClass(EncoderFacade::class)
            ->addArgument(new Parameter('lsp.codec.json.encoding_flags'))
            ->addArgument(new Parameter('lsp.codec.json.max_depth'))
            ->addArgument(new Parameter('lsp.codec.json.signature'));

        $container->setAlias(EncoderInterface::class, EncoderFacade::class);
        $container->setAlias('lsp.codec.encoder', EncoderFacade::class);
    }

    private function registerRequestDecoder(ContainerBuilder $container): void
    {
        $container->register(RequestDecoder::class)
            ->setClass(RequestDecoder::class)
            ->setFactory([new Reference(DecoderFacade::class), 'getRequestDecoder']);

        $container->setAlias('lsp.codec.request_decoder', RequestDecoder::class);
    }

    private function registerRequestEncoder(ContainerBuilder $container): void
    {
        $container->register(RequestEncoder::class)
            ->setClass(RequestEncoder::class)
            ->setFactory([new Reference(EncoderFacade::class), 'getRequestEncoder']);

        $container->setAlias('lsp.codec.request_encoder', RequestEncoder::class);
    }

    private function registerResponseDecoder(ContainerBuilder $container): void
    {
        $container->register(ResponseDecoder::class)
            ->setClass(ResponseDecoder::class)
            ->setFactory([new Reference(DecoderFacade::class), 'getResponseDecoder']);

        $container->setAlias('lsp.codec.response_decoder', ResponseDecoder::class);
    }

    private function registerResponseEncoder(ContainerBuilder $container): void
    {
        $container->register(ResponseEncoder::class)
            ->setClass(ResponseEncoder::class)
            ->setFactory([new Reference(EncoderFacade::class), 'getResponseEncoder']);

        $container->setAlias('lsp.codec.response_encoder', ResponseEncoder::class);
    }
}
