<?php

namespace App\Http\Controllers;

use App\Models\SuggestionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuggestionRequestController extends Controller
{
    public function index()
    {// Get the logged-in user's privileges
        $user =  Auth::user();
        $privileges = json_decode($user->privilege, true) ?? [];
        if (!in_array('suggestion-requests', $privileges)) {
            abort(403);
        }
        $pendingRequests = SuggestionRequest::where('status', 'pending')->latest()->get();
        $processedRequests = SuggestionRequest::where('status', 'processed')->latest()->get();
        $archivedRequests = SuggestionRequest::where('status', 'archived')->latest()->get();

        return view('admin.suggestion_requests.index', [
            'pendingRequests' => $pendingRequests,
            'processedRequests' => $processedRequests,
            'archivedRequests' => $archivedRequests
        ]);
    }

    public function store(){

        $validator = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'string', 'min:6', 'max:12'],
            'message' => ['required', 'string', 'min:10']
        ]);
        if ($validator->fails()) {
            return redirect('/#contact')
                ->withErrors($validator)
                ->withInput();
        }

        SuggestionRequest::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'message' => request('message'),
        ]);
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function show(SuggestionRequest $suggestionRequest){
        return view('admin.suggestion_requests.edit', ['suggestionRequest' => $suggestionRequest]);
    }

    public function update(SuggestionRequest $suggestionRequest){
        request()->validate([
            'status' => 'required|in:processed,archived'
        ]);
        $suggestionRequest->update([
            'status' => request('status')
        ]);
        return redirect()->back()->with('success', 'Form updated successfully!');
    }



}
