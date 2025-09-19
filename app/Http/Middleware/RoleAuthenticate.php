<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;
use App\Models\Role;

class RoleAuthenticate
{
    public function handle($request, Closure $next, $roles)
    {

        $roles = explode("|", $roles);
       
        if(Auth::guard()->check()) 
        {
            $getRole =  Role::where('id', Auth::guard()->user()->role)->first();
// dd($roles, $getRole->role_name);
            if($getRole)
            {
                if(in_array($getRole->role_name, $roles))
                {   
                    return $next($request);
                }
                else if($getRole->role_name == "Admin")
                {
                   return redirect('admin/dashboard'); 
                }
                else if($getRole->role_name == "Employee")
                {
                   return redirect('admin/dashboard'); 
                   // return redirect('dashboard'); 
                }
                else if($getRole->role_name == "Vendor" || $getRole->role_name == "User")
                {
                    return redirect('home'); 
                }
                else
                {
                   return redirect('/'); 
                }
            }
        }
        else 
        {   
            if(in_array('Admin', $roles)) 
            { 
                return redirect('login');
            }
            else if(in_array('Employee', $roles)) 
            { 
                return redirect('login');
            }
            else 
            { 
                return redirect('/login');
            }
        }   

        return abort(500);
    }
    
}
