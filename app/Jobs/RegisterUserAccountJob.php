<?php

namespace jps\Jobs;

use jps\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use jps\Events\UserAccountWasCreated;
use jps\Repositories\Users\EloquentUserRepository as User;

class RegisterUserAccountJob extends Job implements SelfHandling
{
    protected $name, $email, $password;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password)
    {
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(User $userRepo)
    {
        $data = [
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => $this->password
        ];

        $user = $userRepo->create($data);

        if (!$user)
            return false;

        event(new UserAccountWasCreated($user));
        return true;
    }
}
