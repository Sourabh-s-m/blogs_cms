<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::get();
        if (Auth::user()->role !== 'admin') {
            $blogs = $blogs->where('user_id', Auth::user()->id);
        }
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            $firstError = $validator->errors()->first();
            return redirect()->back()->with('error', $firstError)->withInput();
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->user_id = Auth::id();

        if ($request->hasFile('image')) {
            try {
                $blog->image = $request->file('image')->store('images', 'public');
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        if (Auth::user()->role === 'user') {
            $blogCount = $blog->where('id', $blog->id)->where('user_id', Auth::user()->id)->count();
            if ($blogCount < 1) {
                return redirect()->back()->with('error', 'You do not have access');
            }
        }
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (Auth::user()->role === 'user') {
            $blogCount = $blog->where('id', $blog->id)->where('user_id', Auth::user()->id)->count();
            if ($blogCount < 1) {
                return redirect()->back()->with('error', 'You do not have access');
            }
        }
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if (Auth::user()->role === 'user') {
            $blogCount = $blog->where('id', $blog->id)->where('user_id', Auth::user()->id)->count();
            if ($blogCount < 1) {
                return redirect()->back()->with('error', 'You do not have access');
            }
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->description == '<p><br></p>') {
            return redirect()->back()->with('error', 'Description is required')->withInput();
        }

        // Check if the validation fails
        if ($validator->fails()) {
            $firstError = $validator->errors()->first();
            return redirect()->route('blogs')->with('error', $firstError)->withInput();
        }

        $blog->title = $request->title;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete('storage/' . $blog->image);
            }
            $blog->image = $request->file('image')->store('images', 'public');
        }

        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (Auth::user()->role === 'user') {
            $blogCount = $blog->where('id', $blog->id)->where('user_id', Auth::user()->id)->count();
            if ($blogCount < 1) {
                return redirect()->back()->with('error', 'You do not have access');
            }
        }
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();
        return response()->json(['success' => true, 'message' => 'Blog deleted successfully!']);
    }
}
