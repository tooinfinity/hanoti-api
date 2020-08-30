<?php

namespace App\Http\Controllers\API\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);

        $this->middleware(['role:manager'])->only('index', 'store', 'update', 'show');

        $this->middleware(['role:cashier'])->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'unit_id' => 'required',
            'name' => 'required|unique:products,name',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ]);

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->image = $request->image;

        $product->save();

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'category_id' => 'required',
            'unit_id' => 'required',
            'name' => [
                'required',
                Rule::unique('products')->ignore($product->id),
            ],
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ]);

        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->image = $request->image;

        $product->update();

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        return response()->json(['message' => 'Product deleted successfuly'], 200);
    }
}
