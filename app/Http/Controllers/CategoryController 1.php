<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use App\Models\store;
use Laravel\Ui\Presets\Bootstrap;

class CategoryController extends Controller
{
    public function categoryList()
    { 
        $store = store::orderByDesc('created_at')->first();
       
       $categories = Category::where('DeleteStatuse', '=',0)->paginate(10);
    
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

         return view('admin.Category.Category-List' , [
            'categories' => $categories,
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
 
    public function CategoryCreate()
    {
        $store = store::orderByDesc('created_at')->first();

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
       
       return view('admin.Category.Categori-Create',[ 
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
 
    public function CategoryInsert(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:categories,name',
            'description' => 'max:500',

        ]);
    
        $randomNumber = random_int(100, 9999);
       $category = new Category();
       $category->name=$request->name;
       $category->description = $request->description;
       $image=time().'-'. $randomNumber.$request->image->getClientOriginalName();
       $request->image->move(public_path('image'),$image);
       $category->image = $image;
       $category->save();
 
       return redirect(route('category-List'))->with('done','دسته مورد نظر با موفقیت اضافه شد.');
    }
 
   

    public function CategoryDelete($id)
    {
       $category= Category::findorfail($id);
       $category->DeleteStatuse='1';
       $category->save();
        return redirect(route('category-List'))->with('deletedone','حذف با موفقیت اضافه شد.');
        
    }


    public function CategoryEdit($id)
    {
        $store = store::orderByDesc('created_at')->first();
        
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

       $category = Category::findorfail($id);
       return view('admin.Category.Category-Edit' ,[
        'category' =>  $category,
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

    public function CategoryUpdate(Request $request)
    {
       
       $category =  Category::findorfail($request->input('id'));
      
       $request->validate([
        'description' => 'max:500',
        ]);

        if($category->name != $request->input('name'))
        {
            $request->validate([

                'name' => 'required|unique:categories,name'
            ]);
        }
     
        $category->name =$request->input('name');
        $category->description =$request->input('description');
        $category->update();

         return redirect(route('category-List'))->with('editdone','تغییرات با موفقیت انجام شد.');
        
    }
}
