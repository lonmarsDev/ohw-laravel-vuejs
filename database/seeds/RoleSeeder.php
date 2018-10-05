<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = [
       		[
       			'name'=>'admin',
       			'display_name'=>'Admin',
       			'is_default'=>true
       		],
       		[
       			'name'=>'owner',
       			'display_name'=>'Company Owner',
       			'is_default'=>true
       		],
       		[
       			'name'=>'assistant',
       			'display_name'=>'Company Assistant',
       			'is_default'=>true
       		],
       ];

       foreach ($roles as $key => $value) {
       		$role = Role::firstOrNew(['name'=>$value['name']]);
       		if(!$role->exists){
       			$role->display_name= $value['display_name'];
       			$role->is_default = $value['is_default'];
       			$role->save();
       		}
       }
    }
}
