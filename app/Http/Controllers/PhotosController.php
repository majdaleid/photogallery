<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;
class PhotosController extends Controller
{
  public function create(int $albumid){
    return view('photos.create')->with('albumid',$albumid);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
    'title'=>'required',
    'Discription'  =>'required',
    'photo'=>'required|image'
  ]);

  $filenameWithExtension=$request->file('photo')->getClientOriginalName();
  $filename =pathinfo($filenameWithExtension, PATHINFO_FILENAME);

  $extension=$request->file('photo')->getClientOriginalExtension();

  $filenameToStore=$filename . '-'.time().'.'.$extension;

//saving the pic and with php artisan storage:link
$request->file('photo')->storeAs('public/albums/'.$request->input('album-id'),$filenameToStore);
//    dd($filenameToStore);
  //dd($path);
  $photo =new photo();
  //album->name ,album->description are from database from the modul
  $photo->title=$request->input('title');
  $photo->Description=$request->input('Discription');
  $photo->photo=$filenameToStore;
  $photo->size=$request->file('photo')->getSize();
  $photo->album_id=$request->input('album-id');
$photo->save();
//die($request);
return redirect('/albums/' . $request->input('album-id'))->with('success', 'Photo uploaded successfully!');
  }


      public function show($id) {
          $photo = Photo::find($id);

          return view('photos.show')->with('photo', $photo);
      }

public function delete($id){
  $photo=Photo::find($id);
 //dd(Storage::delete('public/albums/'.$photo->album_id.'/'.$photo->photo));

 if(Storage::delete('public/albums/'.$photo->album_id.'/'.$photo->photo))
  $photo->delete();
  return redirect('/')->with('success','Photo deleted Successfully');
}


}
