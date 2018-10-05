<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\Admin\Roles\CreateRequest;
use App\Http\Requests\Admin\Roles\AttachedDettachedRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $role = new  Role;
        $role->name= $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->save();
        return $this->successResponse('Successfully Created Role',$role);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::where('id',$id)->first();
        if(is_null($role)){
            return $this->errorResponse('role not found');
        }
        return $this->successResponse('role Found',$role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id',$id)->first();
        if(is_null($role)){
            return $this->errorResponse('role not found');
        }

        return $this->successResponse('role Found',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $role = Role::where('id',$id)->first();
        if(is_null($role)){
            return $this->errorResponse('role not found');
        }
        $role->name= $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->save();
        return $this->successResponse('role Updated',$role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::where('id',$id)->first();
        if(is_null($role)){
            return $this->errorResponse('role not found');
        }
        if($role->users()->count() > 0){
          return $this->errorResponse('We did not support deletion of role if has many users');  
        }
        
        $role->permissions()->detach();
        $role->delete();
        return $this->successResponse('role deleted');
    }

    /**
    * List of role
    */
    public function list(){
        $roles = Role::with(['permissions'])->get();
        return $this->successResponse('role lists',$roles);
    }

    public function getAttached($id){
        $role = Role::where('id',$id)->first();
        if(is_null($role)){
            return $this->errorResponse('Role not found');
        }
        $attached_permissions = $role->permissions;
        $attached_permission_id = $role->permissions()->pluck('permissions.id')->toArray();
        $avilable_permissions = Permission::whereNotIn('id',$attached_permission_id)->get();
        return $this->successResponse('attach list',['permissions'=>$avilable_permissions,'attached_permissions'=>$attached_permissions]);
    }

    public function attachedRole($id, AttachedDettachedRequest $request){
        $role = Role::where('id',$id)->first();
        if(is_null($role)){
            return $this->errorResponse('Role not found');
        }

       $role->permissions()->syncWithoutDetaching([$request->get('permission_id')]);
       return $this->successResponse('attach role',$role);
    }

     public function detachedRole($id, AttachedDettachedRequest $request){
        $role = Role::where('id',$id)->first();
        if(is_null($role)){
            return $this->errorResponse('Role not found');
        }

       $role->permissions()->detach($request->get('permission_id'));
       return $this->successResponse('attach role',$role);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attachRole($id)
    {
        $role = Role::where('id',$id)->first();
        if(is_null($role)){
            return $this->errorResponse('Role not found');
        }
        return view('admin.roles.attached',['id'=>$id]);
    }
}
