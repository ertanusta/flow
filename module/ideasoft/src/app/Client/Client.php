<?php

namespace Ideasoft\Client;

use Ideasoft\Contracts\Client\ClientInterface;
use Ideasoft\Models\Authentication;
use Illuminate\Support\Facades\Http;

class Client implements ClientInterface
{
    public function cGet(Authentication $authentication, $endpoint, $query): array
    {
        // TODO: Implement cGet() method.
    }

    public function get(Authentication $authentication, $endpoint, $id): array
    {
        // TODO: Implement get() method.
    }

    public function post(Authentication $authentication, $endpoint, $data): array
    {
        // TODO: Implement post() method.
    }

    public function put(Authentication $authentication, $endpoint, $id, $data): array
    {
        $url = "https://" . $authentication->domain . "$endpoint/$id";
        return Http::withToken($authentication->access_token)->put(
            $url, $data
        )->throw()->json();
    }

    public function delete(Authentication $authentication, $endpoint, $id): array
    {
        // TODO: Implement delete() method.
    }
}
