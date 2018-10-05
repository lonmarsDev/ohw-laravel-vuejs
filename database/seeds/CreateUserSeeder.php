<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::where('name','admin')->first();
        if($role){
             User::create([
                'name'=>'Ohwolar admin',
                'email'=>'admin@ohwolar.com',
                'password'=>bcrypt('ohwolaradmin'),
                'firstname'=> 'Ohwolar', //varchar(44)
                'lastname'=> 'Ohwolar' ,//varchar(44)
                'username'=>'ohwolar',  //varchar(50)
                 //varchar(200) 
                'address' => 'None' ,
                'address_2'=> 'None',
                'country'=> 1,
                'zip' => 'None', //varchar
                'city'=>1,
                'phone' =>'none',
                'vat_tax' =>'none',
                'image_path' =>'none',
                 'company_id'=>0,
                'authLogin'=>1,
                'smsAuth'=>0,
                'smsAuthCode' =>'none',
                'account_name'=>'none',
                'timezone'=>1, //int
                'date_format'=>1, //int 
                'currency_format'=>1,
                'status'=>1, 
                'role_id'=>$role->id 
            ]);
        }
         $role_owner = Role::where('name','owner')->first();
         if($role){
            $company = Company::create(['name'=>'Ohwolar']);

            User::create([
            	'name'=>'Ohwolar user',
            	'email'=>'user@ohwolar.com',
            	'password'=>bcrypt('ohwolar'),
            	'firstname'=> 'Ohwolar', //varchar(44)
                'lastname'=> 'Ohwolar' ,//varchar(44)
                'username'=>'ohwolar',  //varchar(50)
                 //varchar(200) 
                'address' => 'None' ,
                'address_2'=> 'None',
                'country'=> 1,
                'zip' => 'None', //varchar
                'city'=>1,
                'phone' =>'none',
                'vat_tax' =>'none',
                'image_path' =>'none',
                'authLogin'=>1,
                'smsAuth'=>0,
                'smsAuthCode' =>'none',
                'account_name'=>'none',
                'timezone'=>1, //int
                'date_format'=>1, //int 
                'currency_format'=>1,
                'status'=>1,  
                'role_id'=>$role_owner->id,
                'company_id'=>$company->id
            ]);
        }
    }
}
