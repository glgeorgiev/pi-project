<?php

namespace App\Http\Controllers\Backend;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->redirectRoute = 'admin.comment.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::getFilteredResults();

        return view('backend.pages.comment.index', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CommentRequest  $request
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());

        if ($request->ajax()) {
            return response()->json([
                'result'    => 'OK',
                'message'   => 'Updated comment',
                'comment'   => $comment->comment,
            ]);
        }

        return $this->redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return $this->redirect();
    }
}
