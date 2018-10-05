<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Domain;
use App\Http\Requests\Settings\VerifiedDomain\CreateRequest;
use App\Http\Requests\Settings\VerifiedDomain\RemoveRequest;
use App\Http\Requests\Settings\VerifiedDomain\VerifyRequest;
use App\Mail\AddDomain;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
/**
* User Domain 
* User Domain use for email campaign
*/
class VerifiedDomainController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('settings.verified-domain.index',['user'=>$this->user]);
    }
    
    
    /**
     * Remove the Domain
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $domain = $this->user->domains()->where('id',$id)->first();
        if(is_null($domain)){
            return $this->errorResponse('Domain not found');
        }
        $domain->delete();
        return $this->successResponse('Domain deleted');
    }

    /**
     * Store a newly created Domain in storage and verify to email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(CreateRequest $request)
    { 
        $post_email = $request->get('email');
        $post_domain_id = $request->get('domain_id');
        
        $post_domain = explode('@', $post_email)[1];
        //add new domain  
        $domain = $this->user->domains()->where('domain',$post_domain)->where('isDelete',0)->where('status',1)->first();
        if(!$post_domain_id){
            if(is_null($domain) ){
                $domain = new Domain();
                $domain->user_id = $this->user->id;
                $domain->email = $post_email; 
                $domain->verified = 0; 
                $domain->authenticated = 0; 
                $domain->domain = $post_domain;
                $domain->isDelete = 0;
                $domain->verificationCode = Domain::randomNumber(12); 
                $domain->successMessage =  "We sent an email to <span class='text-danger'>".$post_email."</span> to verify the domain ".$post_domain." (".date('d/m/y h:i A')."). To verify DOMAIN, click <em>verify domain Access</em> in the email. Or enter the verification code in this field.";
                $domain->status = 1 ;
                $domain->save();
                Mail::to($post_email)->send(new AddDomain( $domain ) );
                return $this->successResponse( 'Verify domain Success' , $domain);
            }else{
                $domain->email = $post_email; 
                $domain->verificationCode = Domain::randomNumber(12); 
                $domain->successMessage =  "We sent an email to <span class='text-danger'>".$post_email."</span> to verify the domain ".$post_domain." (".date('d/m/y h:i A')."). To verify DOMAIN, click <em>verify domain Access</em> in the email. Or enter the verification code in this field.";
                $domain->save();
                Mail::to($post_email)->send(new AddDomain( $domain ) );
                return $this->successResponse( 'Verify domain Success' , $domain);
            }
        }else{ // update verify existing domain
            $domain = $this->user->domains()->where('id' , $post_domain_id )->first();
            $domain->email = $post_email; 
            $domain->verificationCode = Domain::randomNumber(12); 
            $domain->successMessage =  "We sent an email to <span class='text-danger'>".$post_email."</span> to verify the domain ".$post_domain." (".date('d/m/y h:i A')."). To verify DOMAIN, click <em>verify domain Access</em> in the email. Or enter the verification code in this field.";
            $domain->save();
            Mail::to($post_email)->send(new AddDomain( $domain ) );
            return $this->successResponse( 'Verify domain Success' , $domain);
        }
    }

    /**
     * Verify selected Domain.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify($id,$code )
    {
        $domain = $this->user->domains()->where('id' , $id )
            ->where('verificationCode' , $code)
            ->first();

        if( $domain ){
            $domain->verified = 1;
            $is_save = $domain->save();
            return $this->successResponse( 'Verification success' , $domain);  
        }else{
            return $this->errorResponse( 'Please Enter Correct Verification Code');
        }            
    }

    /**
     * List of user Domains
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $domains = $this->user->domains()->where('isDelete' , 0 )->with('user')->get();
        if(is_null($domains)){
            return $this->errorResponse('Domains not found');
        }
        return $this->successResponse( 'Domain Lists' , $domains);                 
    }
 

}