<?php

use Illuminate\Database\Seeder;
use jps\Entities\Users\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
    		'name'			=> 'customer',
    		'display_name'	=> trans('role.customer_role_display_name'),
    		'description'	=> trans('role.admin_description')
    	]);
        Role::create([
    		'name'			=> 'admin',
    		'display_name'	=> trans('role.admin_role_display_name'),
    		'description'	=> trans('role.admin_description')
    	]);
        Role::create([
    		'name'			=> 'sale',
    		'display_name'	=> trans('role.sale_role_display_name'),
    		'description'	=> trans('role.sale_role_description')
        ]);
    }
}
