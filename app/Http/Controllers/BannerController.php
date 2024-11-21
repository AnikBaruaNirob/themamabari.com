<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
   public function CreateBanner(){

     $banners = Banner::all();
    return view('Backend.pages.Bannerlist',compact('banners'));

   }


   public function form(){

    
   return view('Backend.pages.Banner');

  }


    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'nullable',
            'image' => 'required',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            // Save the image information to the database (optional)
            Banner::create([
                'title' => $request->input('title'),
                'image' => $imageName,
            ]);
        }

        return redirect()->back()->with('success', 'Image Uploaded Successfully!');
    }
}
