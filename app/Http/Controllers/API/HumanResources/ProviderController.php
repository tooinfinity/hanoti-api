<?php

namespace App\Http\Controllers\API\HumanResources;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderResource;

class ProviderController extends Controller
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
        return ProviderResource::collection(Provider::paginate(5));
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
            'name' => 'required|unique:providers,name',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $provider = new Provider;
        $provider->name = $request->name;
        $provider->phone = $request->phone;
        $provider->address = $request->address;
        $provider->description = $request->description;

        $provider->save();

        return new ProviderResource($provider);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::findOrFail($id);

        return new ProviderResource($provider);
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
        $provider = Provider::findOrFail($id);

        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('providers')->ignore($provider->id),
            ],
            'phone' => 'required',
            'address' => 'required',
        ]);

        $provider->name = $request->name;
        $provider->phone = $request->phone;
        $provider->address = $request->address;
        $provider->description = $request->description;

        $provider->update();

        return new ProviderResource($provider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();
        return response()->json(['message' => 'Provider deleted successfuly'], 200);
    }
}
