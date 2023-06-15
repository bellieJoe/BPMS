<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
    </head>
    <body class="antialiased">
        <div class="container-lg">
            <br><br><br><br>
            <h1 class="fa fa-history text-center h1 font-weight-bold" aria-hidden="true"><span class="text-primary">OFSPTS</span> - Online Services Permitting and Transaction System</h1>
        </div>
        <br><br>
        @if (!auth()->user())
            <div class="mx-auto" style="width: fit-content">
                <a href="{{ route('auth.signin') }}" class="btn btn-lg btn-primary">Sign In</a>
                <a href="{{ route('auth.signup') }}" class="btn btn-lg btn-secondary">Sign Up</a>
            </div>
        @else
            <a href="{{ auth()->user()->user_type == '1' ? route('butterflies.index') : route('permits.index') }} " class="btn btn-lg btn-primary d-block mx-auto" style="width: fit-content">Launch</a>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>
