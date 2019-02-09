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

    // /**
    //  * Display a listing of the Profile.
    //  *
    //  * @param Request $request
    //  * @return Response
    //  */
    // // public function index(Request $request)
    // // {
    // //     $user = Auth::user();
    // //     // $this->profileRepository->pushCriteria(new RequestCriteria($request));
    // //     $profile = $this->profileRepository->findWhere(['user_id' => $user->id])->first();

    // //     return view('profiles.main')
    // //         ->with('profile', $profile)->with('$user',$user);
    // // }

      /**
     * Show the form for creating a new Profile.
     *
     * @return Response
     */
    public function customer($id)
    {
        $user = Auth::user();
        $roleName = $user->usersRoles->first()->role->name;

        return view('profiles.customer')->with('roleName',$roleName);
    }


    /**
     * Show the form for creating a new Profile.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        $roleName = $user->usersRoles->first()->role->name;
        $user_id = $this->usersRepository->findWhere(['id' => $user->id])->first();

        return view('profiles.create')->with('user_id',$user_id)->with('roleName',$roleName);
    }

    /**
     * Store a newly created Profile in storage.
     *
     * @param CreateProfileRequest $request
     *
     * @return Response
     */
    public function store($id, Request  $request)
    {  
        $input = $request->all();
        $user = Auth::user();
        // dd($user->usersRoles)
        foreach($user->usersRoles as $item){    

            if($item->role_id == 3){

                $validator = Validator::make($request->all(), [
                    'bank_account' => 'required',
                    'bank_num' => 'required|max:10',
                    'bank_name' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect()->route('register')
                        ->withErrors($validator)
                        ->withInput();
                }

                $profile = [
                    // 'tel' => $input['tel_add'],
                    // 'img' => $input['img'],
                    // 'address_id' => $
                    'bank_num' => $input['bank_num'],
                    'bank_name' => $input['bank_name'],
                    // 'national_id' => $input['national_id'],
                    // 'national_img' => $input['national_img'],
                    // 'national_img2' => $input['national_img2'],
                    // 'user_id' => $user->id,
                    // 'status' => 1,
                ];

                $profile = $this->profileRepository->update($profile, $id);
                Flash::success('Profile saved successfully.');
                return redirect(route('profiles.main'));

            }
            // else if($item->role_id == 2){
            //     $path = $request->file('img_new')->store('public/upload');
            //     $id_img = $request->file('national_img')->store('public/upload');
            //     $id_img2 = $request->file('national_img2')->store('public/upload');
                
            //     $input = $request->all();

            //     $input["img"] = str_replace("public", "", $path);
            //     $input["national_img"] = str_replace("public", "", $id_img);
            //     $input["national_img2"] = str_replace("public", "", $id_img2);

            //     $profile = [
            //         'tel' => $input['tel'],
            //         'bank_num' => $input['bank_num'],
            //         'bank_name' => $input['bank_name'],
            //         'national_id' => $input['national_id'],
            //         'national_img' => $input['national_img'],
            //         'national_img2' => $input['national_img2'],
            //         'user_id' => $user->id,
            //         'status',
            //     ];

        
            //     $profileInput = $this->profileRepository->create($profile);

            //     Flash::success('Profile saved successfully.');
            //     return redirect(route('profiles.index'));
            // }
            
        }


        return redirect(route('profiles.main'));
    }
    /**
     * Display the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->profileRepository->pushCriteria(new RequestCriteria($request));

        $user = Auth::user();
        $userProfile = $user->usersRoles->first();

        $profile = $this->profileRepository->findWhere(['user_id' => $user->id])->first();
        $user_id = $this->usersRepository->findWhere(['id' => $user->id])->first();
        // dd($user_id);
        // $roleName = $user->usersRoles->first()->role->name;

        return view('profiles.main')
        ->with('profile', $profile)
        ->with('user_id',$user_id)
        ->with('userProfile',$userProfile);
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

        $user = Auth::user();
        $roleName = $user->usersRoles->first()->role->name;
        $user_id = $this->usersRepository->findWhere(['id' => $user->id])->first();
        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.edit')->with('profile', $profile)->with('user_id',$user_id)->with('roleName', $roleName);
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

        $newPath = '';

        if ($request->hasFile('imgUpdate')) {
            $newPath = $request->file('imgUpdate')->store('public/upload');
        }
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.main'));
        }
        $input = $request->all();

        if ($newPath != '') {
            $input['img'] = str_replace("public", "", $newPath);
        }

        $profile = $this->profileRepository->update($input, $id);

        Flash::success('Profile updated successfully.');

        return redirect(route('profiles.main'));
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
