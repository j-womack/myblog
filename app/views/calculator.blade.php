@extends('layouts.master')

@section('title')
Calculator
@stop

@section('style')
<style>
    #calculator {
        width: 220px;
        background-color: lightsteelblue;
        padding: 10px;
        border: 15px;
    }
    #inputRow {
        width: 200px;
        text-align: center;
    }
    #firstOperand {
        width: 85px;
    }
    #operator {
        width: 15px;
    }
    #secondOperand {
        width: 85px;
    }
    .btn {
        width: 44px;
    }
    #buttonRow {
        width: 200px;
        text-align: center;
    }
    #label {
        text-align: center;
    }
    h1 {
        margin: 10px;
    }
</style>
@stop

@section('content')
        <div class="container">
        <div id="calculator">
            <h1>Calculator!</h1>
            <div id="inputRow">
                <input type="text" name="firstOperand" id="firstOperand" value="" readonly>
                <input type="text" name="operator" id="operator" value="" readonly>
                <input type="text" name="secondOperand" id="secondOperand" value="" readonly>
            </div>

            <div id="buttonRow">
                <button type="button" class="btn btn-primary btn-lg number" id="btn1" value="1">1</button>
                <button type="button" class="btn btn-primary btn-lg number" id="btn2" value="2">2</button>
                <button type="button" class="btn btn-primary btn-lg number" id="btn3" value="3">3</button>
                <button type="button" class="btn btn-primary btn-lg operation" id="btnPlus" value="+">+</button>
            </div>

            <div id="buttonRow">
                <button type="button" class="btn btn-primary btn-lg number" id="btn4" value="4">4</button>
                <button type="button" class="btn btn-primary btn-lg number" id="btn5" value="5">5</button>
                <button type="button" class="btn btn-primary btn-lg number" id="btn6" value="6">6</button>
                <button type="button" class="btn btn-primary btn-lg operation" id="btnMinus" value="-">-</button>
            </div>

            <div id="buttonRow">
                <button type="button" class="btn btn-primary btn-lg number" id="btn7" value="7">7</button>
                <button type="button" class="btn btn-primary btn-lg number" id="btn8" value="8">8</button>
                <button type="button" class="btn btn-primary btn-lg number" id="btn9" value="9">9</button>
                <button type="button" class="btn btn-primary btn-lg operation" id="btnMultiply" value="*">*</button>
            </div>

            <div id="buttonRow">
                <button type="button" class="btn btn-primary btn-lg" id="btnClear" value="">C</button>
                <button type="button" class="btn btn-primary btn-lg number" id="btn0" value="0">0</button>
                <button type="button" class="btn btn-primary btn-lg" id="btnEquals" value="=">=</button>
                <button type="button" class="btn btn-primary btn-lg operation" id="btnDivide" value="/">/</button>
            </div>
        </div>
    </div>
@stop

@section('js')
<script type="text/javascript">
    "use strict";
    // (function(){
        var firstOperand = document.getElementById('firstOperand');
        var operator = document.getElementById('operator');
        var secondOperand = document.getElementById('secondOperand');
        var numbers = document.getElementsByClassName('number')
        operator.value = null;

        console.log(firstOperand);


        document.getElementById('btnPlus').addEventListener('click',
            function(){
                operator.value = "+";
            }, false);
        document.getElementById('btnMinus').addEventListener('click',
            function(){
                operator.value = "-";
            }, false);
        document.getElementById('btnMultiply').addEventListener('click',
            function(){
                operator.value = "*";
            }, false);
        document.getElementById('btnDivide').addEventListener('click',
            function(){
                operator.value = "/";
            }, false);

        for (var i=0; i<numbers.length; i++){
            console.log(numbers[i].value);
            numbers[i].addEventListener('click', function(){
                if (!operator.value) {
                    firstOperand.value += this.value;
                } else {
                    secondOperand.value += this.value;
                }
            }, false);
        };

        document.getElementById('btnEquals').addEventListener('click',
            function(){
                var evaluation
                if (operator.value == "+"){
                    evaluation = parseInt(firstOperand.value, 10) + parseInt(secondOperand.value, 10);
                } else if (operator.value == "-"){
                    evaluation = parseInt(firstOperand.value, 10) - parseInt(secondOperand.value, 10);
                } else if (operator.value == "*"){
                    evaluation = parseInt(firstOperand.value, 10) * parseInt(secondOperand.value, 10);
                } else if (operator.value == "/"){
                    evaluation = parseInt(firstOperand.value, 10) / parseInt(secondOperand.value, 10);
                }
                firstOperand.value = evaluation;
                operator.value = "";
                secondOperand.value = "";
            }, false);

        document.getElementById('btnClear').addEventListener('click',
            function(){
                firstOperand.value = "";
                operator.value = "";
                secondOperand.value = "";
            }, false);
    // })();
</script>

@stop
