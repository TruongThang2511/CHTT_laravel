<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;
use App\Services\ServiceInterface;

interface ProductServicesInterface extends ServiceInterface
{
    public function getRelatedProducts($product, $limit = 4);
    public function getFeaturedProducts();
    public function getProductOnIndex($request);
    public function getProductsByCategory($categoryName, $request);
}
