<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function home()
    {
        return view('welcome', ['products' => Product::all(), 'categories' => Category::all()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        return view('product.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('product.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $attributes['image'] = 'images/'.$imageName;
            Product::create($attributes);
            return back()->with('message', 'Product Create success');
        }else{
            return back()->withInput($request->all(['category_id', 'name', 'details']))->with('Image is not selected');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
       return view('product.edit', ['product' => $product, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $attributes = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $attributes['image'] = 'images/'.$imageName;
        }

        $product->update($attributes);
        return redirect()->route('product.index')->with('message', 'update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product): RedirectResponse
    {
       if (file_exists(public_path($product->image))){
           File::delete(public_path($product->image));
       }
       $product->delete();
       return back()->with('message', 'Delete Success');
    }
}
