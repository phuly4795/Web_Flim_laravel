<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Danh mục phim';

        $list = category::orderBy('id', 'ASC')->get();
        return view('admin.category.list', compact('title','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title['title'] = 'Thêm danh mục phim';

        return view('admin.category.form',$this->title);
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
        $category = new category();
        $category->title =  $data['title'];
        $category->slug =  $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
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
        $title = 'Sửa danh mục phim';
        $category = category::find($id);
      
        return view('admin.category.form', compact( 'title','category'));
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
        $category = category::find($id);
        $category->title =  $data['title'];
        $category->slug =  $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
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
        category::find($id)->delete();
        return redirect()->back();
    }
    
  
}
