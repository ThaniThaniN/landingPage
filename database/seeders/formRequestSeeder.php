<?php

namespace Database\Seeders;

use App\Models\ProductRequest;
use App\Models\SuggestionRequest;
use Illuminate\Database\Seeder;

class formRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductRequest::factory(9)->processed()->create();
        ProductRequest::factory(12)->archived()->create();
        ProductRequest::factory(15)->create();


        SuggestionRequest::factory(9)->processed()->create();
        SuggestionRequest::factory(12)->archived()->create();
        SuggestionRequest::factory(15)->create();
    }
}
