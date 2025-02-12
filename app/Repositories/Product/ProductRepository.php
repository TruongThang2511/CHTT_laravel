<?php

namespace App\Repositories\Product;


use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }
    public function getRelatedProducts($product, $limit = 4){
        return $this->model->where('product_category_id', $product->product_category_id)
            ->where('tag', $product->tag)
            ->limit($limit)
            ->get();
    }


    public function getFeaturedProductsByCategory(int $categoryId)
    {
        return $this->model->where('featured', true)
            ->where('product_category_id', $categoryId)
            ->get();
    }

    public function getProductOnIndex($request)
    {

        $search = $request->search ?? '';

        $products = $this->model->where('name','like','%'. $search.'%');

        $products = $this->sort($products, $request);

        return $products;
    }

    public function getProductsByCategory($categoryName, $request)
    {
        $products = ProductCategory::where('name', $categoryName)->first()->products->toQuery();
        $products = $this->sort($products, $request);

        return $products;
    }

    public function sort($products, $request)
    {
        $sortBy = $request->sort_by ?? 'latest';
        switch ($sortBy) {
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            case 'price-ascending':
                $products = $products->orderBy('discount');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('discount');
                break;
            default:
                $products = $products->orderBy('id');
        }
        $products = $products->paginate(3);
        $products->appends(['sortBy' => $sortBy]);
        return $products;
    }


}
