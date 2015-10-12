<?php

namespace jps\Entities\Users;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
	/**
     * The table used by the model
     * 
     * @var string
     */
    protected $table = 'user_profiles';

     /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['address', 'district', 'city', 'telephone',
    						'birthday', 'avatar'];

    /**
     * Each profile is associated with a user
     *
     * The default foreign key is user_id
     * 
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->belongsTo(\jps\Entities\Users\User::class);
    }
}
