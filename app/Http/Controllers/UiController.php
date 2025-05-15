<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UiController extends Controller
{

    public function index($sectionId)
    {

        // Get the logged-in user's privileges
        $user =  Auth::user();
        $privileges = json_decode($user->privilege, true) ?? [];
        if (!in_array('edit-ui', $privileges)) {
            abort(403);
        }
        // Fetch the section and associated cards
        $section = Section::findOrFail($sectionId);
        $cards = Card::where('section_id', $sectionId)->get();

        return view('admin.edit_ui', [
            'pageData' => [
                'id' => $section->id,
                'name' => $section->name,
                'title' => $section->title,
                'text' => $section->text,
                'link' => $section->link,
                'active' => $section->active,
                'cards' => $cards->pluck('id'), // Only card IDs for the loop
            ],
            'cardsData' => $cards->keyBy('id')->toArray(), // Indexed by ID for easy lookup
        ]);
    }
    public function updateInfo(Section $section, Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:400',
            'text' => 'nullable|string|max:1000',
            'link' => 'nullable|string',
        ]);

        // Path to the lang directory in the root
        $translationPath = base_path('lang/ar.json');

        // Load the existing translations or initialize an empty array
        $translations = json_decode(File::get($translationPath), true) ?? [];

        // Check for new Arabic sentences and add them as keys with empty values
        if (!array_key_exists($validated['title'], $translations)) {
            $translations[$validated['title']] = ""; // Add Arabic text as a key with an empty value
        }
        if (!array_key_exists($validated['text'], $translations)) {
            $translations[$validated['text']] = ""; // Add Arabic text as a key with an empty value
        }

        // Save the updated translations back to ar.json
        File::put($translationPath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Update the section information
        $section->update($validated);

        return back()->with('success', 'Card updated successfully!');
    }

    public function updateCards(Request $request, $sectionId)
    {

        // Path to the lang directory in the root
        $translationPath = base_path('lang/ar.json');

        // Load the existing translations
        $translations = json_decode(File::get($translationPath), true);

        // Check for new English sentences and add them as keys with empty values
        foreach ($request->input('title', []) as $title) {
            if (!array_key_exists($title, $translations)) {
                $translations[$title] = ""; // Add English text as a key with an empty value
            }
        }

        foreach ($request->input('text', []) as $text) {
            if (!array_key_exists($text, $translations)) {
                $translations[$text] = ""; // Add English text as a key with an empty value
            }
        }


        // Save the updated translations back to ar.json
        File::put($translationPath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Validation rules based on the section
        $validationRules = [
            'default' => [
                'title.*' => 'required|string|max:40',
                'text.*' => 'nullable|string',
            ],
            1 => [ // Benefits
                'title.*' => 'required|string|max:40',
                'text.*' => 'nullable|string|max:210',
            ],
             2 => [],

             3=> [ // Features
                'title.*' => 'required|string|max:40',
                'text.*' => 'nullable|string|max:150',
            ],
            4 => [
                'title.*' => 'required|string|max:40',
                'text.*' => 'nullable|string',
                ],

            5 => [ // Services
                'title.*' => 'required|string|min:4|max:25',
                'text.*' => 'nullable|string|max:600',
            ],
            6 => [ // FAQ
                'title.*' => 'required|string|max:300',
                'text.*' => 'required|string',
            ],
        ];

        $rules = $validationRules[$sectionId] ?? $validationRules['default'];

        // Validate the request
        $validatedData = $request->validate($rules);

        // Ensure the section exists
        $targetedSection = Section::find($sectionId);
        if (!$targetedSection) {
            return redirect()->back()->withErrors(['section' => 'Invalid section']);
        }

        // Update cards associated with the section
        foreach ($validatedData['title'] as $cardId => $title) {
            $text = $validatedData['text'][$cardId] ?? null;

            // Ensure the card belongs to the section
            $card = Card::where('id', $cardId)->where('section_id', $sectionId)->first();
            if ($card) {
                $card->update([
                    'title' => $title,
                    'text' => $text,
                ]);
            }
        }

        return redirect()->back()->with('success', 'All cards updated successfully!');
    }

}
