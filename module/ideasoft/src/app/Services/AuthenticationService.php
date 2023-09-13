<?php

namespace Ideasoft\Services;

use Ideasoft\Contracts\Services\AuthenticationServiceInterface;
use Ideasoft\Exceptions\ResourceNotFoundException;
use Ideasoft\Models\Authentication;

class AuthenticationService implements AuthenticationServiceInterface
{
    private AuthenticationServiceInterface $authenticationService;

    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function getById($id): Authentication
    {
        /** @var Authentication|null $authentication */
        $authentication = $this->authenticationService->getById($id);
        if ($authentication) {
            return $authentication;
        }
        throw new ResourceNotFoundException("$id does not exist");
    }

}
