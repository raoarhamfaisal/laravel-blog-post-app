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
        return view("single-post");
    }
}
