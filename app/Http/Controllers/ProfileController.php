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
    public function index(Request $request)
    {
        $user = Auth::user();
        // $this->profileRepository->pushCriteria(new RequestCriteria($request));
        $profile = $this->profileRepository->findWhere(['user_id' => $user->id])->first();

        return view('profiles.main')
            ->with('profile', $profile);
    }

    /**
     * Show the form for creating a new Profile.
     *
     * @return Response
     */
    public function create()
    {
        return view('profiles.create');
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
        $input = $request->all();

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
    public function main()
    {
        $user = Auth::user();

        $profile = $this->profileRepository->findWithoutFail($user->id);

        if (empty($profile)) {
            Flash::error('Profile not found');
            return redirect(route('home'));
        }

        return view('profiles.main')->with('profile', $profile);
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

        return view('profiles.admin')->with('profile', $profile);
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

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        $profile = $this->profileRepository->update($request->all(), $id);

        Flash::success('Profile updated successfully.');

        return redirect(route('profiles.index'));
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
