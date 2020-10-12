<?php

namespace App\Http\Controllers\API\Products;

use app\Helpers\Helpers;
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
            'sell_price' => 'required',
            'quantity' => 'required',
        ]);

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->sku = Helpers::getSKUProduct($request->name, $request->id);
        $product->barcode = Helpers::getBarcodeProduct($request->name);
        $product->description = $request->description;
        //TODO: store image in storage path
        $product->image = $request->image;
        $product->quantity = $request->quantity;
        $product->quantity_alert = $request->quantity_alert;
        $product->purchase_price = $request->purchase_price;
        $product->cost_price = Helpers::calculateCostPrice(0, 0, $request->purchase_price, $request->quantity);
        $product->sell_price = $request->sell_price;
        $product->status = $request->status;

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
            'sell_price' => 'required',
            'quantity' => 'required',
        ]);

        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->sku = Helpers::getSKUProduct($request->name, $request->id);
        $product->barcode = Helpers::getBarcodeProduct($request->name);
        $product->description = $request->description;
        //TODO: update image in storage path
        $product->image = $request->image;
        $product->quantity = $request->quantity;
        $product->quantity_alert = $request->quantity_alert;
        $product->cost_price = Helpers::calculateCostPrice($product->purchase_price, $product->quantity, $request->purchase_price, $request->quantity);
        $product->purchase_price = $request->purchase_price;
        $product->sell_price = $request->sell_price;
        $product->status = $request->status;

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
        //TODO: delete image from storage path

        $product->delete();
        return response()->json(['message' => 'Product deleted successfuly'], 200);
    }
}
