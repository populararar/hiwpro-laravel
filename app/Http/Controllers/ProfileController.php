<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\ProfileRepository;
use App\Repositories\UsersRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Validator;
class ProfileController extends AppBaseController
{
    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  ProfileRepository */
    private $profileRepository;

    public function __construct(UsersRepository $usersRepo, ProfileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the Profile.
     *
     * @param Request $request
     * @return Response
     */
    // public function index(Request $request)
    // {
    //     $user = Auth::user();
    //     // $this->profileRepository->pushCriteria(new RequestCriteria($request));
    //     $profile = $this->profileRepository->findWhere(['user_id' => $user->id])->first();

    //     return view('profiles.main')
    //         ->with('profile', $profile)->with('$user',$user);
    // }

    /**
     * Show the form for creating a new Profile.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        $roleName = $user->usersRoles->first()->role->name;

        return view('profiles.create')->with('roleName',$roleName);
    }

    /**
     * Store a newly created Profile in storage.
     *
     * @param CreateProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateProfileRequest $request)
    {   
        $user = Auth::user();
        // dd($user->usersRoles);
        // foreach($user->usersRoles as $item){
        //     if($item->role_id == 3){
        //         $path = $request->file('img')->store('public/upload');

        //         $input = $request->all();

        //         $input["img"] = str_replace("public", "", $path);

        //         $profile = $this->profileRepository->create($input);
        //         Flash::success('Profile saved successfully.');

        //     }
        //     else if($item->role_id == 2){
        //         $path = $request->file('img')->store('public/upload');
        //         $id_img = $request->file('national_img')->store('public/upload');
        //         $id_img2 = $request->file('national_img2')->store('public/upload');
                
        //         $input = $request->all();

        //         $input["img"] = str_replace("public", "", $path);
        //         $input["national_img"] = str_replace("public", "", $id_img);
        //         $input["national_img2"] = str_replace("public", "", $id_img2);

        //         $profile = [
        //             'tel' => $input['bank_name'],
        //             'bank_num' => $input['bank_num'],
        //             'bank_name' => $input['bank_name'],
        //             'national_id' => $input['national_id'],
        //             'national_img' => $input['national_img'],
        //             'national_img2' => $input['national_img2'],
        //             'user_id' => $user->id,
        //             'status',
        //         ];
        
        //         $profileInput = $this->profileRepository->create($profile);

        //         Flash::success('Profile saved successfully.');
                
        //     }
            
        // }
      

        $path = $request->file('img')->store('public/upload');

        $input = $request->all();

        $input["img"] = str_replace("public", "", $path);
        $profile = $this->profileRepository->create($input);

        Flash::success('Profile saved successfully.');

        return redirect(route('profiles.index'));
    }
    /**
     * Display the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();

        $profile = $this->profileRepository->findWithoutFail($user->id);
        $roleName = $user->usersRoles->first()->role->name;
        if (!empty($profile)) {


            Flash::error('Profile not found');
            return redirect(route('profiles.update'));
        }else {


            return redirect(route('profiles.create'));
        }

        return view('profiles.main')->with('profile', $profile)->with('$user',$user);
    }

     /**
     * Display the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function admin()
    {
        $user = Auth::user();
        $profile = $this->profileRepository->findWithoutFail($user->id);

        if (empty($profile)) {
            Flash::error('Profile not found');
            return redirect(route('home'));
        }

        return view('profiles.admin')->with('profile', $profile)->with('$user',$user);
    }

    /**
     * Display the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.edit')->with('profile', $profile);
    }

    /**
     * Update the specified Profile in storage.
     *
     * @param  int              $id
     * @param UpdateProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfileRequest $request)
    {
        $profile = $this->profileRepository->findWithoutFail($id);
        $user = Auth::user();
        $roleName = $user->usersRoles->first()->role->name;

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('home'));
        }

        $profile = $this->profileRepository->update($request->all(), $id);

        Flash::success('Profile updated successfully.');

        return redirect(route('home'));
    }

    /**
     * Remove the specified Profile from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        $this->profileRepository->delete($id);

        Flash::success('Profile deleted successfully.');

        return redirect(route('profiles.index'));
    }
}
