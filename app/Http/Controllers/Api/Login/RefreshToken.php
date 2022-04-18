<?php

namespace App\Http\Controllers\Api\Login;

use Illuminate\Http\Request;

class RefreshToken extends BaseAuthResolver
{
    /**
        * @OA\Post(
        *   path="/api/authentication/refresh-token",
        *   tags={"Authentication"},
        *   summary="RefreshToken",
        *   operationId="RefreshToken",
        *   @OA\Parameter(
        *      name="refresh_token",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="string"
        *      )
        *   ),
        *   @OA\Response(
        *      response=200,
        *       description="Success",
        *      @OA\MediaType(
        *           mediaType="application/json",
        *      )
        *   ),
        *   @OA\Response(
        *      response=401,
        *       description="Unauthenticated"
        *   ),
        *   @OA\Response(
        *      response=400,
        *      description="Bad Request"
        *   ),
        *   @OA\Response(
        *      response=404,
        *      description="not found"
        *   ),
        *   @OA\Response(
        *      response=403,
        *      description="Forbidden"
        *   )
        * )
    */
    /**
     * Return a value for the field.
     * @return mixed
     */
    public function refreshToken(Request $request)
    {
        $credentials = $this->buildCredentials($request->all(), 'refresh_token');

        return $this->makeRequest($credentials);
    }
}
