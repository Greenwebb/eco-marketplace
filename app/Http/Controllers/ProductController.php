<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();
        // return response()->json($products);    
        return view('pages.products.index', [
            'products' => $products
        ]);
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);
        // dd($product);
        // if (!$product) {
        //     return response()->json(['message' => 'Product not found'], 404);
        // }
        // return response()->json($product);
    
        return view('product-detail', [
            'product' => $product
        ]);
    }

    public function create()
    {
        // $product = $this->productRepository->find($id);
        // dd($product);
        // if (!$product) {
        //     return response()->json(['message' => 'Product not found'], 404);
        // }
        // return response()->json($product);
    
        return view('pages.products.create');
    }

    public function store(Request $request){
        // dd($request);
        try {
            $product = $this->productRepository->create($request);
            return redirect()->route('product.index')->with('success', 'Product created successfully.');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    
    public function destroy(Product $product)
    {
        try {
            $product = $this->productRepository->destroy($product);
            return redirect()->route('product.index')->with('success', 'Product deleted successfully');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    
}
