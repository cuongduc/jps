<?php

namespace jps\Http\Controllers\Admin;

use Illuminate\Http\Request;
use jps\Http\Requests;
use jps\Http\Controllers\Controller;
use jps\Repositories\Users\EloquentUserRepository as UserRepo;

class DashboardController extends Controller
{
    protected $users;

    public function __construct(UserRepo $userRepo)
    {
    	$this->users = $userRepo;
    }

    public function index()
    {
    	# code...
    }
}
