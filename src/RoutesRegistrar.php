<?php

namespace Socialchan\Oiru;

use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegistrar
{
    /**
     * The router implementation.
     *
     * @var Router
     */
    protected $router;

    /**
     * Create a new route registrar instance.
     *
     * @param  Router  $router
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Register routes for getting and manage modules.
     *
     * @return void
     */
    public function all()
    {
        $this->forGetModules();
        $this->forManageModules();
    }

    /**
     * Register the routes needed for getting modules information.
     *
     * @return void
     */
    public function forGetModules()
    {
        $this->router->group(['middleware' => ['web', 'auth'], 'prefix' => 'modules'], function ($router) {
            $router->get('/', [
                'uses' => 'ModulesController@index',
            ]);

            $router->get('{id}', [
                'uses' => 'ModulesController@show',
            ]);
        });
    }

    /**
     * Register the routes needed for managing modules.
     *
     * @return void
     */
    public function forManageModules()
    {
        $this->router->group(['middleware' => ['web', 'auth'], 'prefix' => 'modules'], function ($router) {
            $router->put('{id}', [
                'uses' => 'ModulesController@update',
            ]);

            $router->delete('{id}', [
                'uses' => 'ModulesController@delete',
            ]);
        });
    }
}
