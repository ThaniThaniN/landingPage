<?php

namespace App\Http\Controllers;

use App\Models\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductRequestController extends Controller
{
    public function index()

    {
        // Get the logged-in user's privileges
        $user =  Auth::user();
        $privileges = json_decode($user->privilege, true) ?? [];
        if (!in_array('product-requests', $privileges)) {
            abort(403);
        }
        $pendingRequests = ProductRequest::where('status', 'pending')->latest()->get();
        $processedRequests = ProductRequest::where('status', 'processed')->latest()->get();
        $archivedRequests = ProductRequest::where('status', 'archived')->latest()->get();

        return view('admin.product_requests.index', [
            'pendingRequests' => $pendingRequests,
            'processedRequests' => $processedRequests,
            'archivedRequests' => $archivedRequests
        ]);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'string', 'min:6', 'max:12'],
            'bName' => ['required', 'string', 'max:255'],
            'branches' => ['required', 'string'],
            'message' => ['required', 'string', 'min:10']
        ]);

        if ($validator->fails()) {
            return redirect('/product-form#contact')
                ->withErrors($validator)
                ->withInput();
        }

        ProductRequest::create($validator->validated());

        return redirect('/')->with('success', 'Form submitted successfully!');
    }

    public function show(ProductRequest $productRequest){
        return view('admin.product_requests.edit', ['productRequest' => $productRequest]);
    }

    public function update(ProductRequest $productRequest){
        request()->validate([
            'status' => 'required|in:processed,archived'
        ]);
        $productRequest->update([
            'status' => request('status')
        ]);
            return redirect()->back();
    }



}
