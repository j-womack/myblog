<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="/css/jquery-ui.css">

    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

    {{ HTML::style('/css/clean_blog.css'); }}

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    @yield('style')

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "42de3165-bc3d-4232-96ea-0b930e2a5d56", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67016519-1', 'auto');
  ga('send', 'pageview');

</script>
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
                <a class="navbar-brand" href="/">noisefights.com</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="searchBar">
                    {{ Form::open(array('action' => 'PostsController@index', 'method' => 'get')) }}
    
                        {{ Form::text('search', null, ['class' => 'form-control search']) }}

                    {{ Form::close() }}
                    </li>

                    <li>
                        <a href="/about">About</a>
                    </li>
                    <li>
                        <a href="/portfolio">Portfolio</a>
                    </li>

                    @if(Auth::check())
                        <li>
                            <a href="/posts/create">Create a New Post</a>
                        </li>
                        <li>
                            <a href="/logout">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

{{-- {{ Post::randomImage() }} --}}
<header class="intro-header" style="background-image: url(@yield('image_url'))">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading" id="forceUp">
                    <h1>@yield('heading')</h1>
                    <hr class="small">
                    <span class="subheading">@yield('subheading')</span>
                </div>
            </div>
        </div>
    </div>
    @yield('credit')
</header>



    <div class="container main">

        @if($errors->has())
            <div class="row alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{{ $error }}}</li>
                @endforeach
            </div>
        @endif

        @if (Session::has('successMessage'))
            <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
        @endif

        @yield('content')

        <div class="konami">
            <img src="/img/duck.png" id="duck">
            <img src="/img/confetti.gif" id="confetti">
        </div>
    </div>

<hr class="featurette-divider">

<footer class="footer-container container">
    <div class="row">
        {{-- <p class="text-muted squeeze"> --}}
            <div class="col-xs-4">
                <a href="#"><span class="glyphicon glyphicon-chevron-up"></span>Back to top</a>
            </div>
            
            <div class="col-xs-4">
                <p class="squeeze text-center">
                    <a href="http://github.com/j-womack"><span class="fa fa-github-square fa-2x grey"></span></a>
                    <a href="https://www.linkedin.com/pub/joshua-womack/71/946/704"><span class="fa fa-linkedin-square fa-2x grey"></span></a>
                    <a href="http://instagram.com/noisefights"><span class="fa fa-instagram fa-2x grey"></span></a>
                </p>
            </div>

            <div class="col-xs-4 text-right">
                @if(!Auth::check())
                    <p class="squeeze"><a href="/login">Login</a></p>
                @endif
            </div>
        {{-- </p> --}}
    </div>
</footer>

    {{-- JS/JQuery --}}
    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        "use strict";
        $(document).ready(function(){
            var sequence = [];
            var konami = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65, 13];
            $(document).keyup(function(event){
                sequence.push(event.keyCode);
                if (sequence.length > 11){
                    sequence.shift();
                };

                if (sequence.toString() == konami.toString()) {
                    $('#duck').animate({
                        left: $( window ).width()
                    }, 10000, "swing", function() {
                       // Animation complete.
                       $('#duck').hide()
                    });
                    $('#confetti').animate({
                        left: $( window ).width()
                    }, 10000, "swing", function() {
                       // Animation complete.
                       $('#confetti').hide()
                    });
                };

            });
        });

    </script>
    @yield('js')

</body>
</html>
