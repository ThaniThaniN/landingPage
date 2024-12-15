<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Models\Section;

class
PageController extends Controller
{


    public function index(){
        $allSections = Section::all()->pluck(null, 'name')->toArray(); //Sets the name field as the key while keeping the entire model as the value and Converts the collection to an array
        $activeSections = Section::where('active', true)->get();
        $benefitsCards = Card::where('section_id', '1')->get();
        $featuresCards = Card::where('section_id', '3')->get();
        $businessPlanCards = Card::where('section_id', '4')->get();
        $servicesCards = Card::where('section_id', '5')->get();
        $futureCards = Card::where('section_id', '6')->get();
        $faqCards = Card::where('section_id', '7')->get();
        return view('index', [
            'allSections' => $allSections,
            'activeSections' => $activeSections,
            'benefitsCards' => $benefitsCards,
            'featuresCards' => $featuresCards,
            'businessPlanCards' => $businessPlanCards,
            'servicesCards' => $servicesCards,
            'futureCards' => $futureCards,
            'faqCards' => $faqCards]);
    }

    public function productForm(){
        $allSections = Section::all()->pluck(null, 'name')->toArray(); //Sets the name field as the key while keeping the entire model as the value and Converts the collection to an array
        $activeSections = Section::where('active', true)->get();
        return view('product_form', [
            'allSections' => $allSections,
            'activeSections' => $activeSections
            ]);
    }


    public function updateStatus(Request $request, $id)
    {
        $page = Section::find($id);

        // If 'active' checkbox is checked, set to 1, otherwise set to 0
        if ($request->has('active')) {
            $page->active = 1;
        } else {
            $page->active = 0;
        }

        $page->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}
