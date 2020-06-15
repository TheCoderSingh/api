<?php

use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = \Alunos\Users\Models\User::create([
           'email' => 'walterbgneto@gmail.com',
           'password' => bcrypt(123456),
           'email_verified_at' => \Carbon\Carbon::now(),
           'phone_verified_at' => \Carbon\Carbon::now(),
           'phone' => '+16047261070',
           'first_name' => 'Walter',
           'last_name' => 'Barros Galvao Neto',
           'display_name' => 'Jack',
        ]);

        $homestay = \Alunos\Households\Models\Household::create([
            'name' => "Leonardo's Family",
            'type' => \Alunos\Households\Enums\HouseholdType::HOMESTAY,
            'address' => '3628 Glen Drive',
        ]);

        $homestay->save();

        $homestay->rules()->create([
           'description' => 'There are no rules :)'
        ]);

        $homestay->members()->create([
           'user_id' => $user->id,
           'household_id' => $homestay->id,
           'is_permanent' => false,
           'is_admin' => false,
        ]);

        // $this->call(UserSeeder::class);
    }
}
