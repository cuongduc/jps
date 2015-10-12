<?php

namespace jps\Repositories\Users;

use jps\Entities\Users\User;
use jps\Entities\Users\Role;
use jps\Repositories\EloquentRepository;

/**
 * Class EloquentUserRepository
 */
class EloquentUserRepository extends EloquentRepository implements UserRepositoryInterface
{

	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	/**
	 * Retrieve a user by activation_token
	 * 
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function findByActivationCode($code)
	{
		return $this->model
					->where('activation_token', $code)
					->firstOrFail();
	}

	/**
	 * Create new user account
	 * 
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public function create(array $data)
	{
		/**
		 * Need to refine as $this->model->create(...)
		 * is not working properly
		 */
		$user = new User();

		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = bcrypt($data['password']);
		$user->activation_token = str_random(60);
		$user->active = false;

		$user->save();

		return $user;
	}

	public function updateProfile(array $data, $slug)
	{
		$user = $this->findBySlug($slug);
		$user->profile()->update($data);
	}
}