@extends('main.layouts.master')
@section('content')
    <section class="p-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('permits.index') }}">Permits</a></li>
            <li class="breadcrumb-item active" aria-current="page">Submit Application</li>
        </ol>
        <form action="{{ route('permits.store') }}" method="POST" style="max-width: 700px">
            @csrf
            <h5>Submit Application permit</h5>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="">Mode of Transport</label>
                    <input type="text" class="form-control" name="mode_of_transport">
                    @error('mode_of_transport')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="">Date of Transport</label>
                    <input type="date" class="form-control" name="date_of_transport">
                    @error('date_of_transport')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="">Butterfly Species</label>
                    <select name="species" id="" class="form-control">
                        <option value="">-Select Butterfly Species-</option>
                        @foreach ($butterflies as $butterfly)
                        <option value="{{ $butterfly->id }}">{{ $butterfly->local_name }}({{ $butterfly->species }})</option>
                        @endforeach
                    </select>
                    @error('species')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">Purpose</label>
                    <textarea name="purpose" id="" class="form-control"></textarea>
                    @error('purpose')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">Butterfly Details</label>
                    <textarea name="details" id="" class="form-control"></textarea>
                    @error('details')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary" type="submit">File Application</button>
        </form>
    </section>
@endsection