<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subcategoryList()
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
       $subcategories = subcategory ::where('DeleteStatuse', '=',0)->paginate(10);
         return view('admin.SubCategory.subCategory-List' , [
            'subcategories' => $subcategories,

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
 
    public function subCategoryCreate()
    {
        $categories=Category::all();
       return view('admin.SubCategory.subCategory-Create' ,['categories' => $categories]);
    }
 
    public function subCategoryInsert(Request $request)
    {
        $request->validate([
            'subname' =>'required|unique:subcategories,subname',
            'subdescription' => 'max:500',

        ]);
   
 
       $subcategories =new subcategory();

       $subcategories->subname= $request->input('subname');
       $subcategories->subdescription= $request->input('subdescription');
       $subcategories->category_id= $request->input('category');

       $subcategories->save();
 
 
       return redirect(route('subcategory-List'));
    }
 
   

    public function subCategoryDelete($id)
    {
      $subcategory=  subcategory::findorfail($id);
      $subcategory->DeleteStatuse='1';
      $subcategory->save();
        return redirect(route('subcategory-List'));
        
    }


    public function subCategoryEdit($id)
    {
    
       $subcategory = subcategory::findorfail($id);
       $categories= Category::all();
       return view('admin.SubCategory.subCategory-Edit' ,['subcategory' =>  $subcategory ,'categories'=>$categories]);
    }

    public function subCategoryUpdate(Request $request)
    {
        
       $subcategory =  subcategory::findorfail($request->input('id'));

       $request->validate([
        'subdescription' => 'max:500',
        ]);

        if($subcategory->subname != $request->input('subname'))
        {
            $request->validate([

                'subname' => 'required|unique:subcategories,subname'
            ]);
        }
        $subcategory->subname= $request->input('subname');
        $subcategory->subdescription= $request->input('subdescription');
        $subcategory->category_id= $request->input('category');
 
        $subcategory->update();
         return redirect(route('subcategory-List'));
        
    }
}
