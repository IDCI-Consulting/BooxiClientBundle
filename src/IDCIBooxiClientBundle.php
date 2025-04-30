<?php

namespace IDCI\Bundle\BooxiClientBundle;

use IDCI\Bundle\BooxiClientBundle\DependencyInjection\Compiler\CachePoolInjectionCompilerPass;
use IDCI\Bundle\BooxiClientBundle\DependencyInjection\Compiler\EightPointsGuzzleClientInjectionCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class IDCIBooxiClientBundle extends AbstractBundle
{
    protected string $extensionAlias = 'idci_booxi_client';

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->scalarNode('api_key')->end()
                ->scalarNode('partner_key')->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.yaml');

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