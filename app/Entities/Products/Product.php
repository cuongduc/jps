<?php

namespace jps\Entities\Products;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

/**
 * Class Product
 *
 * Author: CuongDD
 */
class Product extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'products';

    protected $fillable = [
    	'name', 'slug', 'description', ''
    ]
}
