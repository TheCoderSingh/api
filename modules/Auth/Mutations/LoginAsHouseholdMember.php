<?php

namespace Alunos\Auth\Mutations;

use Alunos\Auth\Traits\InteractsWithOauth;
use Alunos\Households\Models\Household;
use Alunos\Households\Models\HouseholdMember;
use Alunos\Users\Models\User;
use App\Exceptions\ValidationException;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LoginAsHouseholdMember
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
        $data = Crypt::decrypt($payload['token']);
        $this->validateTokenExpiration($data['expire_at']);
        $user = $this->getUser($data['user_id']);
        $householdMember = $this->getHouseholdMember($data['household_id'], $data['user_id']);

        $token = $this->requestPasswordGrant(
            $user->email,
            $user->password
        );

        return [
            'token' => [
                'token_type' => $token['token_type'],
                'expires_in' => $token['expires_in'],
                'access_token' => $token['access_token'],
                'refresh_token' => $token['refresh_token'],
            ],
            'member' => $householdMember
        ];
    }

    /**
     * @param string $expireAt
     */
    private function validateTokenExpiration(string $expireAt)
    {
        if (Carbon::parse($expireAt)->lt(Carbon::now())) {
            throw ValidationException::withMessages(['validation' => 'Token expired']);
        }
    }

    /**
     * @param int $userId
     * @return User
     */
    private function getUser(int $userId)
    {
        $user = User::find($userId);

        if ($user === null) {
            throw ValidationException::withMessages(['validation' => 'User not found']);
        }

        return $user;
    }

    /**
     * @param int $householdId
     * @return Household
     */
    private function getHouseholdMember(int $householdId, int $userId)
    {
        $member = HouseholdMember
            ::where('household_id', $householdId)
            ->where('user_id', $userId)
            ->first();

        if ($member === null) {
            throw ValidationException::withMessages(['validation' => 'Household not found']);
        }

        return $member;
    }
}
