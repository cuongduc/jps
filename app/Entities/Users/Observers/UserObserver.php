<?php

namespace jps\Entities\Users\Observers;

use jps\Entities\Users\User;
use jps\Entities\Users\Role;
use jps\Entities\Users\UserProfile;

class UserObserver 
{
	/**
	 * Upon a user is created, create profile
	 * that is associated with that user.
	 * 
	 * @param  User   $user [description]
	 * @return [type]       [description]
	 */
	public function created(User $user)
	{
		$user->profile()->save(new UserProfile());

		/**
		 * Default user is customer
		 */
		$role = Role::where('name', 'customer')->firstOrFail();
		$user->attachRole($role);
		$user->save();
	}

	/**
	 * When a user is deleted, delete the 
	 * associated profile
	 * 
	 * @param  User   $user [description]
	 * @return [type]       [description]
	 */
	public function deleting(User $user)
	{
		$user->profile()->delete();
	}
}