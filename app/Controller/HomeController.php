<?php


namespace App\Controller;

use App\Model\Product;

class HomeController
{


    public function index()
    {



        $products = Product::all();




        return view('homepage',compact('products'));

    }
    public function login()
    {

        return view('auth/login');

    }

}