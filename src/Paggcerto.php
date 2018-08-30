<?php

namespace Paggcerto;

use Paggcerto\Auth\Auth;
use Paggcerto\Auth\AuthHash;
use Paggcerto\Auth\ToConnect;
use Paggcerto\Contracts\Authentication;
use Paggcerto\Service\AuthService;
use Paggcerto\Service\BankService;
use Paggcerto\Service\BusinessActivityService;
use Paggcerto\Service\BusinessTypeService;
use Paggcerto\Service\CityService;
use Paggcerto\Service\HolderAccountService;
use Paggcerto\Service\MarketingMediaService;
use Paggcerto\Service\RoleConceptService;
use Paggcerto\Service\RoleService;

class Paggcerto extends ToConnect
{
    const ACCOUNT_ENDPOINT_SANDBOX = "http://account.sandbox.paggcerto.com.br/api/";
    const ACCOUNT_ENDPOINT_PRODUCTION = "https://account.paggcerto.com.br/api/";
    const PAYMENTS_ENDPOINT_SANDBOX = "http://payments.sandbox.paggcerto.com.br/api/";
    const PAYMENTS_ENDPOINT_PRODUCTION = "https://payments.paggcerto.com.br/api/";
    const CLIENT = "PaggcertoPhpSdk";
    const CLIENT_VERSION = "0.0.1-beta";
    const APPLICATION_ID = "Lk";

    /**
     * Paggcerto constructor.
     * @param Authentication $paggcertoAuth
     * @param string $endpoint
     */
    public function __construct(Authentication $paggcertoAuth, $endpoint = Paggcerto::ACCOUNT_ENDPOINT_SANDBOX)
    {
        parent::__construct($paggcertoAuth, $endpoint);
        $this->createNewSession();

        if ($paggcertoAuth instanceof Auth) {
            $token = $this->authentication()->authCredentials($paggcertoAuth->getEmail(), $paggcertoAuth->getPassword())->token;
            $paggcertoAuth->setToken($token);
        }

        if ($paggcertoAuth instanceof AuthHash) {
            $token = $this->authentication()->authHash($paggcertoAuth->getHash())->token;
            $paggcertoAuth->setToken($token);
        }
    }

    /**
     * @return AuthService
     */
    public function authentication()
    {
        return new AuthService($this);
    }

    /**
     * @return HolderAccountService
     */
    public function account()
    {
        return new HolderAccountService($this);
    }

    /**
     * @return CityService
     */
    public function city()
    {
        return new CityService($this);
    }

    /**
     * @return BusinessTypeService
     */
    public function businessType()
    {
        return new BusinessTypeService($this);
    }

    /**
     * @return BankService
     */
    public function bank()
    {
        return new BankService($this);
    }

    /**
     * @return BusinessActivityService
     */
    public function businessActivity()
    {
        return new BusinessActivityService($this);
    }

    /**
     * @return MarketingMediaService
     */
    public function marketingMedia()
    {
        return new MarketingMediaService($this);
    }

    /**
     * @return RoleService
     */
    public function role()
    {
        return new RoleService($this);
    }

    /**
     * @return RoleConceptService
     */
    public function roleConcept()
    {
        return new RoleConceptService($this);
    }
}
