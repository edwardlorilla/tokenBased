<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script  type="text/javascript" >
        window.Laravel = {csrfToken: '{{ csrf_token() }}'}
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}"/>
    <title>Time Management</title>

</head>
<body>
<div id="app">
    <register></register>
    <login></login>
</div>
</body>
<script type="text/javascript" src="{{mix('/js/app.js')}}"></script>

</html>