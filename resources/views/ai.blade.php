<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body>
    @csrf
    <form action="http://localhost:8000/generate-review" method="POST">
        @csrf
        <input type="text" name="product_description" placeholder="Enter product name" />

        <button type="submit">Generate Review</button>

    
    
    </body>
</html>
