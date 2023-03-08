<?php

namespace App\Http\Controllers\Activate;

use App\Http\Controllers\Controller;
use App\Services\Activate\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        $products = $this->productService->getProducts();

        return view('activate.product.index', compact(
            'products',
        ));

    }
}
