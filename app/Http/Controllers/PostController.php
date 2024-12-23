<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posty = Post::paginate(10);
        return view('post.lista',compact('posty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.dodaj');
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
    public function store(PostStoreRequest $request)

    {
        $post = new Post();
/*         $post->tytul = $request['tytul'];
        $post->autor = request('autor');
        $post->email = request('email');
        $post->tresc = request('tresc');
        $post->save(); */
/*         $request->validate([
            'tytul' => 'required|min:3|max:200',
            'autor' => ['required','min:4','max:100'],
            'email' => ['required','email:rfc,dns','max:100'],
            'tresc' => ['required','min:5'],
        ]); */
        //$post->user_id = Auth::user()->id;  mie zadziała
        $request->merge(['user_id' => Auth::user()->id]);
        $post->create($request->all());
        return redirect()->route('post.index')->with('message','Dodano poprawnie posta');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.pokaz',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edytuj',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(Request $request, Post $post)
    public function update(PostStoreRequest $request, Post $post)
    {
        //$request->merge(['user_id' => Auth::user()->id]); //zadziała
        $post->user_id = Auth::user()->id;
        $post->update($request->all());
        return redirect()->route('post.index')->with('message','Zmieniono poprawnie posta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message','Usunięto poprawnie posta')->with('class','danger');
    }
}
