<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $posts = Post::paginate(30);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PostResource|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $authUser = JWTAuth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'detail' => 'required|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $post = new Post();
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->user_id = $authUser->id;
        $post->save();
        if ($request->has('tags')) {
            $tags = $request->tags;
            $tags = explode(',', $tags);
            foreach ($tags as $tag_name) {
                $tag = Tag::firstOrCreate([
                    'name' => trim($tag_name)
                ]);
                $post->tags()->attach($tag->id);
            }
        }
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return PostResource
     */
    public function show($id)
    {
        $post = Post::with(['tags', 'user'])->findOrFail($id);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return PostResource
     */
    public function update(Request $request, $id)
    {
        $authUser = JWTAuth::user();
        $post = Post::findOrFail($id);
        if ($authUser->id !== $post->user->id) {
            abort(403);
        }
        if ($request->has('title'))
            $post->title = $request->title;
        if ($request->has('detail'))
            $post->detail = $request->detail;
        $post->save();
        if ($request->has('tags')) {
            $tags = $request->tags;
            $tags = explode(',', $tags);
            $tag_ids = [];
            foreach ($tags as $tag_name) {
                $tag = Tag::firstOrCreate([
                    'name' => trim($tag_name)
                ]);
                array_push($tag_ids, $tag->id);
            }
            $post->tags()->sync($tag_ids);
        }
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $authUser = JWTAuth::user();
        $post = Post::findOrFail($id);
        if ($authUser->id !== $post->user->id) {
            abort(403);
        }
        $post->tags()->detach();
        $post->delete();
        return response()->json([
            'success' => true,
            'message' => "Post id {$id} has been deleted"
        ]);
    }
}
