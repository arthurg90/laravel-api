<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ["name"];

    public function articles()
    {
      return $this->belongsToMany(Article::class);
    }

    public static function parse(array $tags)
    {
      return collect($tags)->map(function ($tag) {
        $string = trim($tag);
        return static::makeTag($string);
      });
    }

    private static function makeTag($string)
    {
      $exists = Tag::where("name", $string)->first();

      return $exists ? $exists : Tag::create(["name" => $string]);
    }
}
