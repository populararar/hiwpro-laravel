<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRolesRequest;
use App\Http\Requests\UpdateUserRolesRequest;
use App\Repositories\UserRolesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserRolesController extends AppBaseController
{
    /** @var  UserRolesRepository */
    private $userRolesRepository;

    public function __construct(UserRolesRepository $userRolesRepo)
    {
        $this->userRolesRepository = $userRolesRepo;
    }

    /**
     * Display a listing of the UserRoles.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRolesRepository->pushCriteria(new RequestCriteria($request));
        $userRoles = $this->userRolesRepository->all();

        return view('user_roles.index')
            ->with('userRoles', $userRoles);
    }

    /**
     * Show the form for creating a new UserRoles.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_roles.create');
    }

    /**
     * Store a newly created UserRoles in storage.
     *
     * @param CreateUserRolesRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRolesRequest $request)
    {
        $input = $request->all();

        $userRoles = $this->userRolesRepository->create($input);

        Flash::success('User Roles saved successfully.');

        return redirect(route('userRoles.index'));
    }

    /**
     * Display the specified UserRoles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userRoles = $this->userRolesRepository->findWithoutFail($id);

        if (empty($userRoles)) {
            Flash::error('User Roles not found');

            return redirect(route('userRoles.index'));
        }

        return view('user_roles.show')->with('userRoles', $userRoles);
    }

    /**
     * Show the form for editing the specified UserRoles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userRoles = $this->userRolesRepository->findWithoutFail($id);

        if (empty($userRoles)) {
            Flash::error('User Roles not found');

            return redirect(route('userRoles.index'));
        }

        return view('user_roles.edit')->with('userRoles', $userRoles);
    }

    /**
     * Update the specified UserRoles in storage.
     *
     * @param  int              $id
     * @param UpdateUserRolesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRolesRequest $request)
    {
        $userRoles = $this->userRolesRepository->findWithoutFail($id);

        if (empty($userRoles)) {
            Flash::error('User Roles not found');

            return redirect(route('userRoles.index'));
        }

        $userRoles = $this->userRolesRepository->update($request->all(), $id);

        Flash::success('User Roles updated successfully.');

        return redirect(route('userRoles.index'));
    }

    /**
     * Remove the specified UserRoles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userRoles = $this->userRolesRepository->findWithoutFail($id);

        if (empty($userRoles)) {
            Flash::error('User Roles not found');

            return redirect(route('userRoles.index'));
        }

        $this->userRolesRepository->delete($id);

        Flash::success('User Roles deleted successfully.');

        return redirect(route('userRoles.index'));
    }
}
