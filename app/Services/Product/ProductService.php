<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    public $repository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function find(int $id)
    {
        $product =  $this->repository->find($id);

        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(), column_key: 'rating'));
        $countRating = count($product->productComments);
        if ($countRating != 0) {
            $avgRating = $sumRating/$countRating;
        }

        $product->avgRating = $avgRating;

        return $product;
    }

    public function getRelatedProducts($product, $Limit = 4)
    {
        return $this->repository->getRelatedProducts($product, $Limit);
    }

    public function getFeaturedProducts()
    {
        return [
            'men' => $this->repository->getFeaturedProductsByCategory( categoryid: 1),
            'women' => $this->repository->getFeaturedProductsByCategory( categoryid: 2),
        ];
    }

    public function getProductOnIndex($request)
    {
        return $this->repository->getProductOnIndex($request);
    }

    public function getProductsByCategory($categoryName, $request)
    {
        return $this->repository->getProductsByCategory($categoryName, $request);
    }
}
