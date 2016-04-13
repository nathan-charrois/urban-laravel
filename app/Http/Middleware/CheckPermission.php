<?php

namespace App\Http\Middleware;

use Redirect;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Helpers\FlashHelper;

class CheckPermission
{
    /**
     * The authenticated user.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Instance of flash helper.
     *
     * @var FlashHelper
     */
    protected $flash;

    /**
     * Create a new filter instance.
     *
     * @param  Guard        $auth
     * @param  FlashHelper  $flash
     * @return void
     */
    public function __construct(Guard $auth, FlashHelper $flash)
    {
        $this->auth = $auth;
        $this->flash = $flash;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if($this->auth->user()->cannot($permission)) {
            $this->flash->error('No access.');
            return Redirect::action('PagesController@index');
        }

        return $next($request);
    }
}
