<?php

namespace App\Http\Controllers;

use App\Models\AddressUser;
use App\Models\basket;
use App\Models\permission;
use App\Models\role;
use App\Models\User;
use DragonCode\Contracts\Cashier\Auth\Auth as AuthAuth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserApiController extends Controller
{
public function ActiveUser($user_id) {
    $user = User::find ($user_id);
    return response(['user'=>$user]);
    
}

public function roleList()  {
    $roles= role::all();

   return response(['roles'=>$roles]);
    
}
public function roleName()  {
    $roles= role::all();

   return response(['roles'=>$roles]);
    
}

    public function register(Request $request)
    {
        // $randomNumber = random_int(100, 9999);
        // $image = time().'-'. $randomNumber.  $request->image->getClientOriginalName();
        // $request->image->move(public_path('image'),$image);

        $data =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', ],
            'tel' => ['required', 'numeric', 'digits:11'],

        ]);

       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tel' => $data['tel'],
            // 'image' => $data['image'],
             'role_id'=> role::where('name','=','user')->first()->id
        ]);
           
            $token = $user->createToken('yari')->plainTextToken;
            return  response(['token' => $token,'user'=>$user], 200);
        
     
    

    }

    public function login(Request $request)
    {
        $data =$request->validate( [
   
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = user::where('email' , '=', $data['email'])->first();
 
        if (!$user || ! Hash::check( $data['password'] , $user->password))
         {
              return response(['status' => "User Not Found"] , 401);
  
        }
  
        $token =$user ->createToken('yari')->plainTextToken;
        return response(['token' => $token,'user'=>$user], 200);

    }

    public function logout()
    {
       Auth::user()->tokens->delete();
       // Auth::logout();
        return response('LogOut' , 200);
    }


    public function userList()
    {
        $users= User::all();
        return response(['users' =>$users]);
    }

    public function userSiteList()
    {
        $users= User::all();
        return response(['users' =>$users]);
    }

    public function userCreate()
    {

        $roles=role::all();

        return view('admin.user.User_Create' ,[
            'roles'=>$roles,
         
        ]);
    }

    public function Access()
    {
      
      
        $permissions= permission::all();

        

        return view('admin.user.Access' ,[
            'permissions' =>$permissions,
        
        ]);
    }

    public function AccessInsert(Request $request)
    { 
        $role=new role();
        $role->name=$request->name;
        $role->save();
        $role_id=$role->id;

         $permission=new permission();
         $permission->create=$request->create ?? 0;
         $permission->read=$request->read ?? 0;
         $permission->edit=$request->edit ?? 0;
         $permission->delete=$request->delete ?? 0;
         $permission->role_id= $role_id;
         
         $permission->save();
 
        // $role->permissions()->attach($request->input('access'));
        return redirect()->back();
    }

    public function userInsert(Request $request)
    {
        // $randomNumber = random_int(100, 9999);
        // $image = time().'-'. $randomNumber.  $request->image->getClientOriginalName();
        // $request->image->move(public_path('image'),$image);

         $data =$request->validate( [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', ],
        

          ]);

        $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id'=> $request->role_id
            ]);
        //  $token = $user->createToken('yari')->plainTextToken;
        return  response(['user'=>$user], 200);
    }

    public function viewprofile($id)
    {
        
        $user= User::find($id);

      
        return view('admin.user.Profile_Operator', [
            'user'=>$user,
           
        ]);
    }

    public function adddressInsert(Request $request)
    {
       
        $request->validate([
            'tel' => 'min:11|max:11',
            'code' => 'max:11'
            ]);
        $addressuser = new AddressUser();
        $addressuser->name = $request->name;
        $addressuser->ostan = $request->ostan;
        $addressuser->shahr = $request->shahr;
        $addressuser->code = $request->code;
        $addressuser->tel = $request->tel;
        $addressuser->address = $request->address;
        $addressuser->user_id = Auth::user()->id;

        $addressuser->save();
        $address_id =  $addressuser-> id ;

        $basket= basket::where('user_id' ,'=',Auth::user()->id)
        ->where('is_pay' ,'=',0)
        ->orderByDesc('created_at')->first();
        $basket->address_id = $address_id;
   
     
        $basket->is_pay=1;
        $basket->update();

        return response(['addressuser'=>$addressuser , 'basket'=>$basket]);
        
    }

    public function userEdit(Request $request)
    {
       $user= user:: findorfail(Auth::user()->id);
       $randomNumber = random_int(100, 9999);

       if ($user->email != $request->email && $request->email)
       {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);
            $user->email =$request->email;
       }

       if($request->name){
           $user->name =$request->name;
       }


       if($request->password){
          $user->password =Hash::make($request->password);
        }

        if($request->tel){
            $request->validate([
                'tel' => ['required', 'numeric', 'digits:11']
            ]);
            $user->tel =$request->tel;
        }


      
          if ($request -> file('image'))
             {
                $request ->validate([
                'image' => 'required|mimes:png,jpg|max:99999'
                ]);
                $image= time().'-'. $randomNumber.$request -> file('image')->getClientOriginalName();
                $request -> file('image') ->move(public_path('image') , $image);
                $user->image= $image;
             }

             

             $user->update();

           return  response(['user'=>$user]);
    
    }

    public function userSiteEdit(Request $request)
    {
        $user= user:: findorfail(Auth::user()->id);
        $randomNumber = random_int(100, 9999);
 
        if ($user->email != $request->email  && $request->email)
        {
            $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);
            $user->email =$request->email;

        }
 
        
        if($request->name){
            $user->name =$request->name;
        }
       
        if($request->password){
            $user->password =Hash::make($request->password);
          }
       
          if($request->tel){
            $request->validate([
                'tel' => ['required', 'numeric', 'digits:11']
            ]);
            $user->tel =$request->tel;
        }
       
        if ($request -> file('image'))
            {
                $request ->validate([
                'image' => 'required|mimes:png,jpg|max:99999'
                ]);
                $image= time().'-'. $randomNumber.$request -> file('image')->getClientOriginalName();
                $request -> file('image') ->move(public_path('image') , $image);
                $user->image= $image;
            }
              $user->update();
 
            return  response(['user'=>$user]);
    }
}
