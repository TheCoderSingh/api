<?php

namespace Alunos\Households\Providers;

use Alunos\Households\Enums\HouseholdType;
use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use Nuwave\Lighthouse\Schema\Types\LaravelEnumType;

class GraphQLServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param TypeRegistry $typeRegistry
     * @return void
     */
    public function boot(TypeRegistry $typeRegistry): void
    {
        $typeRegistry->register(new LaravelEnumType(HouseholdType::class));
    }
}
