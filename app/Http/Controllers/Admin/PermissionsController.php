<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Http\Requests\Admin\Permissions\CreateRequest;
use App\Http\Requests\Admin\Permissions\AttachedDettachedRequest;
use Illuminate\Support\Facades\Route;
class PermissionsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $permission = new  Permission;
        $permission->key= $request->get('route_name');
        $permission->route_name= $request->get('route_name');
        $permission->display_name = $request->get('display_name');
        $permission->save();
        return $this->successResponse('Successfully Created Permission',$permission);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::where('id',$id)->first();
        if(is_null($permission)){
            return $this->errorResponse('permission not found');
        }
        return $this->successResponse('permission Found',$permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::where('id',$id)->first();
        if(is_null($permission)){
            return $this->errorResponse('Permission not found');
        }

        return $this->successResponse('Permission Found',$permission);
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
       $permission = Permission::where('id',$id)->first();
        if(is_null($permission)){
            return $this->errorResponse('Permission not found');
        }
        $permission->key= $request->get('route_name');
        $permission->route_name= $request->get('route_name');
        $permission->display_name = $request->get('display_name');
        $permission->save();
        return $this->successResponse('Permission Updated',$permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::where('id',$id)->first();
        if(is_null($permission)){
            return $this->errorResponse('Permission not found');
        }
        
        $permission->delete();
        return $this->successResponse('Permission deleted');
    }

    /**
    * List of permission
    */
    public function list(){
        $permissions = Permission::with(['roles'])->get();
        return $this->successResponse('Permission lists',$permissions);
    }

    public function routeList(){
        $routeList = Route::getRoutes();
        $route_array = [];
         foreach ($routeList as $key => $value) {
            if(isset($value->action['as']) AND !empty($value->action['as'])){
                $route = [
                    'as'=>$value->action['as'],
                    'uri'=>$value->uri,
                    'method'=>$value->methods[0]
                ];
                $route_array[] = $route;
            }
        }

       return $this->successResponse('Routes lists',$route_array);
    }

    public function getAttached($id){
        $permission = Permission::where('id',$id)->first();
        if(is_null($permission)){
            return $this->errorResponse('Permission not found');
        }
        $attached_roles = $permission->roles;
        $attached_role_id = $permission->roles()->pluck('roles.id')->toArray();
        $avilable_roles = Role::whereNotIn('id',$attached_role_id)->get();
        return $this->successResponse('attach list',['roles'=>$avilable_roles,'attached_roles'=>$attached_roles]);
    }

    public function attachedRole($id, AttachedDettachedRequest $request){
        $permission = Permission::where('id',$id)->first();
        if(is_null($permission)){
            return $this->errorResponse('Permission not found');
        }

       $permission->roles()->syncWithoutDetaching([$request->get('role_id')]);
       return $this->successResponse('attach role',$permission);
    }

     public function detachedRole($id, AttachedDettachedRequest $request){
        $permission = Permission::where('id',$id)->first();
        if(is_null($permission)){
            return $this->errorResponse('Permission not found');
        }

       $permission->roles()->detach($request->get('role_id'));
       return $this->successResponse('attach role',$permission);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attachRole($id)
    {
        $permission = Permission::where('id',$id)->first();
        if(is_null($permission)){
            return $this->errorResponse('Permission not found');
        }
        return view('admin.permissions.attached',['id'=>$id]);
    }

    
}
