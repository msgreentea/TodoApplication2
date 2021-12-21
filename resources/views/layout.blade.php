<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
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
            <div class="ListedTasks">
                <table>
                    <tr>
                        <th></th>
                        <th>created date</th>
                        <th>task</th>
                        <th>update</th>
                        <th>delete</th>
                    </tr>
            @yield('content')
                </table>
            </div>
        </div>
    </div>
</body>

</html>
