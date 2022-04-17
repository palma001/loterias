<?php

namespace App\Http\Controllers\Login;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Login extends BaseAuthResolver
{
    /**
        * @OA\Post(
        *   path="/api/authentication/login",
        *   tags={"Authentication"},
        *   summary="Authentication",
        *   operationId="Authentication",
        *   @OA\Parameter(
        *      name="username",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="string"
        *      )
        *   ),
        *   @OA\Parameter(
        *      name="password",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *          type="string"
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
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request)
    {
        $credentials = $this->buildCredentials($request->all());
        $response = $this->makeRequest($credentials);
        $user = $this->findUser($request->all()['username']);
        $this->validateUser($user);
        return array_merge(
            $response,
            [
                'user' => $user
            ]
        );
    }

    protected function validateUser($user)
    {
        $authModelClass = $this->getAuthModelClass();
        if ($user instanceof $authModelClass && $user->exists) {
            return;
        }

        throw (new ModelNotFoundException())->setModel(
            get_class($this->makeAuthModelInstance())
        );
    }

    protected function getAuthModelClass(): string
    {
        return config('auth.providers.users.model');
    }

    protected function makeAuthModelInstance()
    {
        $modelClass = $this->getAuthModelClass();

        return new $modelClass();
    }

    protected function findUser(string $username)
    {
        $model = $this->makeAuthModelInstance();

        if (method_exists($model, 'findForPassport')) {
            return $model->findForPassport($username);
        }

        return $model->where('username', $username)->first();
    }
}
