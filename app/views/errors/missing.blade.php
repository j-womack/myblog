<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nope...</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="/css/jquery-ui.css">

    
    @yield('style')

    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);

        body {
            margin:0;
            font-family:'Lato', sans-serif;
        }
    </style>

    {{ HTML::style('/css/clean_blog.css'); }}
    
</head>
<body>

<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/posts">blog.dev</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    {{ Form::open(array('action' => 'PostsController@index', 'method' => 'get')) }}
    
                        {{ Form::text('search', null, ['class' => 'form-control search']) }}

                    {{ Form::close() }}
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

{{-- {{ Post::randomImage() }} --}}
<header class="intro-header missing" style="background-image: url('/img/404.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading lower">
                    <h1>Nope...</h1>
                    <hr class="small">
                    <span class="subheading">This isn't a thing. Go somewhere else.</span>
                </div>
            </div>
        </div>
    </div>
</header>

</body>
</html>
