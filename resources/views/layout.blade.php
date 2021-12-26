<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@yield('css')
<link rel="shortcut icon" href="/img/snoopy.svg" type="image/x-icon">
<title>@yield('title')</title>
</head>

<body>
    <div class="beige">
        <div class="container">
            <h1>
                @yield('title')
            </h1>
            @yield('textbox')
            @yield('content')
            <div class="ListedTasks">
            </div>
        </div>
    </div>
</body>

</html>
