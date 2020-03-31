<?php

namespace MaXiaofei\OpencenterForLaravel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function hello($name)
    {
//        echo 'HelloWorldController hello ' . $name;
        $package_name = config('maxiaofei.package_name',null);
        return view('maxiaofei::hello', compact('name','package_name'));
    }

    public function world($name)
    {
//        echo 'HelloWorldController world ' . $name;
        return view('maxiaofei::world', compact('name'));
    }
}
