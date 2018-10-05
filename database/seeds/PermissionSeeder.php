<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routeList = Route::getRoutes();
        foreach ($routeList as $key => $value) {
        	if(isset($value->action['as']) AND !empty($value->action['as'])){
        		$permission = Permission::firstOrNew(['key'=> $value->action['as']]);
        		if(!$permission->exists){
        			$permission->route_name = $value->action['as'];
        			$permission->display_name = str_replace('.', ' ', $value->action['as']);
        			$permission->save();
        		}
        	}
        }
    }
}
