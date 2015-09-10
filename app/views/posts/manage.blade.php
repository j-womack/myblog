@extends('layouts.master')

@section('title', 'Manage Posts')

@section('style')

@stop

@section('heading')
All Posts
@stop

@section('subheading')

@stop

@section('image_url')
'/img/header/coffee{{ Post::randomCoffee() }}.jpg'
@stop

@section('content')
<div ng-controller="ManageController">
    <table class="table table-hover">
        <tr ng-repeat="post in posts">
            <td>@{{ post.title }}</td>
            <td>@{{ post.user.email }}</td>
            <td>@{{ post.updated_at }}</td>
            <td><a class="btn btn-xs btn-primary raised" href="/posts/@{{ post.id }}/edit">Edit</a></td>
            <td><a class="btn btn-xs btn-danger raised" ng-click="deletePost(post.id)"><span class="glyphicon glyphicon-remove"></a></td>
        </tr>
    </table>
</div>
@stop

@section('js')
<script type="text/javascript" src="/js/angular.min.js"></script>
<script type="text/javascript" src="/js/blog.js"></script>
<script src="bower_components\angular-modal-service\dst\angular-modal-service.min.js"></script>
@stop