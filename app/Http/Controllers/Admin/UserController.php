<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Assistant;
use App\Models\Role;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $role = Role::where('id',$request->get('role'))->first();
        if(is_null($role)){
            return $this->errorResponse('role not found');
        }
        if($role->name !='assistant'){
            $company = new Company;
            $company->name= $request->get('company');
            $company->save();
        }
       
        $user = new User;
        $user->role_id =$role->id;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = User::STATUS_ENABLED;
        $user->password = Hash::make( $request->get('password'));
        if($role->name !='assistant'){
         $user->company_id = $company->id;
        }else{
          $user->company_id = User::find($request->get('owner'))->company_id;
        }
        $user->save();

        if($role->name=='assistant'){
            $assistant = new Assistant;
            $assistant->user_id =$user->id;
            $assistant->owner_id = $request->get('owner');
            $assistant->save();
        }
        return $this->successResponse('Successfully Created User',$user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->with('company','owner')->first();
        if(is_null($user)){
            return $this->errorResponse('user not found');
        }
        return $this->successResponse('user Found',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->with('company','owner')->first();
        if(is_null($user)){
            return $this->errorResponse('user not found');
        }
        return $this->successResponse('user Found',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = User::where('id',$id)->first();
        if(is_null($user)){
            return $this->errorResponse('user not found');
        }
        $role = Role::where('id',$request->get('role'))->first();
        if(is_null($role)){
            return $this->errorResponse('role not found');
        }

        if($role->name !='assistant'){
            $company = Company::where('id',$user->company_id)->first();
            if(is_null($company)){
                $company = new Company();
            }
            $company->name= $request->get('company');
            $company->save();
        }
        $user->role_id = $role->id;;
        $user->status = User::STATUS_ENABLED;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if($request->has('password')){
            $user->password = Hash::make( $request->get('password'));
        }
        if($role->name !='assistant'){
         $user->company_id = $company->id;
        }else{
          $user->company_id = User::find($request->get('owner'))->company_id;
        }
        $user->save();
        return $this->successResponse('Successfully Update User',$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        if(is_null($user)){
            return $this->errorResponse('user not found');
        }
        $user->delete();
        return $this->successResponse('user deleted');
    }

    /**
    * List of users 
    */
    public function list(){

        $users =User::with(['role','company'])->get();
        return $this->successResponse('User lists',$users);
    }
    /**
    * List of users Owner 
    */
    public function listOwner(){
         $users =User::with(['role','company'])->where('role_id',2)->get();
        return $this->successResponse('User lists',$users);
    }

     /**
    * Toggle the api status enabled or disabled
    */
    public function toggleUser($id,$status){
        $user = User::where('id',$id)->first();
        if(is_null($user)){
            return $this->errorResponse('user not found');
        }
        if($status == 'true' ){
            $user->status =User:: STATUS_ENABLED;    
            $user->save();
        }else if($status == 'false'){
            $user->status = User::STATUS_DISABLED;    
            $user->save();
        }else{
             return $this->errorResponse('user status is invalid');
        }
        
        return $this->successResponse('user Updated',$api);
    }
}
