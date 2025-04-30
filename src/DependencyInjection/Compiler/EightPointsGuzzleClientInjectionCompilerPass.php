<?php

namespace IDCI\Bundle\BooxiClientBundle\DependencyInjection\Compiler;

// use IDCI\Bundle\BooxiClientBundle\Client\BooxiApiClient;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class EightPointsGuzzleClientInjectionCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $guzzleHttpClientServiceAlias = $container->getParameter('idci_booxi_client.guzzle_http_client_service_alias');

        $httpClientDefinition = $container->findDefinition($guzzleHttpClientServiceAlias);
        // $booxiClientDefinition = $container->findDefinition(BooxiApiClient::class);
        // $booxiClientDefinition->addMethodCall('setHttpClient', [$httpClientDefinition]);
    }
}