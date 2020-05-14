<?php
namespace App\Controllers;
use Core\App;
class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function aboutCulture()
    {
        return view('about-culture');
    }

    public function contact()
    {
        return view('contact');
    }
}