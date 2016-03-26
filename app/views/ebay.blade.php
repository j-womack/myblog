@extends('layouts.master')

@section('title')

@stop

@section('style')
<style media="screen">
    #offerPrice {
        color: red;
        font-size: 2em;
    }
</style>
@stop

@section('heading')

@stop

@section('subheading')

@stop

@section('image_url')
'/img/lens.jpg'
@stop

@section('content')
    <h1>Search:</h1>
    {{ Form::open(array('action' => 'HomeController@ebay')) }}
        {{ Form::label('Item Name') }}
        {{ Form::text('itemName', Input::old('itemName'), ['class' => 'form-control search']) }}
        {{ Form::label('Category') }}
        {{ Form::select('category',$categories, Input::old('category') ) }}
        {{ Form::submit('Submit') }}
    {{ Form::close() }}
    
    @if(isset($query))
    
        <h3>eBay Search Results for {{ $query }}</h3>
        <h4>Average Price: <span id="averagePrice">{{ $average }}</span></h4>
        <table id="offerTable" class="col-xs-12">
            <tr>
                <td>
                    {{ Form::label('Buy/Trade') }} <br>
                    {{ Form::select(
                        'buyTrade', 
                        array(
                            '0' => 'Buy', 
                            '1' => 'Trade'
                        ),
                        '0', 
                        array('id' => 'buyTrade')
                    ) }}
                    <div id="mathBuyTrade" style="display:none">.5</div>
                    <br>
                    {{ Form::label('Condition') }} <br>
                    {{ Form::select(
                        'condition', 
                        array(
                            '0' => 'Like New', 
                            '1' => 'Excellent+',
                            '2' => 'Excellent',
                            '3' => 'Bargain'
                        ),
                        '0',
                        array('id' => 'condition')
                    ) }}
                    <div id="mathCondition" style="display:none">1</div>
                </td>
                <td>
                    {{ Form::label('Deductions') }}
                    <br>
                    {{ Form::label('Needs Battery') }}
                    {{ Form::checkbox('Need Battery', 'battery', false, array('id' => 'battery')) }}
                    <div id="mathBattery" style="display:none">0</div>
                    <br>
                    {{ Form::label('Needs Sensor Clean') }}
                    {{ Form::checkbox('Need Sensor Clean', 'sensorClean', false, array('id' => 'sensorClean')) }}
                    <div id="mathSensorClean" style="display:none">0</div>
                    <br>
                    {{ Form::label('Needs Cleaning') }}
                    {{ Form::checkbox('Need Cleaning', 'cleaning', false, array('id' => 'cleaning')) }}
                    <div id="mathCleaning" style="display:none">0</div>
                    <br>
                    {{ Form::label('Needs Charger') }}
                    {{ Form::checkbox('Needs Charger', 'charger', false, array('id' => 'charger')) }}
                    <div id="mathCharger" style="display:none">0</div>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <h4>Offer Price:</h4>
                    <h1 id="offerPrice"></h1>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    {{ $results }}
                </td>
            </tr>
        </table>
    @endif
@stop

@section('js')
<script type="text/javascript">
    "use strict"
    var average;
    var buyTrade;
    var condition;
    var deductions;
    
    $('#offerPrice').html(($('#averagePrice').html() * $('#mathBuyTrade').html()).toFixed(2));
    
    $('#buyTrade').on('change', function(){
        switch ($('#buyTrade').val()) {
            case '0':
                $('#mathBuyTrade').html('.5');
                break;
            case '1':
                $('#mathBuyTrade').html('.6');
                break;
        }
    });
    
    $('#condition').on('change', function(){
        switch ($('#condition').val()) {
            case '0':
                $('#mathCondition').html('1');
                break;
            case '1':
                $('#mathCondition').html('.85');
                break;
            case '2':
                $('#mathCondition').html('.75');
                break;
            case '3':
                $('#mathCondition').html('.55');
                break;
        }
    });
    
    $('#battery').change(function() {
        if ($(this).is(':checked')) {
            $('#mathBattery').html('35');
        } else {
            $('#mathBattery').html('0');
        }
    });
    $('#sensorClean').change(function() {
        if ($(this).is(':checked')) {
            $('#mathSensorClean').html('79.5');
        } else {
            $('#mathSensorClean').html('0');
        }
    });
    $('#cleaning').change(function() {
        if ($(this).is(':checked')) {
            $('#mathCleaning').html('48.5');
        } else {
            $('#mathCleaning').html('0');
        }
    });
    $('#charger').change(function() {
        if ($(this).is(':checked')) {
            $('#mathCharger').html('50');
        } else {
            $('#mathCharger').html('0');
        }
    });
    
    $('#buyTrade, #condition, #battery, #sensorClean, #cleaning, #charger').on('change', function(){

        average = parseFloat($('#averagePrice').html());
        buyTrade = parseFloat($('#mathBuyTrade').html());
        condition = parseFloat($('#mathCondition').html());
        deductions = parseFloat($('#mathBattery').html()) + parseFloat($('#mathSensorClean').html()) + parseFloat($('#mathCleaning').html()) + parseFloat($('#mathCharger').html());
        
        $('#offerPrice').html((
            (average * buyTrade * condition) - deductions
        ).toFixed(2));

    });
</script>
@stop





