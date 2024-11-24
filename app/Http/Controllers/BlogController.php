<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BlogController extends Controller
{
    public function index(){
        
        $blogpost= Blogpost::all();
        return view('Backend.Pages.bloglist', compact('blogpost'));
    }
    public function createblog(){
        return view('Backend.Pages.creatblog');
    }

    public function Storeblog(Request $request){
        //dd($request->all());
        $request->validate([
            'title'=> 'required',
            'slug'=> 'required',
            'content'=> 'required'

        ]);

        
        $fileName=null;
       
        //check file exist
        if($request->hasFile('image'))
        {
       
            $file=$request->file('image');

            //file name generate
            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();

             //file store where i want to 
            $file->storeAs('/',$fileName);
       
        }

        $blogpost = Blogpost::create([
            'title' => $request -> title,
            'slug' => $request -> slug , 
            'content' => $request -> content,
            'image'=> $fileName
            
        ]);
        notify()->success('Blog added successfully.');
        return redirect()->route('blog.index');

    }


}
