<!DOCTYPE html>
<html lang="{{ Str::replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Karla&family=Montserrat:wght@700&display=swap" media="print" onload="this.media='all'">
        <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>

        <div id="app">
        
            <navigation></navigation>
        
            @yield( 'content' )

            <footer>
                <p><?php echo 'Copyright &copy; ' . date('Y'); ?></p>
            </footer>

        </div>  

        <script src="{{ URL::asset('/js/app.es5.js') }}" defer></script>

    </body>
</html>
