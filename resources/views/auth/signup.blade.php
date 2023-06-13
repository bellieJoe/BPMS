@extends('auth.layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
        </ol>
    </nav>
    <br><br><br>
    <form action="{{ route('auth.store') }}" class="container-lg" method="POST">
        @csrf
        <h2>Sign Up</h2>
        <div class="row">
            <div class="col-md-5 mb-2">
                <label for="">Owners Name</label>
                <input type="text" class="form-control" name="name"  value="{{ old("name") }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-2">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username"  value="{{ old("username") }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-2">
                <label for="">Business Name</label>
                <input type="text" class="form-control" name="business_name" value="{{ old("business_name") }}">
                @error('business_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-2">
                <label for="">Email Address</label>
                <input type="text" class="form-control" name="email" value="{{ old("email") }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-2">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" value="{{ old("address") }}">
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-2">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-2">
                <label for="">Contact Number</label>
                <input type="text" class="form-control" name="contact_number" value="{{ old("contact_number") }}">
                @error('contact_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <br>
        <button class="btn btn-primary" type="submit">Sign Up</button>
    </form>
@endsection