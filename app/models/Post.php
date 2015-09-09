<?php

class Post extends Eloquent
{
    protected $table = 'posts';
    public static $rules = array(
        'title'      => 'required|max:100',
        'body'       => 'required|max:10000'
    );

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag', 'post_tags');
    }

    public static function randomHeader() {
        $num = mt_rand(1,5);

        return $num;
    }

    public static function randomAbout() {
        $num = mt_rand(1,17);

        return $num;
    }

    public static function randomCoffee() {
        $num = mt_rand(1,10);

        return $num;
    }
}