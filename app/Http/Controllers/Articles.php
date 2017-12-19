<?php
namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class Articles extends Controller

{
  public function create(ArticleRequest $request) {
    $data = $request->only(["title", "article"]);
    $article = Article::create($data);
    return response($article, 201);
  }

  public function list() {
    return Article::all();
  }

  public function read(Article $article) {
      return $article;
  }

  public function update(ArticleRequest $request, Article $article) {
      $data = $request->only(["title", "description"]);
      $article->fill($data)->save();
      return $article;
  }

  public function delete(Article $article) {
      $article->delete();
      return response(null, 204);
  }
}
