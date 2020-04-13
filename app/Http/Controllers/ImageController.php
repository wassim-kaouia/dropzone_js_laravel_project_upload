<?php

namespace App\Http\Controllers;

use App\Image;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
   public function destroy($id){
        // dd($id);
        $image = Image::findOrFail($id);
        // dd($image);
        if(Storage::delete('public/images/'.$image->path)){
            // dd('ok');
            //if we delete successfully the image from storage
            $image->delete(); // delete the image from DB 
            Session::flash('message','Image Deleted !');
            return redirect()->back();
        }else{
            // dd('non');
            Session::flash('message','Images Not Deleted !');
            return redirect()->back();
        }
   }
}
