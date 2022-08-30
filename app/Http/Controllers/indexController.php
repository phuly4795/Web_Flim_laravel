<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\country;
use App\Models\genre;
use App\Models\movie;
use App\Models\episode;
class indexController extends Controller
{
    
    public function home()
    {   

        $phim_hot = movie::where('phim_hot', 1)->where('status', 1)->get();
        $category = category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = genre::orderBy('id', 'ASC')->get();
        $country = country::orderBy('id', 'ASC')->get();
        $category_home = category::with('movie')->orderBy('id','ASC')->where('status', 1)->get();


        return view('pages.home', compact('category','genre', 'country','category_home','phim_hot'));
    }
    public function category($slug)
    {
        $category = category::orderBy('id','ASC')->where('status', 1)->get();
        $genre = genre::orderBy('id','DESC')->get();
        $country = country::orderBy('id','DESC')->get();

        $cate_slug = category::where('slug', $slug)->first();

        return view('pages.category', compact('category','genre', 'country','cate_slug'));

    }
    public function genre($slug)
    {
        $category = category::orderBy('id','ASC')->where('status', 1)->get();
        $genre = genre::orderBy('id','DESC')->get();
        $country = country::orderBy('id','DESC')->get();

        $gen_slug = category::where('slug', $slug)->first();

        return view('pages.genre', compact('category','genre', 'country'));
    }
    public function country($slug)
    {
        $category = category::orderBy('id','ASC')->where('status', 1)->get();
        $genre = genre::orderBy('id','DESC')->get();
        $country = country::orderBy('id','DESC')->get();
        return view('pages.country', compact('category','genre', 'country'));
    }
    public function movie()
    {
        return view('pages.movie');
    }
    public function watch()
    {
        return view('pages.watch');
    }
    public function episode()
    {
        return view('pages.episode');
    }
}
