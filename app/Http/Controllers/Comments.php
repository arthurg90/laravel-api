<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Article;
use App\Comment;

class Comments extends Controller
{
    public function create(CommentRequest $request, Article $article)
    {
      $data = $request->only(["email", "comment"]);
      $comment = new Comment($data);

      $article->comments()->save($comment);

      return $comment;
    }

    public function list(Article $article)
    {
      return $article->comments;
    }
}
