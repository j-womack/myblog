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

    public static function randomImage() {
        $num = mt_rand(1,5);

        return $num;
    }
}