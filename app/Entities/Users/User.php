<?php

namespace jps\Entities\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

/**
 * Class User
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract, SluggableInterface
{
    use Authenticatable, CanResetPassword, EntrustUserTrait, SluggableTrait;

    /**
     * The table used by the model
     * 
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'email', 'activation_token', 'slug', 'active'];

    /**
     * Unique slug for each user
     * 
     * @var array
     */
    protected $sluggable = ['build_from' => 'name', 'save_to' => 'slug'];
    /**
     * The attributes that are hidden
     * from JSON request responses
     * 
     * @var array
     */
    protected $hidden = ['password', 'activation_token', 'remember_token'];

    /**
     * Attributes that should be casted to native type
     * 
     * @var array
     */
    protected $casts = ['active' => 'boolean'];

    /**
     * Each user has a profile
     * 
     * @return mixed
     */
    public function profile()
    {
        return $this->hasOne(\jps\Entities\Users\UserProfile::class);
    }
}
