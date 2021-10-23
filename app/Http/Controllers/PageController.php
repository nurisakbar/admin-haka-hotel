<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Faq;

class PageController extends Controller
{
    public function home()
    {
        $data['test'] = "";
        return view('home', $data);
    }
}
