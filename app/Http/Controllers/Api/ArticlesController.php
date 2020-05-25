<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Requests\ArticleRequest;
class ArticlesController extends Controller
{

    // function __construct() {
    //     $this->middleware('auth:api')->except(['index','show']);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ArticleResource::collection(Article::orderBy('id','desc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //
        $request->merge(['user_id' => auth()->user()->id]);
        $article = Article::create($request->all());
        return response()->json(['data'=> new ArticleResource($article),'status' => 200,'message' => 'Article Data'],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(!$article = Article::find($id)) {
            return $this->notExist();
        }
        return response()->json(['data'=> new ArticleResource($article),'status' => 200,'message' => 'Article Data'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        //
        $article = auth()->user()->articles()->find($id);

        if(!$article) {
            return $this->notExist();
        }
        $article->update($request->all());
        return response()->json(['data'=> new ArticleResource($article),'status' => 200,'message' => 'Article Data'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = auth()->user()->articles()->find($id);
        if(!$article) {
            return $this->notExist();
        }

        if($article->delete()) {
            return response()->json(['data'=>[],'status' => 200,'message' => 'Article Deleted'],200);
        } else {
            return $this->notExist();
        }
    }


    public function notExist() {
        $data = [
            'data' => [],
            'status' => false,
            'status_code' => 404,
            'message' => 'This article not exist'
        ];
        return response()->json($data,404);
    }

    public function errorResponse() {
        $data = [
            'data' => [],
            'status' => false,
            'status_code' => 500,
            'message' => 'Something went wrong, Operation Failed'
        ];
        return response()->json($data,500);
    }

    public function logout() {
        //auth()->user()->token()->revoke();
        auth()->user()->token()->delete();
    }



}
