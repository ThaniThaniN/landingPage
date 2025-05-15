<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    public function index()
    {
        // Get the logged-in user's privileges
        $user =  Auth::user();
        $privileges = json_decode($user->privilege, true) ?? [];
        if (!in_array('translations', $privileges)) {
            abort(403);
        }

        $translationPath = base_path('lang/ar.json');
        $translations = json_decode(File::get($translationPath), true);

        // Slice the first ---- records (only for view)
        $displayTranslations = array_slice($translations, 117, null, true);

        return view('admin.translations', compact('displayTranslations', 'translations'));
    }

    public function update(Request $request)
    {
        // Fetch translations from request
        $translations = $request->input('translations', []);
        $deletedKeys = $request->input('deleted_keys', '');

        // Decode deleted keys
        $deletedKeys = array_map('base64_decode', explode(',', $deletedKeys));

        // Load existing translations
        $translationPath = base_path('lang/ar.json');
        $allTranslations = json_decode(File::get($translationPath), true);

        // Remove deleted keys
        foreach ($deletedKeys as $key) {
            unset($allTranslations[$key]);
        }

        // Merge remaining translations
        foreach ($translations as $key => $data) {
            $allTranslations[$key] = $data['value'];
        }

        // Save updated translations
        File::put($translationPath, json_encode($allTranslations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()->back()->with('success', 'Translations updated successfully!');
    }
}
