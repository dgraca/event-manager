<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateMeRequest;
use App\Http\Requests\UpdateUserRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the User.
     */
    public function index(Request $request)
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        $user = new User();
        $user->loadDefaultValues();
        if(auth()->user()->can(Permission::PERMISSION_ADMIN_FULL_APP)) {
            $roles = Role::pluck('name', 'id');
        }else{
            $roles = Role::where('name', '!=', Role::ROLE_SUPER_ADMIN)->pluck('name', 'id');
        }
        return view('users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created User in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->except('roles', 'permissions');
        $input['password'] = Hash::make($input['password']);

        /** @var User $user */
        $user = User::create($input);
        if($user){
            if(auth()->user()->can(Permission::PERMISSION_ADMIN_APP) && url()->previous() != route('profile.show')) {
                // Handle the user roles
                $this->syncPermissions($request, $user);
            }
            //assign default role if not have any
            if($user->roles()->count() == 0){
                $user->assignRole(Role::ROLE_USER);
            }
            event(new Registered($user));
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     */
    public function show($id)
    {
        flash('Esta página está incompleta.')->overlay()->danger();
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     */
    public function edit($id)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('users.index'));
        }

        if(auth()->user()->can(Permission::PERMISSION_ADMIN_FULL_APP)) {
            $roles = Role::pluck('name', 'id');
            $permissions = Permission::all('name', 'id');
        }else{
            $roles = Role::where('name', '!=', Role::ROLE_SUPER_ADMIN)->pluck('name', 'id');
            $permissions = Permission::select('name', 'id')->where('name', '!=', Permission::PERMISSION_ADMIN_FULL_APP)->get();
        }

        return view('users.edit')
            ->with('user', $user)
            ->with('roles', $roles)
            ->with('permissions', $permissions);
    }

    /**
     * Update the specified User in storage.
     */
    public function update($id, UpdateUserRequest $request)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('users.index'));
        }

        if($request->has('password') && !empty($request->get('password'))){
            $userAttributes = $request->except('roles', 'permissions');
            $userAttributes['password'] = Hash::make($userAttributes['password']);
        }else{
            $userAttributes = $request->except('roles', 'permissions', 'password');
        }

        $user->fill($userAttributes);
        if($user->save()){
            if(auth()->user()->can(Permission::PERMISSION_ADMIN_APP) && url()->previous() != route('profile.show')) {
                // Handle the user roles
                $this->syncPermissions($request, $user);
            }
            //assign default role if not have any
            if($user->roles()->count() == 0){
                $user->assignRole(Role::ROLE_USER);
            }
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('users.index'));
    }

    /**
     * Update the specified User in storage.
     */
    public function updateMe(UpdateMeRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();

        if (empty($user)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('users.index'));
        }

        $excludeCommon = ['roles', 'permissions', 'password', 'status', 'lang', 'activity_blocked'];
        $excludeExtended = ['rd_1', 'rd_2', 'rd_3', 'rd_4', 'rd_5', 'rd_6', 'rd_7', 'rd_8', 'rd_9', 'rd_10', 'rd_11', 'fr_1', 'fr_2', 'fr_3', 'fr_4', 'fr_5', 'fr_6', 'fr_7', 'fv_1', 'fv_2', 'fv_3', 'fv_4', 'fv_5', 'mm_1', 'mm_2', 'mm_3', 'mm_4', 'mm_5', 'mm_6', 'mm_7', 'mm_8', 'mr_1', 'mr_2', 'mr_3', 'mr_4', 'mr_5', 'mr_6', 'pt_1', 'pt_2', 'pt_3'];
        $excludeKeys = $user->activity_blocked ? array_merge($excludeCommon, $excludeExtended) : $excludeCommon;
        $userAttributes = $request->except($excludeKeys);

        $user->fill($userAttributes);
        if($user->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('profile.show'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('users.index'));
        }

        if($user->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('users.index'));
    }

    /**
     * Sync the permission and roles on the $request with the user.
     * @param Request $request
     * @param $user
     * @return User
     */
    private function syncPermissions(Request $request, $user) : User
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }
}
