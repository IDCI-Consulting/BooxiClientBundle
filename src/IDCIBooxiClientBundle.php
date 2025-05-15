<?php

namespace IDCI\Bundle\BooxiClientBundle;

use IDCI\Bundle\BooxiClientBundle\DependencyInjection\Compiler\CachePoolInjectionCompilerPass;
use IDCI\Bundle\BooxiClientBundle\DependencyInjection\Compiler\EightPointsGuzzleClientInjectionCompilerPass;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class IDCIBooxiClientBundle extends AbstractBundle
{
    protected string $extensionAlias = 'idci_booxi_client';

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->scalarNode('guzzle_http_client_service_alias')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('cache_pool_service_alias')->defaultValue(null)->cannotBeEmpty()->end()
                ->scalarNode('api_key')->defaultValue(null)->end()
                ->scalarNode('partner_key')->defaultValue(null)->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.yaml');

        $container->parameters()->set(sprintf('%s.guzzle_http_client_service_alias', $this->extensionAlias), $config['guzzle_http_client_service_alias']);
        $container->parameters()->set(sprintf('%s.cache_pool_service_alias', $this->extensionAlias), $config['cache_pool_service_alias']);
        $container->parameters()->set(sprintf('%s.api_key', $this->extensionAlias), $config['api_key']);
        $container->parameters()->set(sprintf('%s.partner_key', $this->extensionAlias), $config['partner_key']);
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container
            ->addCompilerPass(new EightPointsGuzzleClientInjectionCompilerPass())
            ->addCompilerPass(new CachePoolInjectionCompilerPass())
        ;
    }
}
