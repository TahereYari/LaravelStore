<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Product;
use App\Models\store;
use Illuminate\Http\Request;

class AdminCategoryApiController extends Controller
{
  
    public function categoryList()
    {
        return Category::where('DeleteStatuse', '=',0)->paginate(10);
        // return response([ 'categories' => $categories ]);
       
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
       return response(['category'=>$category], 200);
 
     //  return redirect(route('category-List'))->with('done','دسته مورد نظر با موفقیت اضافه شد.');
    }
 
   

    public function CategoryDelete($id)
    {
       $category= Category::findorfail($id);
       $category->DeleteStatuse='1';
       $category->save();
       return response("Deleted");
        
    }

public function CategoryOne($id) 
{
      $category =  Category::findorfail($id);
       return response(['category' => $category]);
 }

    public function CategoryUpdate(Request $request,$id)
    {
      // $category =  Category::findorfail($request->input('id'));
      $randomNumber = random_int(100, 9999);
       $category =  Category::findorfail($id);
       


        if($request->description)
        {
            $request->validate([
                'description' => 'max:500',
            ]);
            $category->description =$request->description;
        }
        

        if($category->name != $request->input('name') && $request -> name)
        {
            $request->validate([

                'name' => 'required|unique:categories,name'
            ]);
            $category->name =$request->name;
        }

        $image=false;
        
        if ($request -> file('image'))
         {
            $request ->validate([
            'image' => 'required|mimes:png,jpg|max:99999'
            ]);
            $image= time().'-'. $randomNumber.$request -> file('image')->getClientOriginalName();
            $request -> file('image') ->move(public_path('image') , $image);
            $category->image= $image;
         }
     
       
       
        $category->save();
      

         return response(['category' => $category]);
        
    }

    public function categoryProduct($id) {
        $category =  Category::findorfail($id);
        $products = Product::where('category_id' , '=' , $id)->get();
        return response(['products'=>$products , 'category' => $category]);
        
    }
}
