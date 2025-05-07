<?php

namespace IDCI\Bundle\BooxiClientBundle\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Serializer\SerializerInterface;

class BooxiApiClient
{
    private LoggerInterface $logger;
    private ?AdapterInterface $cache = null;
    private string $partnerKey;
    private ?ClientInterface $httpClient = null;

    public function __construct(
        LoggerInterface $logger,
        string $partnerKey,
    ) {
        $this->logger = $logger;
        $this->partnerKey = $partnerKey;
    }

    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    public function setCache(AdapterInterface $cache): void
    {
        $this->cache = $cache;
    }

    public function getMerchant()
    {
        $response = $this->httpClient->request('GET', 'merchant/', [
            'headers' => [
                'Booxi-PartnerKey' => $this->partnerKey,
            ],
        ]);

        return $response;
    }
}