<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class shoppingController extends Controller
{
    public function index()
    {
        return view('frontend.shopping.landing');
    }

    public function productDetail($name)
    {
        return view('frontend.shopping.productDetail');
    }

    public function promo()
    {
        return view('frontend.shopping.promo');
    }

    public function storeDetail($name)
    {
        return view('frontend.shopping.storeDetail');
    }

    public function categories()
    {
        return view('frontend.shopping.category.allCategories');
    }

    public function category($name)
    {
        return view('frontend.shopping.category.detailCategories');
    }
}
