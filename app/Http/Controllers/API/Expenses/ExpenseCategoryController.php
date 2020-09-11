<?php

namespace App\Http\Controllers\API\Expenses;

use Illuminate\Http\Request;
use App\Models\CategoryExpense;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpenseCategoryResource;

class ExpenseCategoryController extends Controller
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
        return ExpenseCategoryResource::collection(CategoryExpense::paginate(5));
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
            'name' => 'required|unique:category_expenses,name',
        ]);

        $categoryExpense = new CategoryExpense;
        $categoryExpense->name = $request->name;

        $categoryExpense->save();

        return new ExpenseCategoryResource($categoryExpense);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryExpense = CategoryExpense::findOrFail($id);

        return new ExpenseCategoryResource($categoryExpense);
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
        $categoryExpense = CategoryExpense::findOrFail($id);

        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('category_expenses')->ignore($categoryExpense->id),
            ],
        ]);

        $categoryExpense->name = $request->name;

        $categoryExpense->update();

        return new ExpenseCategoryResource($categoryExpense);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryExpense = CategoryExpense::findOrFail($id);
        $categoryExpense->delete();
        return response()->json(['message' => 'Expense Category deleted successfuly'], 200);
    }
}
