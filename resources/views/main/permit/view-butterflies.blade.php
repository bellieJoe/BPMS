@extends('main.layouts.master')
@section('content')
<section class="p-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('permits.index') }}">Permits</a></li>
        <li class="breadcrumb-item active" aria-current="page">Butterfly List</li>
    </ol>
    <h5>Permit Details</h5>
    <table class="table-sm table-bordered small">
        <tr>
            <td class="text-bold">Application ID</td>
            <td>{{ $permit->id }}</td>
        </tr>
        <tr>
            <td class="text-bold">Requested By</td>
            <td>{{ $permit->user->name }}</td>
        </tr>
        <tr>
            <td class="text-bold">Business Name</td>
            <td>{{ $permit->user->business->name }}</td>
        </tr>
        <tr>
            <td class="text-bold">Address</td>
            <td>{{ $permit->address }}</td>
        </tr>
        <tr>
            <td class="text-bold">Mode of Transport</td>
            <td>{{ $permit->mode_of_transport }}</td>
        </tr>
        <tr>
            <td class="text-bold">Date of Transport</td>
            <td>{{ $permit->date_of_transport->format("F d, Y") }}</td>
        </tr>
        <tr>
            <td class="text-bold">Purpose</td>
            <td>{{ $permit->purpose }}</td>
        </tr>
        <tr>
            <td class="text-bold">Details</td>
            <td>{{ $permit->details }}</td>
        </tr>
        <tr>
            <td class="text-bold">Status</td>
            <td class="{{$permit->status == 'declined' ? 'text-danger' : ($permit->status == 'pending' ? 'text-primary' : 'text-success')}}">{{ $permit->status }}</td>
        </tr>
    </table>
    <br>

    <h5>List of Butterflies</h5>
    {{-- {{$butterflies}} --}}
    <table class="table-sm table-bordered small">
        <thead>
            <tr>
                <th>Species</th>
                <th>Local Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($butterflies as $b)
            <tr>
                <td>{{$b->species}}</td>
                <td>{{$b->local_name}}</td>
                <td>{{ $species[$b->id]}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection