<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan</title>
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <link href="{{mix('css/apk.css')}}" rel="stylesheet">
</head>
<body>
    <h2>Ini Latihan Vue</h2>
    <div id="container">
        <div id="apk">
        </div>
    </div>
<script src="{{mix('js/apk.js')}}"></script>
</body>
</html>