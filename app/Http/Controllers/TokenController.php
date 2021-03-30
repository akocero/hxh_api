<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal_access_tokens = [];
        foreach (auth()->user()->tokens as $token) {
            array_push($personal_access_tokens, $token);
        }


        return view('token.index', compact('personal_access_tokens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::all();

        $abilities = Ability::all();

        return view('token.create', compact('users', 'abilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        if(is_null($request->abilities) || is_null($request->token_name)){
            return back()->with('error', "Please check your inputs");
        }

        $user = auth()->user();
        $personal_token = $user->createToken($request->token_name, $request->abilities)->plainTextToken;

        return back()->with("personal_token", $personal_token);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::findOrFail($id)->tokens()->first();
        // // foreach ($user->tokens as $token) {
        // //     dump($token);
        // // }

        // dd($user->token);

        return view('token.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validatedData() {



        return $data;
    }
}
