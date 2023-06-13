@extends('auth.layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sign In</li>
        </ol>
    </nav>
    <div class="container-lg">
        <br><br><br>
        <form action="{{ route('auth.authenticate') }}" class="mx-auto" style="max-width: 500px" method="POST">
            
            @csrf
            <h2>Sign In</h2>
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
            @error('username')
                    <span class="text-danger">{{ $message }}</span><br>
            @enderror
            <label for="">Password</label>
            <input type="password" class="form-control" name="password">
            @error('password')
                    <span class="text-danger">{{ $message }}</span><br>
            @enderror
            @error('invalid-credentials')
                    <span class="text-danger">{{ $message }}</span><br>
            @enderror
            <br>
            <button class="btn btn-primary" type="submit">Sign In</button>
        </form>
    </div>
@endsection