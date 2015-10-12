<?php

namespace jps\Jobs;

use jps\Jobs\Job;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

class AuthenticateUserJob extends Job implements SelfHandling
{
    protected $email, $password, $active, $remember;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $password, $active, $remember)
    {
        $this->email        = $email;
        $this->password     = $password;
        $this->active       = $active;
        $this->remember     = $remember;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Guard $auth)
    {
        $credentails = [
            'email'     => $this->email,
            'password'  => $this->password,
            'active'    => $this->active
        ];

        return $auth->attempt($credentails, $this->remember);
    }
}
