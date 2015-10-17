<?php

namespace jps\Repositories\Categories;

interface CategoryRepositoryInterface {

	public function getAll();

	public function countAll();

	public function findById($id);

	public function findBySlug($slug);

	public function findByIdWithProducts($id);

	public function findBySlugWithProducts($id);

	public function create(array $data);

	public function update(array $data);
}