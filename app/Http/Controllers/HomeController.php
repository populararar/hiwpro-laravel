<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use App\Repositories\PermissionsRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Criteria\RequestCriteria;

class HomeController extends Controller
{

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  UsersRepository */
    private $permissionRepository;

    /** @var  EventRepository */
    private $eventRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EventRepository $eventRepo, UsersRepository $usersRepo, PermissionsRepository $permissionRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->permissionRepository = $permissionRepo;
        $this->eventRepository = $eventRepo;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now()->toDateTimeString();
        $events = $this->eventRepository->findWhere([['event_exp', '>', $now]]);

        foreach ($events as $event) {
            $event->start_date = $this->formatEventDate($event->startDate);
            $event->last_date = $this->formatEventDate($event->lastDate);
        }

        return view('home')->with('events', $events);
    }

    private function formatEventDate($dateTime)
    {
        return Carbon::parse($dateTime)->format('d M Y');
    }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    private function getPermissions()
    {
        $user = Auth::user();
        $role_id = $user->usersRoles->first()->role_id;
        if (!empty($role_id)) {
            $permissions = $this->permissionRepository->with(['menu'])->findWhere([
                'role_id' => $role_id,
            ]);
            session(['permissions' => $permissions]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $this->usersRepository->pushCriteria(new RequestCriteria($request));
        $user = $this->usersRepository->findWhere([
            'email' => $email,
        ])->first();

        $checked = Hash::check($password, $user['password']);
        if (isset($user) && $checked) {
            Auth::login($user);
            // get role permission
            $this->getPermissions();

            return redirect()->route('home');
        }

        return view('auth.login', compact('email'))
            ->withErrors(['email' => 'username or password invalid']);
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function destroy(Request $requst)
    {
        if (Auth::check()) {
            session()->forget('permissions');
            Auth::logout();
        }
        return redirect()->route('home');
    }

}
