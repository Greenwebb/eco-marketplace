<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::all();
    }

    public function find($id)
    {
        return Product::find($id);
    }
    public function create($request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            // 'status' => 'required|string|in:published,draft,scheduled,inactive',
            'tags' => 'nullable|string',
            'disc_type' => 'nullable|string',
            'fixed_price' => 'nullable|numeric',
            'tax_class' => 'nullable|string',
            'vat' => 'nullable|numeric',
            'sku' => 'nullable|string',
            'barcode' => 'nullable|string',
            'shelf_qty' => 'nullable|integer',
            'warehouse_qty' => 'nullable|integer',
            // 'allow_backorder' => 'boolean',
            // 'weight' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'meta_title' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Adjust the file validation rules as needed
        ]);
    
        // Handle file upload (if an avatar is provided)
        
        if ($request->hasFile('avatar')) {
            // Store the uploaded file and get its path
            $avatarPath = $request->file('avatar')->store('products/avatars', 'public');
            // dd($avatarPath);
            // Add the avatar path to the validated data
            $validatedData['image'] = $avatarPath;
        }
    
        // Create the product with the validated data
        $product = Product::create($validatedData);
        // Redirect back with a success message or perform any other actions as needed
        
    }

    public function destroy($product)
{
    // Implement any logic to check if the user is authorized to delete the product.
    
    // Delete the product
    $product->delete();

    // Redirect to the product list page or any other appropriate page.
    return redirect()->route('products.index')->with('success', 'Product deleted successfully');
}

    
}