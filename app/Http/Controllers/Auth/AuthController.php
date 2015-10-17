<?php

namespace jps\Http\Controllers\Auth;

use jps\Http\Controllers\Controller;
use jps\Http\Requests\AccountRegistrationRequest;
use jps\Http\Requests\CreateNewSessionRequest;
use jps\Jobs\RegisterUserAccountJob;
use jps\Jobs\AuthenticateUserJob;
use jps\Jobs\ActivateUserAccountJob;

class AuthController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show account registration form
     * 
     * @return [type] [description]
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Process user registration
     * 
     * @param  AccountRegistrationRequest $request [description]
     * @return [type]                              [description]
     */
    public function postRegister(AccountRegistrationRequest $request)
    {
        if ($this->dispatchFrom(RegisterUserAccountJob::class, $request)) {
            return redirect()->route('home');
        }

        return redirect()->route('auth::register');
    }

    /**
     * Show login form
     * 
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Log user in with provided credentials
     * by dispatching AuthenticateUserJob
     * 
     * @param  CreateNewSessionRequest $request [description]
     * @return [type]                           [description]
     */
    public function postLogin(CreateNewSessionRequest $request)
    {
        if ($this->dispatchFrom(AuthenticateUserJob::class, $request, [
            'active'    => 1,
            'remember'  => $request->has('remember'),
        ])) {
            flash()->success(trans('authentication.login_success'));
            return redirect()->intended('/');
        }

        session()->flash('login_error', trans('authentication.login_error'));
        return redirect()->route('auth::login')
                         ->withInput($request->only('email', 'remember'));
    }

    /**
     * Log user out
     * 
     * @return [type] [description]
     */
    public function logout()
    {
        auth()->logout();
        flash()->success(trans('authentication.logout_success'));
        return redirect()->home();
    }

    /**
     * Activate user account by dispatching
     * ActivateUserAccount Job
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function activate($code)
    {
        if ($this->dispatch(new ActivateUserAccountJob($code))) {
            flash()->success(trans('authentication.activation_success'));
            return redirect()->home();
        }

        flash()->error(trans('authentication.activation_error'));
        return redirect()->home();
    }
}
