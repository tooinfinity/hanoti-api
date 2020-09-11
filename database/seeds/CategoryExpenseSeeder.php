<?php

use App\Models\CategoryExpense;
use Illuminate\Database\Seeder;

class CategoryExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CategoryExpense::class, 5)->create();
    }
}
