<?php

namespace Ideasoft\Contracts\Client;

use Ideasoft\Models\Authentication;

interface ClientInterface
{
    public function cGet(Authentication $authentication, $endpoint, $query): array;

    public function get(Authentication $authentication, $endpoint, $id): array;

    public function post(Authentication $authentication, $endpoint, $data): array;

    public function put(Authentication $authentication, $endpoint, $id, $data): array;

    public function delete(Authentication $authentication, $endpoint, $id): array;
}
