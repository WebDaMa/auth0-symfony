<?php

declare(strict_types=1);

namespace Auth0\Symfony\Contracts\Security;

use Auth0\Symfony\Contracts\ServiceInterface;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;

interface AuthorizerInterface extends AuthenticatorInterface
{
    public function getService(): ServiceInterface;

    public function getConfiguration(): array;


}
