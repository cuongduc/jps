<?php

namespace jps\Console\Commands;

use Illuminate\Console\Command;
use jps\Entities\Users\User;
use jps\Entities\Users\Role;

class CreateAdminUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->isAdminExisted())
            return $this->error('Admin user is already existed');

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@jpori.com';
        $user->password = bcrypt('admin123');
        $user->active = true;
        $user->activation_token = null;
        $user->save();

        $admin = Role::where('name', 'admin')->firstOrFail();
        $customer = Role::where('name', 'customer')->firstOrFail();

        if ($user->hasRole('customer')) {
            $user->detachRole($customer);
            $user->attachRole($admin);
        } else {
            $user->attachRole($admin);
        }
        
        return $this->info('Admin user was successully initialized in the system');
    }

    protected function isAdminExisted() {
        return User::where('name', 'Admin')->first();
    }
}
