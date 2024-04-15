<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Product\ProductServicesInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productService;

    public function __construct(ProductServicesInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $featuredProducts = $this->productService->getFeaturedProducts();

        return view('front.index',compact('featuredProducts'));
    }
}
