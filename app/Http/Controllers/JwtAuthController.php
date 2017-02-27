<?php

namespace App\Http\Controllers;

use App\Entity\User\User;
use App\Entity\Role\Role;
use App\Entity\Permission\Permission;

use Illuminate\Http\Request;
use App\Http\Requests;//
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
// use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;

class JwtAuthController extends Controller
{

    public function index()
    {
        return $this->response->array(['auth'=>Auth::user(), 'users'=>User::with('roles')->get()]);
    }
    /** PHONE OR EMAIL LOGIN
      Credit: https://laracasts.com/discuss/channels/general-discussion/log-in-with-username-or-email-in-laravel-5
      $field = 'username';
      if (is_numeric($request->input('login')) {
          $field = 'phone';
      } elseif (filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)) {
          $field = 'email';
      }

      $request->merge([$field => $request->input('login')]);

      if ($this->auth->attempt($request->only($field, 'password'))) {
          return redirect('/');
      }

      return redirect('/login')->withErrors([
          'error' => 'These credentials do not match our records.',
      ]);
    **/

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function createRole(Request $request){
      $role = Role::create([
          'name' => $request->name,
          'display_name' => $request->display_name,
          'description' => $request->description,
      ]);

      return response()->json(array('status'=> "Role created", 'data' => $role));
    }

    public function createPermission(Request $request){
      $permission = new Permission();
      $permission->name = $request->name;
      $permission->display_name = $request->display_name;
      $permission->description = $request->description;
      $permission->save();
      return response()->json("Permission created");
    }

    public function assignRole(Request $request){
      $user = User::find($request->id);
      //$user->attachRole($request->input('role'));
      $user->roles()->attach(289);

      return response()->json("Assign Role created");
    }

    public function attachPermission(Request $request){
      $role = Role::find($request->id);
      //$user->attachRole($request->input('role'));
      $pData = $request['permissions'];

      // $role->attachPermissions(array($pData));
  		foreach ($pData as $permission) {
  			$role->permissions()->attach($permission['id']);
  		}

      return response()->json("Assign Permission created");
    }

}
