<?php

namespace Alunos\Profiles\Providers;

use Illuminate\Support\ServiceProvider;
use Alunos\Profiles\Enums\ContactType;
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
        $typeRegistry->register(new LaravelEnumType(ContactType::class));
    }
}
