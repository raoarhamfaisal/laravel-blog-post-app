<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Homepage</title>
    </head>

    <body>
        <h1>Welcome Page</h1>
        <a href="/about">About</a>
        <h2>A great and good number is {{ 2 + 5 }}</h2>
        <ul>
            @foreach ($animals as $animal)
                <li>{{ $animal }}</li>
            @endforeach
        </ul>
    </body>

</html>
