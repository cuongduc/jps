<?php

namespace jps\Mailers\Contracts;

interface MailerInterface {

	/**
	 * Sened an email to specific user
	 * 
	 * @param  [type] $user    [description]
	 * @param  [type] $subject [description]
	 * @param  [type] $view    [description]
	 * @param  array  $data    [description]
	 * @return [type]          [description]
	 */
	public function sendTo($user, $subject, $view, $data = []);

	/**
	 * Send account activation email to user
	 * 
	 * @param  [type] $user [description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function sendAccountActivationEmail($user, $code);
}