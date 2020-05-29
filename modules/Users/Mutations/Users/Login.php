<?php

namespace Alunos\Users\Mutations\Users;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Login
{
    /**
     * Return a value for the field.
     *
     * @param $rootValue
     * @param array $args
     * @param GraphQLContext $context
     * @param ResolveInfo $resolveInfo
     * @return mixed
     */
    public function byPhone($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {

    }
}
