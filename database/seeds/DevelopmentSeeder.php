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
        $tenant = $this->createTenant();
        $this->createAdmins($tenant);
        $this->createHousehold($tenant);


        // $this->call(UserSeeder::class);
    }

    private function createTenant()
    {
        return \Alunos\Tenants\Models\Tenant::create([
           'name' => 'Langara',
           'domain' => 'langara',
        ]);
    }

    private function createAdmins(\Alunos\Tenants\Models\Tenant $tenant)
    {
        $user = \Alunos\Users\Models\User::create([
            'email' => 'admin@langara.com',
            'password' => bcrypt(123456),
            'email_verified_at' => \Carbon\Carbon::now(),
            'phone_verified_at' => \Carbon\Carbon::now(),
            'phone' => '+16047261070',
            'first_name' => 'Erik',
            'last_name' => 'Myers',
            'display_name' => 'Erik',
        ]);

        \Alunos\Admins\Models\Admin::create([
            'user_id' => $user->id,
            'tenant_id' => $tenant->id,
            'role' => 1,
        ]);
    }

    private function createHousehold(\Alunos\Tenants\Models\Tenant $tenant)
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

        $homestay->contracts()->create([
           'tenant_id' => $tenant->id,
        ]);

        $member = $homestay->members()->create([
            'user_id' => $user->id,
            'household_id' => $homestay->id,
            'is_permanent' => false,
            'is_admin' => false,
        ]);

        $homestay->rules()->create([
            'description' => 'There are no rules :)'
        ]);

        $announcements = [
            'Welcome junior to the household',
            'Eric birthday is coming up',
            'Be sure to use masks outside',
            'Fathers day is coming',
            'Fees are increasing next september',
            'We will have pizza for dinner next week',
            'A birthday party is coming up',
            'Barbecue this weekend',
            'RSVP for dinner party next weekend',
            'There is food in the fridge, we will be out today',
            'Have a good class everyone',
            'Tomorrow we will go to Burnaby',
            'Let us know any special requests for groceries',
            'I hope everyone is doing fine in this time of crisis',
        ];

        foreach ($announcements as $announcement) {
            $homestay->announcements()->create([
                'content' => $announcement,
                'household_member_id' => $member->id
            ]);
        }

        $activities = [
            'New issue reported',
            'New member joined',
            'Today is Johns birthday!'
        ];

        foreach ($activities as $activity) {
            $homestay->activities()->create([
                'description' => $activity
            ]);
        }

        $issues = [
            'Washroom sink clogged',
            'Noise during night',
            'Stop putting tomatoes on my lunch please',
        ];

        foreach ($issues as $issue) {
            $homestay->issues()->create([
                'description' => $issue,
                'household_member_id' => $member->id,
                'solved_at' => null
            ]);
        }
    }

}
