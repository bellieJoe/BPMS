@extends('main.layouts.master')
@section('content')
    <section class="p-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Permits</li>
        </ol>
        <br><br>
        <div class="table-responsive">
            <table class="table text-center table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Mode of Transportation</th>
                        <th>Date of Transportation</th>
                        <th>Purpose</th>
                        <th>Species</th>
                        <th>Status</th>
                        <th>Butterflies</th>
                        <th><i class="fa-solid fa-gear"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permits as $permit)
                        <tr>
                            <td>{{ $permit->user->business->name }}</td>
                            <td>{{ $permit->address }}</td>
                            <td>{{ $permit->mode_of_transport }}</td>
                            <td>{{ $permit->date_of_transport->format('F d, Y') }}</td>
                            <td>{{ $permit->purpose}}</td>
                            {{-- <td>{{ $permit->butterfly->local_name}}({{  $permit->butterfly->species }})</td> --}}
                            <td>{{ $permit->details}}</td>
                            <td >{{ $permit->status}}</td>
                            <td><a href="{{ route('permits.viewButterflies', ['application_id' => $permit->id]) }}" class="btn btn-sm btn-primary m-1">View List</a></td>
                            <td>
                                @if ($permit->status == 'pending')
                                    <form action="{{ route('permits.approve', ['id' => $permit->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-success m-1" type="submit">Approve</button>
                                    </form>
                                    <form action="{{ route('permits.decline', ['id' => $permit->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-danger m-1" type="submit">Decline</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No Records Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $permits }}
        </div>
    </section>
@endsection