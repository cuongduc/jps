<?php

namespace jps\Listeners;

use jps\Events\UserAccountWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use jps\Mailers\Mailer;

class UserEventListener
{
    private $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle UserAccountWasCreated event
     * 
     * @param  UserAccountWasCreated $event [description]
     * @return [type]                       [description]
     */
    public function onUserAccountCreated(UserAccountWasCreated $event)
    {
        $this->mailer->sendAccountActivationEmail($event->user, $event->user->activation_token);     
    }

    /**
     * Subscribe listener for event
     * 
     * @param  Dispatcher $events [description]
     * @return [type]             [description]
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            \jps\Events\UserAccountWasCreated::class,
            'jps\Listeners\UserEventListener@onUserAccountCreated'
        );
    }
}
