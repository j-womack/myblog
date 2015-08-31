@extends('layouts.master')

@section('title')
Button Mash
@stop

@section('style')
<link href='http://fonts.googleapis.com/css?family=Codystar:300' rel='stylesheet' type='text/css'>
<style type="text/css">
    h1,h2,h3,h4,h5,h6 {
        font-family: 'Codystar', cursive;
    }

    .forceSmall {
        font-size: .5em;
    }

    #forceUp {
        padding-top: 50px;
    }

    .navbar {
        font-family: 'Codystar', cursive;
        font-size: 1em;
    }

    h1 {
        font-size: .5em;
    }

    body {
        text-align: center;
        font-family: 'Codystar', cursive;
        color: lightgrey;
        background-image: url("/img/stardust.png");
    }

    #gameBoard{
        width: 600px;
        height: 600px;
        margin: auto;
        margin-bottom: 45px;
    }

    .hole {
        width: 200px;
        height: 200px;
        float: left;
        border: 1px dotted lightgrey;
    }

    .active {
        content: url(/img/star.png);
    }

    .row {
        margin: auto;
    }

    header {
        height: 310px;
    }
</style>
@stop

@section('heading')
<span class="forceSmall">Button-Mash A Mysterious&nbsp;Light</span>
@stop

@section('subheading')
<div class="row">
    <h3 class="yourScore col-xs-6 col-sm-4">Score: 0</h3>
    <h3 class="countdown col-xs-6 col-sm-4">Time&nbsp;Remaining: 0:30</h3>
    <h3 class="highScore col-xs-6 col-sm-4"></h3>
</div>
@stop

@section('image_url')
''
@stop

@section('content')
<div class="container col-lg-12">
    <div id="gameBoard">
        <div class="hole 1"></div>
        <div class="hole 2"></div>
        <div class="hole 3"></div>
        <div class="hole 4"></div>
        <div class="hole 5 active start"></div>
        <div class="hole 6"></div>
        <div class="hole 7"></div>
        <div class="hole 8"></div>
        <div class="hole 9"></div>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
    "use strict";
    var holes = $('.hole')
    var selectedHole = holes[4];
    var previousHole;
    var score = 0;
    var seconds = 0
    var highScore = 0;
    var interval;

    $('.start').click(function(){
        selectRandom();
        $(this).html('');
        $(this).removeClass('start active');
        $(selectedHole).addClass('active');

        interval = setInterval(game, 1000);

        $(this).off('click');

        $('.hole').on('click', function(){
            if ($(this).hasClass('active')){
                score+=10;
                $('.yourScore').html('Score: ' + score);
            } else {
                score-=5;
                $('.yourScore').html('Score: ' + score);
            }
        });
    });

    function selectRandom() {
        var decision = Math.floor((Math.random() * 9));
        previousHole = selectedHole;
        selectedHole = holes[decision];
    };

    function game() {    
        selectRandom();
        seconds++;
        $(previousHole).removeClass('active');
        $(selectedHole).addClass('active');

        if ((30 - seconds) >= 10) {
            $('.countdown').html('Time Remaining: 0:' + (30 - seconds));
        }
        if ((30 - seconds) < 10) {
            $('.countdown').html('Time Remaining: 0:0' + (30 - seconds));
        }
        if ((30 - seconds) <= 0){
            gameOver();
        }
    };

    function gameOver(interval) {
        seconds = 0;

        clearInterval(interval);

        if (score > highScore) {
            highScore = score;
            $('.highScore').html('High Score: ' + highScore);
        }
        score = 0;
        $('.yourScore').html('Score: ' + score);

    };
</script>
@stop