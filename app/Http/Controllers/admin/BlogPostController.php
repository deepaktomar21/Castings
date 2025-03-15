<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;


class BlogPostController extends Controller
{

    public function categories()
    {
        $categories = Category::all();
        return view('admin.blogs.category', compact('categories'));
    }

    public function tags()
    {
        $tags = Tag::all();
        return view('admin.blogs.tag', compact('tags'));
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function storeTag(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->back()->with('success', 'Tag created successfully!');
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('admin.blogs.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blogs.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|in:draft,published,pending',
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/posts'), $imageName);
            $post->image = 'uploads/posts/' . $imageName;
        }

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.blogs.index')->with('success', 'Post created successfully!');
    }

    public function approve($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'published']);

        return redirect()->back()->with('success', 'Post approved successfully!');
    }
    public function edit(Post $post)
    {
        return view('admin.blogs.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Post deleted!');
    }
}
