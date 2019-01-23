<?php

namespace App\Http\Middleware;

use App\Repositories\MenuRepository;
use App\Repositories\PermissionsRepository;
use Closure;
use Illuminate\Support\Facades\Auth;

class LoginMiddlware
{

    /** @var  MenuRepository */
    private $menuRepository;

    /** @var  PermissionsRepository */
    private $permissionsRepository;


    public function __construct(MenuRepository $menuRepo, PermissionsRepository $permissionsRepo)
    {
        $this->permissionsRepository = $permissionsRepo;
        $this->menuRepository = $menuRepo;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // The user is logged in...
            // return $next($request);
            $user = Auth::user();
            $role_id = $user->usersRoles->first()->role_id;

            $arrayPath = explode("/", $request->path());

            $menu = $this->menuRepository->findWhere([
                'route_name' => $arrayPath[0],
            ])->first();

            // dd($menu , $user->id);

            $permission = $this->permissionsRepository->findWhere([
                'menu_id' =>$menu->id, 
                'role_id' =>$role_id
            ])->first();

            // dd($menu , $user->id ,  $permission );

            if(empty( $permission )){
                abort(404);
            }

            if ($permission->can_read == 1){
                return $next($request);
            }
        }
        return redirect()->route('login.index');
    }
}
