@extends('layouts.master')

@section('title')
Konami Code
@stop

@section('style')
    <style type="text/css">
        .title {
            text-align: center;
            color: #F55;   
        }
        .winner {
            text-align: center;
            color: #000;
            opacity: 0;
        }
        body {
            background-image: url("/img/swirl_pattern.png");
        }
        #duck {  
            position: absolute;
            left: -400px;
        }
        #confetti {
            width: 400px;
            height: 400px;
            position: absolute;
            left: -400px;
        }
    </style>
@stop

@section('content')
    <h1 class="title">Konami Code</h1>
    <h1 class="winner">You win!</h1>

    <div>
        <img src="/img/duck.png" id="duck">
        <img src="/img/confetti.gif" id="confetti">
    </div>
@stop

@section('js')
<script>
    "use strict";
    $(document).ready(function(){
        var sequence = [];
        var konami = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65, 13];
        $(document).keyup(function(event){
            // console.log(event.keyCode);
            sequence.push(event.keyCode);
            if (sequence.length > 11){
                sequence.shift();
            };
            console.log(sequence.toString());

            if (sequence.toString() == konami.toString()) {
                $('.title').animate({
                    opacity: 0
                    }, 500);
                $('.winner').animate({
                    opacity: 1,
                    "font-size": "5em"
                }, 1000)

                $('body').css({
                    "background-image": "url('/img/wave.jpg')"
                }, 1000)
                
                $('#duck').animate({
                    left: "+=2000"
                }, 10000);
                $('#confetti').animate({
                    left: "+=2000"
                }, 10000);
            };

        });
    });

</script>
@stop
