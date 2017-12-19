<?php
namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;

class Articles extends Controller

{
  public function create(Request $request) {
    $data = $request->only(["title", "article"]);
    $article = Article::create($data);
    return response($article, 201);
  }

  public function list() {
    return Article::all();
  }

  // public function read($id) {
  //   return Article::find($id);
  // }


  public function read(Article $article) {
      return $article;
  }

  // public function update(Request $request, $id) {
  //   $article = Article::find($id);
  //   $data = $request->only(["title", "article"]);
  //   $article->fill($data)->save();
  //   return $article;
  // }

  public function update(Request $request, Article $article) {
      $data = $request->only(["title", "description"]);
      $article->fill($data)->save();
      return $article;
  }

  // public function delete($id) {
  //   $article = Article::find($id);
  //   $article->delete();
  //   return response(null, 204);
  // }
  public function delete(Article $article) {
      $article->delete();
      return response(null, 204);
  }
}
