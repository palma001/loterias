<?php

namespace App\Http\Controllers\Login;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class BaseAuthResolver
{
    /**
     * @param array  $args
     * @param string $grantType
     *
     * @return mixed
     */
    public function buildCredentials(array $args = [], $grantType = 'password')
    {
        $args = collect($args);
        $args['client_id'] = $args->get('client_id', config('passport.personal_access_client.id'));
        $args['client_secret'] = $args->get('client_secret', config('passport.personal_access_client.secret'));
        $args['grant_type'] = $grantType;
        return $args->toArray();
    }
    /**
     * @param array $args
     *
     * @throws AuthenticationException
     *
     * @return mixed
     */
    public function makeRequest(array $credentials)
    {
        $request = Request::create('/oauth/token',
            'POST',
            $credentials,
            [], // cookies
            [], // files
            [
                'HTTP_Accept' => 'application/json',
            ]
        );
        $response = app()->handle($request);
        $decodedResponse = json_decode($response->getContent(), true);
        
        if ($response->getStatusCode() != 200) {
            throw new AuthenticationException($decodedResponse['message']);
        }

        return $decodedResponse;
    }
}
