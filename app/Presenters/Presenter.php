<?php

namespace jps\Presenters;

/**
 * Class Presenter
 *
 * Author: CuongDD
 */
abstract class Presenter 
{
	/**
	 * The original model instance
	 * @var [type]
	 */
	protected $entity;

	function __construct($entity)
	{
		$this->entity = $entity;
	}

	/**
	 * Call a function if it exists
	 * otherwise, return the property of original model
	 * @param  [type] $property [description]
	 * @return [type]           [description]
	 */
	public function __get($property)
	{
		if(method_exists($this, $property))
		{
			return $this->{$property}();
		}

		return $this->entity->{$property}();
	}
}