<?php

namespace jps\Repositories;

abstract class EloquentRepository {

	/**
	 * Get all instances of the model
	 * 
	 * return Model
	 */
	public function getAll()
	{
		return $this->model->all();
	}

	public function countAll()
	{
		return $this->model->count();
	}

	public function findById($id)
	{
		return $this->model->findOrFail($id);
	}

	public function findBySlug($slug)
	{
		return $this->model->where('slug', $slug)->firstOrFail();
	}
}