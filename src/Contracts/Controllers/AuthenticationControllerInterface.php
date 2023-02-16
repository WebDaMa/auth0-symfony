<?php

declare(strict_types=1);

namespace Auth0\Symfony\Contracts\Controllers;

use Auth0\SDK\Auth0;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface AuthenticationControllerInterface
{
    public function login(Request $request): Response;

    public function logout(Request $request): Response;

    public function callback(Request $request): Response;
}
