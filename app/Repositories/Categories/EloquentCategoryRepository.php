<?php

namespace jps\Repositories\Categories;

use jps\Repositories\EloquentRepository;
use jps\Repositories\Categories\CategoryRepositoryInterface;
use jps\Entities\Categories\Category;

/**
 * Class EloquentCategoryRepository
 */
class EloquentCategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{

	private $model;

	public function __construct(Category $model)
	{
		$this->model = $model;
	}

	/**
	 * Find a category by id
	 * eager loading products associated with 
	 * that category
	 * 
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findByIdWithProducts($id)
	{
		return $this->model->find($id)->with('product')->get();
	}

	/**
	 * Find a category by sluge eager loading
	 * products associated with that category
	 * 
	 * @param  [type] $slug [description]
	 * @return [type]       [description]
	 */
	public function findBySlugWithProducts($slug)
	{
		return $this->model->where('slug', $slug)
						   ->with('product')->get();
	}

	/**
	 * Create new category, persist it on the database
	 * and return that category instance
	 * 
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public function create(array $data)
	{
		return Category::create([
			'name'			=> $data['name'],
			'description'	=> $data['description']
		]);
	}

	public function update(array $data)
	{
		return Category::update($data);
	}
}