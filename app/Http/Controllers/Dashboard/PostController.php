<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // static public function myRules(){
    //     return [
    //         'title' => 'required|min:5|max:255',
    //         'content' => 'required|min:7',
    //         'category_id' => 'required',
    //         'description' => 'required|min:7',
    //         'posted' => 'required',
    //         'slug' => 'required|min:5|max:255'
    //     ];
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Category::find(1)->posts);
        // $posts = Post::get();
        $posts = Post::paginate(4);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::get();
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dd($request);
        // echo request()->input('title');
        // dd(Request()->all());
        
        // $validated = $request->validate(StoreRequest::myRules());
        // $validated = Validator::make($request->all(), StoreRequest::myRules());
        // dd($validated->errors());
        // $data = $request->validated();
        // $data['slug'] = Str::slug($data['title']) ;
        // dd($data);
        $data = array_merge($request->all(), ['image' => '']);
        // dd($data);
        Post::create($data);
        return redirect()->route('post.index')->with('status', 'Registro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.edit', compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = $filename = time().".".$data['image']->extension();
            $request->image->move(public_path('image'),$filename);
        }
        // dd($request->validated());
        $post->update($data);
        // dd($request->validated());
        // $request->session();
        return to_route('post.index')->with('status', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index')->with('status', 'Registro eliminado');
    }
}
