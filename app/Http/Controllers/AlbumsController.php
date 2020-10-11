<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;
class AlbumsController extends Controller
{
    public function index(){
    //  return view('albums.index',compact('user'));
    $albums=Album::get();
    //dd($albums);
    return view('albums.index',[
      'albums'=>$albums,
    ]);


      //$albums=Album::with('photo')->get();
    //  return view('albums.index')->with('albums',$albums);
    }

    public function create(){
      return view('albums.create');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
      'name'=>'required',
      'Discription'  =>'required',
      'cover-image'=>'required|image'
    ]);

    $filenameWithExtension=$request->file('cover-image')->getClientOriginalName();
    $filename =pathinfo($filenameWithExtension, PATHINFO_FILENAME);

    $extension=$request->file('cover-image')->getClientOriginalExtension();

    $filenameToStore=$filename . '-'.time().'.'.$extension;

//saving the pic and with php artisan storage:link
$request->file('cover-image')->storeAs('public/album-covers',$filenameToStore);
//    dd($filenameToStore);
    //dd($path);
    $album =new Album();
    //album->name ,album->description are from database from the modul
    $album->name=$request->input('name');
    $album->Description=$request->input('Discription');
    $album->cover_image=$filenameToStore;
$album->save();

return redirect('/albums')->with('success','Album created successfully');
    }


    public function show($id){
      $album=Album::with('photos')->find($id);
      return view('albums.show')->with('album',$album);
    }
}
