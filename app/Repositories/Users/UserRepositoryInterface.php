<?php

namespace jps\Repositories\Users;

interface UserRepositoryInterface {

	public function getAll();

	public function countAll();

	public function findById($id);

	public function findBySlug($slug);

	public function findByActivationCode($code);

	public function create(array $data);

	public function updateProfile(array $data, $slug);
}