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
    private AdapterInterface $cache;
    private string $partnerKey;
    private ?ClientInterface $httpClient = null;

    public function __construct(
        LoggerInterface $logger,
        AdapterInterface $cache,
        string $partnerKey,
    ) {
        $this->logger = $logger;
        $this->cache = $cache;
        $this->partnerKey = $partnerKey;
    }

    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    public function getMerchant()
    {
        $response = $this->httpClient->request('GET', 'merchant/', [
            'headers' => [
                'Booxi-PartnerKey' => $this->partnerKey,
            ],
        ]);

        dd($response);

        return $response;
    }
}