<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
      premission
      'role-list',
      'role-create',
      'role-edit',
      'role-delete',
     *      */

    function __construct() {
        $this->middleware('permission:role-list');
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-detete', ['only' => ['destroy']]);
    }

    public function index(Request $requset) {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('Dashboard.roles.index', compact('roles'))->with('i', ($requset->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $permissions = Permission::get();
        return view('Dashboard.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $valiator = $request->validate([
            'role_name' => 'required|string|max:255',
            'permission' => 'required',
        ]);

        $name = $request->input('role_name');
        $role = Role::create(['name' => $name]);
        $role->syncPermissions($request->input('permission'));



        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $role = Role::find($id);
        $permissions = Permission::get();
        $roles_has_permissions = DB::table("role_has_permissions")
                        ->where("role_has_permissions.role_id", $id)
                        ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->toArray();
        return view('Dashboard.roles.edit', compact('role', 'permissions', 'roles_has_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $valiator = $request->validate([
            'role_name' => 'required|string|max:255',
            'permission' => 'required',
        ]);



        $role = Role::find($id);
        $role->name = $request->input('role_name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
