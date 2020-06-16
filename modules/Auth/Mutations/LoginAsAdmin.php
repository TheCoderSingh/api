<?php

namespace Alunos\Auth\Mutations;

use Alunos\Admins\Models\Admin;
use Alunos\Auth\Traits\InteractsWithOauth;
use App\Exceptions\ValidationException;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LoginAsAdmin
{
    use InteractsWithOauth;

    /**
     * Return a value for the field.
     *
     * @param $rootValue
     * @param array $payload
     * @param GraphQLContext $context
     * @param ResolveInfo $resolveInfo
     * @return mixed
     * @throws \Exception
     */
    public function __invoke($rootValue, array $payload, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $credentials = Arr::only($payload['credentials'], ['email', 'password']);

        $admin = Admin
           ::with('user')
            ->whereHas('user', fn(Builder $query) => $query->where('email', $credentials['email']))
            ->first();

        if ($admin === null) {
            throw ValidationException::withMessages(['validation' => 'Invalid credentials']);
        }

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages(['validation' => 'Invalid credentials 2']);
        }

        $token = $this->requestPasswordGrant(
            $credentials['email'],
            $credentials['password']
        );

        return [
            'token' => [
                'token_type' => $token['token_type'],
                'expires_in' => $token['expires_in'],
                'access_token' => $token['access_token'],
                'refresh_token' => $token['refresh_token'],
            ],
            'admin' => $admin,
        ];
    }
}
