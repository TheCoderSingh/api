<?php

namespace Alunos\Households\Queries;

use Alunos\Households\Models\HouseholdActivity;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class GetHouseholdActivities
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $announcements = HouseholdActivity
            ::where('household_id', $args['household_id'])
            ->orderByDesc('created_at')
            ->paginate(
                $args['limit'],
                ['*'],
                'page',
                $args['page']
            );

        return [
            'total' => $announcements->total(),
            'items' => $announcements->items()
        ];
    }
}
