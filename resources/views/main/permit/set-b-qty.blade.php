@extends('main.layouts.master')
@section('content')
    <section class="p-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('permits.index') }}">Permits</a></li>
            <li class="breadcrumb-item active" aria-current="page">Submit Application</li>
        </ol>
        <form action="{{ route('permits.store2') }}" method="POST" style="max-width: 700px">
            @csrf
            <h5>Submit Application permit</h5>
            <h6>Set butterfly quantities</h6>
            <input type="hidden" name="permit_id" value="{{$permit->id}}">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>Species</th>
                    <th>Quantity</th>
                </thead>
                <tbody>
                    @foreach ($butterflies as $b)
                        <tr>
                            <td>{{$b->local_name}} - {{$b->local_name}}</td>
                            <td><input class="form-control" type="number" name="{{$b->id}}" required></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary" type="submit">File Application</button>
        </form>
    </section>
@endsection