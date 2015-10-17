<?php

use Illuminate\Database\Seeder;
use jps\Entities\Users\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perms = ['owner', 'manage-user', 'manage-product'];

        foreach($perms as $perm) {
            $p = new Permission();
            $p->name = $perm;
            $p->save();
        }
    }
}
