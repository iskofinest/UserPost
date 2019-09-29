<!DOCTYPE html>
<html lang="en">
<head>

    {{--    adapt on the size of the device--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--    bootstrap css framework--}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    {{--    font awesome icons--}}
    <link href="{{ asset('assets/fontawesome/css/all.css')  }}" rel="stylesheet">

    {{--    my custom css style--}}
    <link href="{{ asset('assets/css/customStyle.css')  }}" rel="stylesheet">

    {{--    icon of the webpage--}}
    <link rel="icon" href="{{ asset('assets/icons/laravelicon.ico') }}">
    <title>User Post</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/home">User Post</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @if(Auth::user())
                <li class="nav-item">
                    <a class="nav-link" href="/home">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/{{ Auth::user()->id }}">My Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/create">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>

<div class="jumbotron">

    @if(session('errors'))
        @foreach(session('errors')->getMessages('errors') as $error)
            @foreach($error as $message)
                <div class="alert alert-warning font-weight-bold text-center">
                    {{ $message  }}
                </div>
            @endforeach
        @endforeach
        {{ session()->forget('errors')  }}
    @endif

    @if(session('success'))
        <div class="alert alert-success font-weight-bold text-center">
            {{ session('success')  }}
        </div>
    @endif

    @yield('content')

    <div class="footer align-bottom">
        <hr />
        <small>Copyright &copy; <?php echo date('Y');?> "Seminar in Laravel - The PHP Framework for Web Artisans"</small>
    </div>

</div>

@yield('script')

</body>
</html>
