<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'feedback' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/feedback'), $imageName);
            $validated['photo'] = $imageName;
        }

        Feedback::create($validated);

        return redirect()->back()->with('status', 'Thank you for your feedback!');
    }

    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('eventMitra.kindWords', compact('feedbacks'));
    }

    public function adminIndex()
    {
        $feedbacks = \App\Models\Feedback::latest()->get(['name', 'feedback']);
        return view('admin.pages.ReviewAndFeedbacks.index', compact('feedbacks'));
    }
    
}
