<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Model\Brands;
use App\Models\AboutUs;
use App\Models\Car;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders  = Slider::latest()->get();
        $teams    = Team::all()->random(4);
        $latestCar = Car::with('data','category','sub_category')->latest()->take(6)->get();
        $categories = Category::all();

        return view('site.index',compact('sliders','teams','latestCar','categories'));

    }





    public function testPage(){
        $cars = Car::where('price','>',10)->get();
        return view('site.test',compact('cars'));
    }









    public function about(){
        $abouts = AboutUs::all();
        $brands = Brands::all();
        return view('site.about',compact('abouts','brands'));
    }

    public function posts(){
        $posts = Post::latest()->get();
        return view('site.posts',compact('posts'));
    }

    public function allTeam(){
        $teams = Team::latest()->get();
        return view('site.team',compact('teams'));
    }
}
