<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homePage()
    {
        $animals = ["meowsalot", "barksalot", "helloone"];
        return view("homepage", ["animals" => $animals]);
    }
    public function aboutPage()
    {
        return '<h1>About Page</h1><a href="/">Home</a>';
    }
}
