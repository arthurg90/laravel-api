<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class Tags extends Controller
{
  public function list()
  {
      return Tag::all();
  }
  public function read(Tag $tag)
  {
      return $tag->articles;
  }
}
