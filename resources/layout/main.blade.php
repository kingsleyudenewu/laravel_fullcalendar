<?php
/**
 * Created by Kingsley.
 * User: apple
 * Date: 14/03/2019
 * Time: 12:20 AM
 */
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('style')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Laravel Appointment Schedule</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css" />
    </head>
    <body>
        @yield('content')
    </body>


    @yield('script')
</html>
