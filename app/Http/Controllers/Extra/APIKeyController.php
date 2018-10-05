<?php

namespace App\Http\Controllers\Extra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extra\Api\CreateRequest;
use App\Models\ApiKey;
/**
* User API key 
* Process the api key of the login users
*/
class APIKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('extra.api.index',['user'=>$this->user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $api = new ApiKey();
        $api->label = $request->get('label');
        $api->hash_key = bcrypt(ApiKey::generateRandomString());
        $api->user_id = $this->user->id;
        $api->company_id = $this->company->id;
        $api->status = ApiKey::STATUS_ENABLED;
        $api->save();
        return $this->successResponse('Successfully Created API',$api);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $api = $this->user->apikeys()->where('id',$id)->first();
        if(is_null($api)){
            return $this->errorResponse('API Key not found');
        }
        return $this->successResponse('API Key Found',$api);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $api = $this->user->apikeys()->where('id',$id)->first();
        if(is_null($api)){
            return $this->errorResponse('API Key not found');
        }
        return $this->successResponse('API Key Found',$api);
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
        $api = $this->user->apikeys()->where('id',$id)->first();
        if(is_null($api)){
            return $this->errorResponse('API Key not found');
        }
        $api->label = $request->get('label');
        $api->save();
        return $this->successResponse('API Key Updated',$api);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $api = $this->user->apikeys()->where('id',$id)->first();
        if(is_null($api)){
            return $this->errorResponse('API Key not found');
        }
        $api->delete();
        return $this->successResponse('API Key deleted');
    }
    /**
    * Toggle the api status enabled or disabled
    */
    public function toggleAPI($id,$status){
       $api = $this->user->apikeys()->where('id',$id)->first();
        if(is_null($api)){
            return $this->errorResponse('API Key not found');
        }
        if($status == 'true' ){
            $api->status =ApiKey:: STATUS_ENABLED;    
            $api->save();
        }else if($status == 'false'){
            $api->status = ApiKey::STATUS_DISABLED;    
            $api->save();
        }else{
             return $this->errorResponse('API Key status is invalid');
        }
        
        return $this->successResponse('API Key Updated',$api);
    }
    /**
    * Regenerate API key token
    */
    public function regenerateToken($id){
        $api = $this->user->apikeys()->where('id',$id)->first();
        if(is_null($api)){
            return $this->errorResponse('API Key not found');
        }
        $api->hash_key = bcrypt(random_str());
        $api->save();
        return $this->successResponse('API Key regenerated',$api);
    }
    /**
    * List of user api keys
    */
    public function list(){
        $apis = $this->user->apikeys()->with('user')->get();
        return $this->successResponse('API Key lists',$apis);
    }
}
