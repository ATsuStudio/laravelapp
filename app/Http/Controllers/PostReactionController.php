<?php

namespace App\Http\Controllers;

use App\Models\Post_reaction;
use App\Http\Requests\StorePost_reactionRequest;
use App\Http\Requests\UpdatePost_reactionRequest;

class PostReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePost_reactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost_reactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post_reaction  $post_reaction
     * @return \Illuminate\Http\Response
     */
    public function show(Post_reaction $post_reaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post_reaction  $post_reaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Post_reaction $post_reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePost_reactionRequest  $request
     * @param  \App\Models\Post_reaction  $post_reaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost_reactionRequest $request, Post_reaction $post_reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post_reaction  $post_reaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post_reaction $post_reaction)
    {
        //
    }
}
