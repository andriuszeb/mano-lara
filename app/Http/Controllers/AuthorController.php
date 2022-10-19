<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Validator;
use Auth;

class AuthorController extends Controller
{

    public function  __construct(){
        // $this->middleware('auth');
        // $this->middleware('auth')->except('index');
        $this->middleware('auth',['except'=>['index','edit']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  dd(Auth::user()->roles);
          // if(Auth::user()->hasRole(['admin','superadmin','sysadmin'])){
        //     return;
        // }
        $authors = Author::all();
        // foreach ($authors as $author) {
        //     echo "<h1>".$author->name."</h1>";
        //   foreach ($author->books as $book) {
        //     echo $book->title."<br>";
        //   }
        // }
        // die;
        return view('author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      

        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        // dd($request);
        // dd($request->all());     
        $validator = Validator::make($request->all(), 
    [
        'author_name'=> ['required','min:2','max:64'],
        'author_surname'=> ['required','min:2','max:64'],
    ],
    [
        'author_name.required' => 'ivesk ka nors vardas',
        'author_name.min' => 'per trumpas vardas',
        'author_name.max' => 'per ilgas vardas',
        
        'author_surname.required' => 'ivesk ka nors pavarde',
        'author_surname.min' => 'per trumpas pavarde',
        'author_surname.max' => 'per ilgas pavarde',
    ]
);
    if($validator->fails()){
        $request->flash();
        return redirect()->back()->withErrors($validator);
    }
        $author = new Author;
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->save();
        return redirect()->route('author.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->save();
        return redirect()->route('author.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index')->with('success_message', 'Sekmingai ištrintas.');
 
        if($author->authorBooks->count()){
            return redirect()->route('author.index')->with('info_message', 'Trinti negalima, nes turi knygų.');
        }
        $author->delete();
        return redirect()->route('author.index');
 
    }
}
