<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class Comments extends Controller
{
    public function create(Request $request, Article $article)
    {
      $data = $request->only(["email", "comment"]);
      $comment = new Comment($data);

      $article->comments()->save($comment);

      return $comment;
    }
}
