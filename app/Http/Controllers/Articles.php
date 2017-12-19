<?php
namespace App\Http\Controllers;
use App\Article;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class Articles extends Controller

{
  public function create(ArticleRequest $request) {
    $data = $request->only(["title", "article"]);
    $article = Article::create($data);

    $tags = Tag::parse($request->get("tags"));
    $article->setTags($tags);

    // return response($article, 201);
    return $article;
  }

  public function list() {
    return Article::all();
  }

  public function read(Article $article) {
      return $article;
  }

  public function update(ArticleRequest $request, Article $article) {
      $data = $request->only(["title", "article"]);
      $article->fill($data)->save();

      $tags = Tag::parse($request->get("tags"));
      $article->setTags($tags);

      return $article;
  }

  public function delete(Article $article) {
      $article->delete();
      return response(null, 204);
  }

}
