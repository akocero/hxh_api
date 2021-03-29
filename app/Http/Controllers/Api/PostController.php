<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!auth()->user()->tokenCan('post:read')) {
            abort(403, 'Unauthorized');
        }

        return PostResource::collection(Post::paginate($request->paginate ?  $request->paginate : 10));

        // return $request->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->tokenCan('post:create')) {
            abort(403, 'Unauthorized');
        }

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

        if (!auth()->user()->tokenCan('post:read')) {
            abort(403, 'Unauthorized');
        }

        $post = new PostResource(Post::findOrFail($id));
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
        if (!auth()->user()->tokenCan('post:update')) {
            abort(403, 'Unauthorized');
        }

        $post = Post::findOrFail($id);
        $post->update($this->validatedData($request));
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->tokenCan('post:delete')) {
            abort(403, 'Unauthorized');
        }

        $post = Post::findOrFail($id);
        $post->delete($post);
        return [];
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
