<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::query()->paginate(2);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $product = new Product();
        return view('products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }


        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {

            // Delete the old image if it exists
            // $image = public_path('storage/' . $product->image);
            // if ($product->image && File::exists($image)) {
            //     File::delete($image);
            // }

            // Store the new image and update the image path in the data array
            $data['image'] = $request->file('image')->store('products', 'public');
        } else {
            // If no new image is uploaded, keep the existing image
            $data['image'] = $product->image;
        }

        // Update the product with the new data
        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // if ($product->image && File::exists(public_path('storage/' . $product->image))) {
        //     File::delete(public_path('storage/' . $product->image));
        // }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully');
    }
}
