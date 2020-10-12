<?php

namespace App\Http\Controllers\API\HumanResources;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
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
        return ClientResource::collection(Client::paginate(5));
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
            'client_type' => 'required',
            'name' => 'required|unique:customers,name',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $client = new Client;
        $client->client_type = $request->client_type;
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->description = $request->description;

        $client->save();

        return new ClientResource($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);

        return new ClientResource($client);
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
        $client = Client::findOrFail($id);

        $this->validate($request, [
            'client_type' => 'required',
            'name' => [
                'required',
                Rule::unique('clients')->ignore($client->id),
            ],
            'phone' => 'required',
            'address' => 'required',
        ]);

        $client->client_type = $request->client_type;
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->description = $request->description;

        $client->update();

        return new ClientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json(['message' => 'client deleted successfuly'], 200);
    }
}
