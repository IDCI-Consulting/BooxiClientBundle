# IDCI Booxi Client Bundle

Symfony bundle that provides an api client for Booxi

## Installation

Install this bundle using composer :

```sh
composer require idci/booxi-client-bundle
```

## Configuration

### Create an Eightpoint Guzzle HTTP client

In the file `config/packages/eight_points_guzzle.yaml`, create a **Booxi API** client :

```yaml
eight_points_guzzle:
    clients:
        booxi_api:
            base_url: 'https://%env(resolve:BOOXI_HOST)%/booking/v1/'
```

### Configure a cache pool

Create a dedicated **Booxi** cache, or use any of your existing pools :

In the file `config/services.yaml`, register your cache pool :

```yaml
# Redis example
app.cache.adapter.redis.booxi:
    parent: 'cache.adapter.redis'
    tags:
        - { name: 'cache.pool', namespace: 'Booxi' }
```

In the file `config/packages/cache.yaml`, define your cache pool :

```yaml
framework:
    cache:
        # ...
        pools:
            cache.booxi:
                public: true
```

### Configure booxi-client-bundle

In `config/packages/`, create a `idci_booxi_client.yaml` file :

```yaml
idci_booxi_client:
    guzzle_http_client_service_alias: 'eight_points_guzzle.client.booxi_api'
    cache_pool_service_alias: 'cache.booxi'
    api_key: '%env(string:BOOXI_API_KEY)%'
    partner_key: '%env(string:BOOXI_PARTNER_KEY)%'
```

Then, add these environment variable in your `.env` file :

```
###> idci/booxi-client-bundle ###
BOOXI_HOST='api.booxi.eu'
BOOXI_API_KEY=
BOOXI_PARTNER_KEY=
###< idci/booxi-client-bundle ###
```

To retrieve more informations about SAM API, go to [Booxi API](https://api.booxi.com/doc/booking.html) or [EU Booxi API](https://api.booxi.eu/doc/booking.html).