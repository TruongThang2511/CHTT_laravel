<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;
use App\Services\BaseService;

class ProductServices extends BaseService implements ProductServicesInterface
{
    public $repository;

    public function __construct(ProductRepository $repository){
        $this->repository = $repository;
    }

    public function find($id)
    {
        $product =  $this->repository->find($id);

        $avgRating = array_sum(array_column($product->productComments->toArray(), 'rating'));
        $countRating = count($product->productComments);
        if($countRating != 0){
            $avgRating = $avgRating / $countRating;
        }

        $product->avgRating = $avgRating;

        return $product;
    }

    public function getRelatedProducts($product, $limit = 4)
    {
        return $this->repository->getRelatedProducts($product,$limit);
    }

    public function getFeaturedProducts()
    {
        return [
            "men" => $this->repository->getFeaturedProductsByCategory(1),
            "women" => $this->repository->getFeaturedProductsByCategory(2),
        ];
    }

    public function getProductOnIndex($request)
    {
        return $this->repository->getProductOnIndex($request);
    }

    public function getProductsByCategory($categoryName, $request){
        return $this->repository->getProductsByCategory($categoryName, $request);
    }
}
