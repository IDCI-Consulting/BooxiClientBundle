<?php

namespace IDCI\Bundle\BooxiClientBundle\DependencyInjection\Compiler;

use IDCI\Bundle\BooxiClientBundle\Client\BooxiApiClient;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CachePoolInjectionCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $cachePoolServiceAlias = $container->getParameter('idci_booxi_client.cache_pool_service_alias');

        if (null !== $cachePoolServiceAlias) {
            $cachePoolDefinition = $container->findDefinition($cachePoolServiceAlias);
            $booxiClientDefinition = $container->findDefinition(BooxiApiClient::class);
            $booxiClientDefinition->addMethodCall('setCache', [$cachePoolDefinition]);
        }
    }
}