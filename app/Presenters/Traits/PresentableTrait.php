<?php

namespace jps\Presenters\Traits;

use jps\Presenters\Exceptions\PresenterException;

trait PresentableTrait
{
	/**
	 * Single presenter instance for all instances
	 * of the model
	 * 
	 * @var [type]
	 */
	protected $presenterInstance;

	public function present()
	{
		// Check if the presenter property has been declared in 
		// the model and the class exists
		if (!$this->presenter or !class_exists($this->presenter)) {
			throw new PresenterException('Please set the Presenter path in your model');
		}
	}

	// Singleton pattern
	if (!$this->presenterInstance)
	{
		$this->presenterInstance = new $this->presenter($this);
	}

	return $this->presenterInstance;
}