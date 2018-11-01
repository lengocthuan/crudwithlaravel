<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Task CRUD</title>
        <!-- CSS And JavaScript -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">        
        {!! Html::style('css/all-css.css') !!}        
        {!! Html::script('js/all-js.js') !!}
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->                
                <center><h1>{!! Form::label('litk', trans('message.ltask'), ['class' => 'text-muted']) !!}</p></h1></center>
            </nav>
        </div>
        @yield('content')        
    </body>
</html>
