<?php

namespace Ideasoft\Services;

use Ideasoft\Contracts\Repository\AuthenticationRepositoryInterface;
use Ideasoft\Contracts\Services\AuthenticationServiceInterface;
use Ideasoft\Exceptions\ResourceNotFoundException;
use Ideasoft\Models\Authentication;

class AuthenticationService implements AuthenticationServiceInterface
{

    private AuthenticationRepositoryInterface $authenticationRepository;

    public function __construct(AuthenticationRepositoryInterface $authenticationRepository)
    {
        $this->authenticationRepository = $authenticationRepository;
    }

    public function getById($id): Authentication
    {
        /** @var Authentication|null $authentication */
        $authentication = $this->authenticationRepository->getById($id);
        if ($authentication) {
            return $authentication;
        }
        throw new ResourceNotFoundException("$id does not exist");
    }

    public function getByUserId($userId): Authentication
    {
        $authentication = $this->authenticationRepository->getByUserId($userId);
        if ($authentication) {
            return $authentication;
        }
        throw new ResourceNotFoundException("$userId to authentication does not exist");
    }

    public function refreshAccessToken(Authentication $authentication): Authentication
    {
        //todo: burası refresh edilecek expire_at e göre
        //önce bir reload et bakalım belki başkası yenilemiştir???
        return $authentication;
    }

}
