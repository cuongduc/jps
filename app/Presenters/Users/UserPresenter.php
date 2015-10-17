<?php

namespace jps\Presenters\Users;

use jps\Presenters\Presenter;

/**
 * Class UserPresenter
 *
 * Author: CuongDD
 */
class UserPresenter extends Presenter
{	
	/**
	 * Get the link for avatar image of user
	 * @return [type] [description]
	 */
	public function avatar()
	{
		return route('/').$this->profile->avatar;
	}
	/**
	 * Return the join date of user
	 * @return [type] [description]
	 */
	public function joinDate()
	{
		return $this->created_at->format('l jS \\of F Y h:i:s A');
	}
}