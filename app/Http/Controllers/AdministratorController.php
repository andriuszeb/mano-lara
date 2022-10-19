<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoleUser;
use App\Models\role;
use Illuminate\Http\Request;
use DB;

class AdministratorController extends Controller
{
    public function index()
    {

        $users = User::all();

        return view('administrator.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function create()
//     {
      

//         // return view('author.create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \App\Http\Requests\StoreAuthorRequest  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(StoreAuthorRequest $request)
//     {
//         // dd($request);
//         // dd($request->all());     
//         $validator = Validator::make($request->all(), 
//     [
//         'author_name'=> ['required','min:2','max:64'],
//         'author_surname'=> ['required','min:2','max:64'],
//     ],
//     [
//         'author_name.required' => 'ivesk ka nors vardas',
//         'author_name.min' => 'per trumpas vardas',
//         'author_name.max' => 'per ilgas vardas',
        
//         'author_surname.required' => 'ivesk ka nors pavarde',
//         'author_surname.min' => 'per trumpas pavarde',
//         'author_surname.max' => 'per ilgas pavarde',
//     ]
// );
//     if($validator->fails()){
//         $request->flash();
//         return redirect()->back()->withErrors($validator);
//     }
//         $author = new Author();
//         $author->name = $request->author_name;
//         $author->surname = $request->author_surname;
//         $author->save();
//         return redirect()->route('author.index')->with('success_message', 'Sekmingai įrašytas.');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Models\Author  $author
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Author $author)
//     {
//         //
//     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('administrator.edit', ['user' => $user,'roles'=>$roles]);
    }


    public function update(Request $request, User $user)
    {
        // dd($request->all());
        DB::table('role_user')->where('user_id','=',$user->id)->delete();
        foreach ($request->all()['role'] as $role) {
            $ru = new RoleUser();
            $ru->user_id = $user->id;
            $ru->role_id = $role;
            $ru->created_at = now();
            $ru->updated_at = now();
            $ru->save();
        }
        // $author->name = $request->author_name;
        // $author->surname = $request->author_surname;
        // $author->save();
        return redirect()->route('administrator.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\Author  $author
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Author $author)
//     {
//         $author->delete();
//         return redirect()->route('author.index')->with('success_message', 'Sekmingai ištrintas.');
 
//         if($author->authorBooks->count()){
//             return redirect()->route('author.index')->with('info_message', 'Trinti negalima, nes turi knygų.');
//         }
//         $author->delete();
//         return redirect()->route('author.index');
 
//     }
}
