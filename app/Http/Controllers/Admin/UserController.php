<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Queries\UserQuery;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Prologue\Alerts\Facades\Alert;

class UserController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $userQuery = new UserQuery(User::query());
        $filterCount = User::withTrashed()
                ->selectRaw('count(*) as total')
                ->selectRaw("count(case when deleted_at is not null then 1 end) as trashed")
                ->first();

        return view('admin.users.index', [
            'users' => $userQuery->paginate(request('perPage')),
            'filterCount' => $filterCount,
        ]);
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::get();

            return view('admin.users.create', compact('roles'))->render();
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());
        $user->assignRole($request->input('roles'));
        Alert::success(__('User ":model" has been successfully created!', ['model' => $user->email]))->flash();

        return response()->json([
            'status' => true,
        ]);
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function edit(Request $request, User $user)
    {
        if ($request->ajax()) {
            $roles = Role::get();
            $user->load('roles');

            return view('admin.users.edit', compact('user', 'roles'))->render();
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        if (is_null($request->password)) {
            unset($request['password']);
        } else {
            $request->merge(['password' => bcrypt($request->password)]);
        }
        $user->update($request->all());
        $user->syncRoles($request->input('roles'));
        Alert::success(__('User ":model" has been successfully updated!', ['model' => $user->email]))->flash();

        return response()->json([
            'status' => true,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user, Request $request)
    {
        $user->delete();
        Alert::success(__('User ":model" has been successfully deleted!', ['model' => $user->email]))->flash();

        return response()->json([
            'status' => true,
        ]);
    }
}
