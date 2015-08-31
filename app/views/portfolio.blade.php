@extends('layouts.master')

@section('title')
Portfolio
@stop

@section('style')

@stop

@section('heading')
Miscellaneous Creations
@stop

@section('subheading')
CSS/HTML/JS
@stop

@section('image_url')
'/img/htmlcssjs.png'
@stop

@section('content')
<div>
    <h3>Here are some Javascript/jQuery based creations of mine:</h3>
    <h2><a href="/simon">Simple Simon</a></h2>
    <p><a href="https://en.wikipedia.org/wiki/Simon_(game)">Simple Simon</a> is a game with 4 colors that play randomly and continue to add one color to the sequence at each turn. You must then select the correct order back to the game for as many rounds as you can.</p>
    <h2><a href="/buttonmash">Button Mash</a></h2>
    <p>Button Mash is a game based on <a href="https://en.wikipedia.org/wiki/Whac-A-Mole">Whac-A-Mole</a>. A light moves around a 3X3 board and challenges you to find and click it as much as possible in 30 seconds.</p>
</div>
@stop

@section('js')

@stop