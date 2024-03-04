<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AddressUser;
use App\Models\basket;
use App\Models\permission;
use App\Models\role;
use App\Models\store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    public function userList()
    {
        $monthone = new Helper();
        $monthonePrice =$monthone->farvardin();
  
        $monthtwo = new Helper();
        $monthtwoPrice =$monthtwo->ordibehesht();
  
        $monththree = new Helper();
        $monththreePrice =$monththree->Khordad();
  
        $monthtir = new Helper();
        $monthtirPrice =$monthtir->Tir();
  
        $monthfive = new Helper();
        $monthfivePrice =$monthfive->mordad();
  
        $monthsix = new Helper();
        $monthsixPrice =$monthsix->shahrivar();
  
        $monthseven = new Helper();
        $monthsevenPrice =$monthseven->mehr();
  
        $montheight = new Helper();
        $montheightPrice =$montheight->aban();
  
        $monthnine = new Helper();
        $monthtninePrice =$monthnine->azar();
  
        $monthten = new Helper();
        $monthtenPrice =$monthten->dayMah();
  
        $montheleven = new Helper();
        $monthelevenPrice =$montheleven->bahman();
  
        $monthtewelve = new Helper();
        $monthtewelvePrice =$monthtewelve->esfand();

        $store = store::orderByDesc('created_at')->first();
     
        $users= User::paginate(10);
        return view('admin.user.user_list' ,[
            'users' =>$users,
            'store' => $store,

            'monthonePrice' => $monthonePrice,
            'monthtwoPrice' => $monthtwoPrice,
            'monththreePrice' => $monththreePrice,
            'monthtirPrice' => $monthtirPrice,
            'monthfivePrice' => $monthfivePrice,
            'monthsixPrice' => $monthsixPrice,
      
            'monthsevenPrice' => $monthsevenPrice,
            'montheightPrice' => $montheightPrice,
            'monthtninePrice' => $monthtninePrice,
            'monthtenPrice' => $monthtenPrice,
            'monthelevenPrice' => $monthelevenPrice,
            'monthtewelvePrice' => $monthtewelvePrice
        ]);
    }

    public function userCreate()
    {
        $store = store::orderByDesc('created_at')->first();
       
        $roles=role::all();

        $monthone = new Helper();
        $monthonePrice =$monthone->farvardin();
  
        $monthtwo = new Helper();
        $monthtwoPrice =$monthtwo->ordibehesht();
  
        $monththree = new Helper();
        $monththreePrice =$monththree->Khordad();
  
        $monthtir = new Helper();
        $monthtirPrice =$monthtir->Tir();
  
        $monthfive = new Helper();
        $monthfivePrice =$monthfive->mordad();
  
        $monthsix = new Helper();
        $monthsixPrice =$monthsix->shahrivar();
  
        $monthseven = new Helper();
        $monthsevenPrice =$monthseven->mehr();
  
        $montheight = new Helper();
        $montheightPrice =$montheight->aban();
  
        $monthnine = new Helper();
        $monthtninePrice =$monthnine->azar();
  
        $monthten = new Helper();
        $monthtenPrice =$monthten->dayMah();
  
        $montheleven = new Helper();
        $monthelevenPrice =$montheleven->bahman();
  
        $monthtewelve = new Helper();
        $monthtewelvePrice =$monthtewelve->esfand();

        return view('admin.user.User_Create' ,[
            'roles'=>$roles,
            'store' => $store,

            'monthonePrice' => $monthonePrice,
            'monthtwoPrice' => $monthtwoPrice,
            'monththreePrice' => $monththreePrice,
            'monthtirPrice' => $monthtirPrice,
            'monthfivePrice' => $monthfivePrice,
            'monthsixPrice' => $monthsixPrice,
      
            'monthsevenPrice' => $monthsevenPrice,
            'montheightPrice' => $montheightPrice,
            'monthtninePrice' => $monthtninePrice,
            'monthtenPrice' => $monthtenPrice,
            'monthelevenPrice' => $monthelevenPrice,
            'monthtewelvePrice' => $monthtewelvePrice
        ]);
    }

    public function Access()
    {
        $store = store::orderByDesc('created_at')->first();
      
        $permissions= permission::all();

        $monthone = new Helper();
        $monthonePrice =$monthone->farvardin();
  
        $monthtwo = new Helper();
        $monthtwoPrice =$monthtwo->ordibehesht();
  
        $monththree = new Helper();
        $monththreePrice =$monththree->Khordad();
  
        $monthtir = new Helper();
        $monthtirPrice =$monthtir->Tir();
  
        $monthfive = new Helper();
        $monthfivePrice =$monthfive->mordad();
  
        $monthsix = new Helper();
        $monthsixPrice =$monthsix->shahrivar();
  
        $monthseven = new Helper();
        $monthsevenPrice =$monthseven->mehr();
  
        $montheight = new Helper();
        $montheightPrice =$montheight->aban();
  
        $monthnine = new Helper();
        $monthtninePrice =$monthnine->azar();
  
        $monthten = new Helper();
        $monthtenPrice =$monthten->dayMah();
  
        $montheleven = new Helper();
        $monthelevenPrice =$montheleven->bahman();
  
        $monthtewelve = new Helper();
        $monthtewelvePrice =$monthtewelve->esfand();

        return view('admin.user.Access' ,[
            'permissions' =>$permissions,
            'store' => $store,

            'monthonePrice' => $monthonePrice,
            'monthtwoPrice' => $monthtwoPrice,
            'monththreePrice' => $monththreePrice,
            'monthtirPrice' => $monthtirPrice,
            'monthfivePrice' => $monthfivePrice,
            'monthsixPrice' => $monthsixPrice,
      
            'monthsevenPrice' => $monthsevenPrice,
            'montheightPrice' => $montheightPrice,
            'monthtninePrice' => $monthtninePrice,
            'monthtenPrice' => $monthtenPrice,
            'monthelevenPrice' => $monthelevenPrice,
            'monthtewelvePrice' => $monthtewelvePrice
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

    public function userInsert()
    {
        # code...
    }

    public function viewprofile($id)
    {
        $store = store::orderByDesc('created_at')->first();
        $user= User::find($id);

        $monthone = new Helper();
        $monthonePrice =$monthone->farvardin();
  
        $monthtwo = new Helper();
        $monthtwoPrice =$monthtwo->ordibehesht();
  
        $monththree = new Helper();
        $monththreePrice =$monththree->Khordad();
  
        $monthtir = new Helper();
        $monthtirPrice =$monthtir->Tir();
  
        $monthfive = new Helper();
        $monthfivePrice =$monthfive->mordad();
  
        $monthsix = new Helper();
        $monthsixPrice =$monthsix->shahrivar();
  
        $monthseven = new Helper();
        $monthsevenPrice =$monthseven->mehr();
  
        $montheight = new Helper();
        $montheightPrice =$montheight->aban();
  
        $monthnine = new Helper();
        $monthtninePrice =$monthnine->azar();
  
        $monthten = new Helper();
        $monthtenPrice =$monthten->dayMah();
  
        $montheleven = new Helper();
        $monthelevenPrice =$montheleven->bahman();
  
        $monthtewelve = new Helper();
        $monthtewelvePrice =$monthtewelve->esfand();
      
        return view('admin.user.Profile_Operator', [
            'user'=>$user,
            'store' => $store,
            'monthonePrice' => $monthonePrice,
            'monthtwoPrice' => $monthtwoPrice,
            'monththreePrice' => $monththreePrice,
            'monthtirPrice' => $monthtirPrice,
            'monthfivePrice' => $monthfivePrice,
            'monthsixPrice' => $monthsixPrice,
      
            'monthsevenPrice' => $monthsevenPrice,
            'montheightPrice' => $montheightPrice,
            'monthtninePrice' => $monthtninePrice,
            'monthtenPrice' => $monthtenPrice,
            'monthelevenPrice' => $monthelevenPrice,
            'monthtewelvePrice' => $monthtewelvePrice
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

        $basket= basket::where('user_id' ,'=',Auth::user()->id)
        ->where('is_pay' ,'=',0)
        ->orderByDesc('created_at')->first();
   
     
        $basket->is_pay=1;
        $basket->update();

        return redirect(route('home'));
        
    }

    public function userEdit(Request $request)
    {
       $user= user:: findorfail($request->id);
       $randomNumber = random_int(100, 9999);

       if ($user->email != $request->email)
       {
       $request->validate([
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
       ]);
       }

       
       $user->name =$request->name;
       $user->email =$request->email;
       $user->password =Hash::make($request->password);
       $user->tel =$request->tel;
      
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

           return  redirect(route('admin'));
    
    }

    public function userSiteEdit(Request $request)
    {
        $user= user:: findorfail($request->id);
        $randomNumber = random_int(100, 9999);
 
        if ($user->email != $request->email)
        {
        $request->validate([
         'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        }
 
        
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =Hash::make($request->password);
        $user->tel =$request->tel;
       
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
 
            return  redirect(route('home'));
    }
}
