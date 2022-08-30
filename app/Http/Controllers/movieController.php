<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\category;
use App\Models\country;
use App\Models\genre;
class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Danh sách phim';
        $list = movie::with('category', 'genre','country')->orderBy('id', 'DESC')->get();
        return view('admin.movie.list',compact('title','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm phim';
        $category= category::pluck('title','id');
        $genre= genre::pluck('title','id');
        $country= country::pluck('title','id');
       
        return view('admin.movie.form',compact('title','genre','country','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new movie();
        $movie->title =  $data['title'];
        $movie->slug =  $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->genre_id = $data['genre_id'];

        // Thêm hình ảnh
        $get_image = $request->file('image');
        $path = 'uploads/movie/'; 

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();  // hinhanh1.jpg
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //hinhanh12345.jpg
            $get_image->move($path,$new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Sửa phim';
        $category= category::pluck('title','id');
        $genre= genre::pluck('title','id');
        $country= country::pluck('title','id');
        
        $movie = movie::find($id);
        return view('admin.movie.form',compact('title','genre','country','category','movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $movie = movie::find($id);
        $movie->title =  $data['title'];
        $movie->slug =  $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->genre_id = $data['genre_id'];

        // Thêm hình ảnh
        $get_image = $request->file('image');
        $path = 'uploads/movie/'; 

        if($get_image){

            if(!empty($movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }
            
            $get_name_image = $get_image->getClientOriginalName();  // hinhanh1.jpg
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //hinhanh12345.jpg
            $get_image->move($path,$new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = movie::find($id);

        if(!empty($movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }

        $movie->delete();
        return redirect()->back();
    }
}
