<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redis;


class CategoryController extends Controller
{
     Public function List()
     {

      //$allcategory = Category::all(); 
      $allCategory = Category::paginate(4);

      return view('Backend.category', compact('allCategory'));

     }

     public function createform()
     {
      $allcategory = Category::all(); 
        return view('Backend.createcategory',compact('allcategory'));
     }

     public function store( Request $request)
     {


      
         $validation = validator::make($request -> all(),
           [
           'cat_name' => 'required|min:5', 

          
            
            
         
           ]);

         
           if($validation->fails())
           {
             notify()->error($validation->getMessageBag());
             return redirect()->back();
           }
          // dd($request->all());

          //Step-4 if $request-> hasFile mane image asche kina check korbo
          if($request->hasFile('cat_image')){  
            $file=$request->file('cat_image'); //file name generate korbo (unique name hote hobe)

             $image=date('Ymdhis').'.'.$file->getClientOriginalExtension(); //client er file name niye oita amader format e file save korbo 
             $file->storeAs('category',$image); //Project folder e store korbo (Config->filesystem e giye same name e dite hobe eikhane amra Category name e public e file name dichi)
          }

        //dd($request->all());

        //Query [Model::Function]
        Category::create([
        // bam pase table er column name => dan pase input field er name
         'name'=>$request->cat_name,
         'parent_id'=>$request->parent_id,
          'description'=>$request->cat_description
       
                  
     ]);

     return redirect()->route('category.list');

     

 }
 public function delete($pID){
  $category= Category::find($pID);
  $category-> delete();
  notify()->success('category Deleted successfully.');

  return redirect()->back();
}

  public function edit($pID){
     $category= Category::find($pID);
     $allCategory=Category::all();
        return view('Backend.pages.categoryedit',compact('allCategory','category'));
  }
  
  public function update(Request $request,$pID){
      $category= Category::find($pID);
      $category->update([
        'name'=>$request->cat_name,
        'description'=>$request->cat_description
     
     
    ]);
    notify()->success('Product updated successfully.');
        return redirect()->route('product.list');

}

}

