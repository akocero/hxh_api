<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!auth()->user()->tokenCan('post:list')) {
            abort(403, 'Unauthorized');
        }

        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = Post::create($this->validatedData($request));
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (!auth()->user()->tokenCan('post:show')) {
            abort(403, 'Unauthorized');
        }

        try {

            $post = Post::findOrFail($id);
        } catch (\Throwable $th) {

            return response([
                'message' => 'id not found',
            ], 404);
        }

        return $post;
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

        try {

            $post = Post::findOrFail($id);
            $post->delete($post);
            return ['message' => 'deleted'];
        } catch (\Throwable $th) {

            return response([
                'message' => 'id not found',
            ], 404);
        }
    }

    protected function validatedData($request)
    {
        return $request->validate([
            'title' => 'required',
            'body' => '',
            'likes' => 'integer',
        ]);
    }
}
