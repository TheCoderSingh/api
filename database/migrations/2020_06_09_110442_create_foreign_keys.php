<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('domains', function(Blueprint $table) {
			$table->foreign('tenant_id')->references('id')->on('tenants')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
        Schema::table('profile', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
		Schema::table('profile', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('profile', function(Blueprint $table) {
			$table->foreign('language_id')->references('id')->on('languages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('profile_hobbies', function(Blueprint $table) {
			$table->foreign('profile_id')->references('id')->on('profile')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('profile_foods', function(Blueprint $table) {
			$table->foreign('profile_id')->references('id')->on('profile')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('profile_foods', function(Blueprint $table) {
			$table->foreign('food_id')->references('id')->on('foods')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('household_members', function(Blueprint $table) {
			$table->foreign('household_id')->references('id')->on('households')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('household_members', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('admins', function(Blueprint $table) {
			$table->foreign('tenant_id')->references('id')->on('tenants')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('admins', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('household_activities', function(Blueprint $table) {
			$table->foreign('household_id')->references('id')->on('households')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('household_issues', function(Blueprint $table) {
			$table->foreign('household_id')->references('id')->on('households')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('household_issues', function(Blueprint $table) {
			$table->foreign('household_member_id')->references('id')->on('household_members')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tips', function(Blueprint $table) {
			$table->foreign('tenant_id')->references('id')->on('tenants')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('household_rooms', function(Blueprint $table) {
			$table->foreign('household_id')->references('id')->on('households')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('household_rules', function(Blueprint $table) {
			$table->foreign('household_id')->references('id')->on('households')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('household_announcements', function(Blueprint $table) {
			$table->foreign('household_id')->references('id')->on('households')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('household_announcements', function(Blueprint $table) {
			$table->foreign('household_member_id')->references('id')->on('household_members')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('plans', function(Blueprint $table) {
			$table->foreign('tenant_id')->references('id')->on('tenants')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->foreign('tenant_id')->references('id')->on('tenants')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->foreign('household_id')->references('id')->on('households')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->foreign('plan_id')->references('id')->on('plans')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->foreign('admin_id')->references('id')->on('admins')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('profile_contacts', function(Blueprint $table) {
			$table->foreign('profile_id')->references('id')->on('profile')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('guardianship', function(Blueprint $table) {
			$table->foreign('guardian_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('guardianship', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('countries', function(Blueprint $table) {
			$table->foreign('language_id')->references('id')->on('languages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('contracts', function(Blueprint $table) {
			$table->foreign('household_id')->references('id')->on('households')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('contracts', function(Blueprint $table) {
			$table->foreign('tenant_id')->references('id')->on('households')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('domains', function(Blueprint $table) {
			$table->dropForeign('domains_tenant_id_foreign');
		});
        Schema::table('profile', function(Blueprint $table) {
            $table->dropForeign('profile_user_id_foreign');
        });
		Schema::table('profile', function(Blueprint $table) {
			$table->dropForeign('profile_country_id_foreign');
		});
		Schema::table('profile', function(Blueprint $table) {
			$table->dropForeign('profile_language_id_foreign');
		});
		Schema::table('profile_hobbies', function(Blueprint $table) {
			$table->dropForeign('profile_hobbies_profile_id_foreign');
		});
		Schema::table('profile_foods', function(Blueprint $table) {
			$table->dropForeign('profile_foods_profile_id_foreign');
		});
		Schema::table('profile_foods', function(Blueprint $table) {
			$table->dropForeign('profile_foods_food_id_foreign');
		});
		Schema::table('household_members', function(Blueprint $table) {
			$table->dropForeign('household_members_household_id_foreign');
		});
		Schema::table('household_members', function(Blueprint $table) {
			$table->dropForeign('household_members_user_id_foreign');
		});
		Schema::table('admins', function(Blueprint $table) {
			$table->dropForeign('admins_tenant_id_foreign');
		});
		Schema::table('admins', function(Blueprint $table) {
			$table->dropForeign('admins_user_id_foreign');
		});
		Schema::table('household_activities', function(Blueprint $table) {
			$table->dropForeign('household_activities_household_id_foreign');
		});
		Schema::table('household_issues', function(Blueprint $table) {
			$table->dropForeign('household_issues_household_id_foreign');
		});
		Schema::table('household_issues', function(Blueprint $table) {
			$table->dropForeign('household_issues_household_member_id_foreign');
		});
		Schema::table('tips', function(Blueprint $table) {
			$table->dropForeign('tips_tenant_id_foreign');
		});
		Schema::table('household_rooms', function(Blueprint $table) {
			$table->dropForeign('household_rooms_household_id_foreign');
		});
		Schema::table('household_rules', function(Blueprint $table) {
			$table->dropForeign('household_rules_household_id_foreign');
		});
		Schema::table('household_announcements', function(Blueprint $table) {
			$table->dropForeign('household_announcements_household_id_foreign');
		});
		Schema::table('household_announcements', function(Blueprint $table) {
			$table->dropForeign('household_announcements_household_member_id_foreign');
		});
		Schema::table('plans', function(Blueprint $table) {
			$table->dropForeign('plans_tenant_id_foreign');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->dropForeign('allocations_tenant_id_foreign');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->dropForeign('allocations_user_id_foreign');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->dropForeign('allocations_household_id_foreign');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->dropForeign('allocations_plan_id_foreign');
		});
		Schema::table('allocations', function(Blueprint $table) {
			$table->dropForeign('allocations_admin_id_foreign');
		});
		Schema::table('profile_contacts', function(Blueprint $table) {
			$table->dropForeign('profile_contacts_profile_id_foreign');
		});
		Schema::table('guardianship', function(Blueprint $table) {
			$table->dropForeign('guardianship_guardian_id_foreign');
		});
		Schema::table('guardianship', function(Blueprint $table) {
			$table->dropForeign('guardianship_user_id_foreign');
		});
		Schema::table('countries', function(Blueprint $table) {
			$table->dropForeign('countries_language_id_foreign');
		});
		Schema::table('contracts', function(Blueprint $table) {
			$table->dropForeign('contracts_household_id_foreign');
		});
		Schema::table('contracts', function(Blueprint $table) {
			$table->dropForeign('contracts_tenant_id_foreign');
		});
	}
}
