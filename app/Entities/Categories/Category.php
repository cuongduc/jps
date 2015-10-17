<?php

namespace jps\Entities\Categories;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use jps\Presenters\Traits\PresentableTrait;

/**
 * Class Category
 *
 * Author: CuongDD
 */
class Category extends Model implements SluggableInterface
{
    use SluggableTrait, PresentableTrait;

    /**
     * The table used by the model
     * 
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'description', 'slug'];

    /**
     * Unique slug for each category
     * 
     * @var array
     */
    protected $sluggable = ['build_from' => 'name', 'save_to' => 'slug'];

    /**
     * The presenter for the model
     * @var [type]
     */
    protected $presenter = \jps\Presenters\Categories\CategoryPresenter::class;
    /**
     * [products description]
     * @return [type] [description]
     */
    public function products()
    {
    	return $this->hasMany(\jps\Entities\Products\Product::class);
    }
}
