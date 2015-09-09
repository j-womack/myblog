@extends('layouts.master')

@section('title')
Simple Simon
@stop

@section('style')
<style type="text/css">
    #gameBoard {
        height: 500px;
        width: 500px;
        background-color: #4D5057;
        margin: auto;
    }
    .btn1 {
        position: relative;
        top: 25px;
        left: 25px;
        height: 200px;
        width: 200px;
        background-color: #20FC8F;
        box-shadow: 5px 5px 2px #888888;
    }
    .btn2 {
        position: relative;
        top: -175px;
        left: 275px;
        height: 200px;
        width: 200px;
        background-color: #FFFD98;
        box-shadow: 5px 5px 2px #888888;
    }
    .btn3 {
        position: relative;
        top: -150px;
        left: 25px;
        height: 200px;
        width: 200px;
        background-color: #85C7F2;
        box-shadow: 5px 5px 2px #888888;
    }
    .btn4 {
        position: relative;
        top: -350px;
        left: 275px;
        height: 200px;
        width: 200px;
        background-color: #F06449;
        box-shadow: 5px 5px 2px #888888;
    }
    #start{
        position: relative;
        top: -165px;
        left: 225px;
    }
</style>
@stop

@section('heading')

@stop

@section('subheading')

@stop

@section('image_url')
'/img/simon.jpg'
@stop

@section('content')
<main class="container">
        <h1>Simple Simon</h1>
        <h3 class="round">Round: </h3>
        <div id="gameBoard">
            <div class="button btn1" id="0"></div>
            <div class="button btn2" id="1"></div>
            <button id="start">Start!</button>
            <div class="button btn3" id="2"></div>
            <div class="button btn4" id="3"></div>
        </div>
    </main>
@stop

@section('js')
<script type="text/javascript">
    "use strict";

    // declaring the buttons array and empty sequences
    var buttons = $('.button');
    var simonSeq = [];
    var userIndex = 0;
    var buttonPosition;
    var square;
    console.log("If you want to cheat...")
    // game structure
    function game() {
        $('#start').click(function(){
            // simonsTurn();
            buttonBlackout();
        });     
    }

    // disables all buttons while animating
    function buttonBlackout() {
        disableStart();
        disableButtons();
        
        setTimeout(simonsTurn, (simonSeq.length * 1000 + 1));
        setTimeout(enableButtons, (simonSeq.length * 1000 + 1));
    };

    // adds a new value to the simon array
    function simonsTurn(){
        playSimonSeq();
    };

    // selecting random numbers and pushing to simon seq 
    // and animating simon sequence
    function playSimonSeq() {
        var decision = Math.floor((Math.random() * 4));
        simonSeq.push(decision);
        console.log("Simon: [" + simonSeq + "]");
        var i=0;
        var intervalId = setInterval(function() {
            if(i>=simonSeq.length){
                clearInterval(intervalId);
            }
            animateSquare(buttons[simonSeq[i]]);
            i++
        }, 600); 

        $('.round').html('Round: ' + simonSeq.length);
    };

    // animation function
    function animateSquare(square){
        $(square).animate({
            opacity: 0.25,
            top: "+=5",
            left: "+=5"
        }, 300);
        $(square).animate({
            opacity: 1,
            top: "-=5",
            left: "-=5",
            "box-shadow": 0
        }, 300);
    };

    // listens for user clicks on the buttons
    function enableButtons() {
        $('.button').on('click', function(){

            var squareClicked = $(this);
            var buttonPosition = squareClicked.attr('id');
            
            animateSquare(squareClicked);
            if(check(buttonPosition)) {
                simonsTurn();
            }   
        });
    };

    // compares your value to simons value
    function check(buttonPosition) {
        if (buttonPosition == simonSeq[userIndex]) {
            userIndex++;
            if (userIndex == simonSeq.length) {
                userIndex = 0;
                // simonsTurn();
                return true;
            }
        } else {
            gameOver();
        }
    };

    // game over behavior
    function gameOver(){
        alert('Game Over')
        simonSeq = [];
        game();
    }

    game();

    //////////////////////////////

    // disables start button
    function disableStart() {
        $('#start').off('click');
    };

    // disables 4 buttons
    function disableButtons() {
        $('.button').off('click');
};
</script>
@stop