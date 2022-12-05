<?php

declare(strict_types=1);

namespace Auth0\Symfony;

use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Auth0\SDK\Contract\StoreInterface;
use Auth0\SDK\Store\CookieStore;
use Auth0\Symfony\Contracts\Security\ServiceInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;

final class Service implements ServiceInterface
{
    private ?Auth0 $sdk = null;

    public function __construct(
        private SdkConfiguration $configuration,
        private LoggerInterface $logger
    )
    {
    }

    public function getSdk()
    {
        if (null === $this->sdk) {
            $this->sdk = new Auth0($this->getConfiguration());
        }

        return $this->sdk;
    }

    public function getConfiguration(): ?SdkConfiguration
    {
        return $this->configuration;
    }

    public function getStore(): ?StoreInterface
    {
        if (null === $this->store) {
            $this->store = new CookieStore($this->getConfiguration());
        }

        return $this->store;
    }

    public function getCache(): ?CacheItemPoolInterface
    {
        return $this->cache;
    }
}