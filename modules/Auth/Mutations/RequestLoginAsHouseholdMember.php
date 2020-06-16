<?php

namespace Alunos\Auth\Mutations;

use Alunos\Auth\Traits\InteractsWithOauth;
use Alunos\Households\Models\HouseholdMember;
use App\Exceptions\ValidationException;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RequestLoginAsHouseholdMember
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
        $member = HouseholdMember
            ::with('user')
            ->whereHas('user', fn (Builder $query) => $query->where('email', $payload['email']))
            ->first();

        if ($member === null) {
            throw ValidationException::withMessages(['validation' => 'Invalid credentials']);
        }

        $token = Crypt::encrypt([
            'user_id' => $member->user->id,
            'household_id' => $member->household->id,
            'expire_at' => Carbon::now()->addHour()->toIso8601String(),
        ]);

        // @TODO Send email with token

        return true;
    }
}
