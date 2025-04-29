<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Decoration;
use Illuminate\Support\Str;

class DecorationController extends Controller
{
    public function index()
    {
        $decorations = Decoration::all();
        return view('admin.pages.decorationandservices.index', compact('decorations'));
    }

    public function create()
    {
        return view('admin.pages.decorationandservices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image
        $fileName = Str::slug($request->title) . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $fileName);

        Decoration::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $fileName,
        ]);

        return redirect()->route('admin.decorations.index')->with('success', 'Decoration added successfully');
    }

    public function edit($id)
    {
        $decoration = Decoration::findOrFail($id);
        return view('admin.pages.decorationandservices.edit', compact('decoration'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $decoration = Decoration::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image (from public/uploads)
            $oldPath = public_path('uploads/' . $decoration->image);
            if ($decoration->image && file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload new image to public/uploads
            $fileName = Str::slug($request->title) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $fileName);
            $decoration->image = $fileName;
        }

        $decoration->title = $request->title;
        $decoration->description = $request->description;
        $decoration->price = $request->price;
        $decoration->save();

        return redirect()->route('admin.decorations.index')->with('success', 'Decoration updated successfully');
    }

    public function destroy($id)
    {
        $decoration = Decoration::findOrFail($id);


        if ($decoration->image) {
            $imagePath = public_path('uploads/' . $decoration->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $decoration->delete();

        return redirect()->route('admin.decorations.index')->with('success', 'Decoration deleted successfully');
    }

    public function showDecorations()
    {
        $decorations = Decoration::all();
        return view('eventmitra.decoration', compact('decorations'));
    }
}
