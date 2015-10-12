<?php

namespace jps\Jobs;

use jps\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use jps\Repositories\Users\EloquentUserRepository as UserRepo;

class ActivateUserAccountJob extends Job implements SelfHandling
{
    private $code;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepo $users)
    {
        $user = $users->findByActivationCode($this->code);

        if (!$user)
            return false;
        
        // If a user is activable
        // then activate and log that user in
        if ($this->canBeActivated($user)) {
            auth()->login($user);

            return true;
        }

        return false;
    }

    /**
     * Determine whether a user is activable 
     * or not
     * 
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    protected function canBeActivated($user)
    {
        return $user->update(['activation_token' => '', 'active' => true]);
    }
}
