<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('website.home.index');
    }
    public function about()
    {
        return view('website.about.index');
    }
    public function traningCategory()
    {
        return view('website.training-category.index');
    }

    public function allTraining()
    {
        return view('website.training.index');
    }

    public function contact()
    {
        return view('website.contact.index');
    }

    public function auth()
    {
        return view('website.auth.index');
    }
}
