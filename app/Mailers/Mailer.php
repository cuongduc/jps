<?php

namespace jps\Mailers;

use jps\Mailers\Contracts\MailerInterface;

class Mailer implements MailerInterface
{

	public function sendTo($user, $subject, $view, $data = [])
	{
		$mailer = app('Illuminate\Mail\Mailer');

		$mailer->queue($view, $data, function($message) use ($user, $subject) {
			$message->to($user->email)->subject($subject);
		});
	}

	/**
	 * Send account activation email to user
	 * 
	 * @param  [type] $user [description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function sendAccountActivationEmail($user, $code)
	{
		$subject = trans('mailer.account_activation_subject');
		$view	 = 'emails.auth.account_activation';
		$data	 = ['activation_link' => route('auth::activate', $code)];
		$this->sendTo($user, $subject, $view, $data);
	}

}