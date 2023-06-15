@extends('main.layouts.master')
@section('content')
    <div class="p-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('butterflies.index') }}">Butterfly</a></li>
        </ol>
        <a class="btn btn-primary" href="{{ route('butterflies.create') }}">Add New Species</a>
        <div class="table-responsive">
            <br>
            <table class="table table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Species</th>
                        <th>Local Name</th>
                        <th>Is Rare</th>
                        <th>Is Threatened</th>
                        <th>Is Vulnerable</th>
                        <th>Input Code</th>
                        <th>Wing Span</th>
                        <th>Male Image</th>
                        <th>Female Image</th>
                        <th>Pupa Image</th>
                        <th>Caterpillar Image</th>
                        <th><i class="fa-solid fa-gear"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($butterflies as $butterfly)
                        <tr>
                            <td>{{ $butterfly->species }}</td>
                            <td>{{ $butterfly->local_name }}</td>
                            <td>{{ $butterfly->is_rare == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $butterfly->is_threatened == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $butterfly->is_vulnerable == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $butterfly->input_code }}</td>
                            <td>{{ $butterfly->wing_span }}cm</td>
                            <td><a target="_blank" href="{{ route('butterflies.viewImage', ['url' => $butterfly->male_img_url]) }}">{{ $butterfly->male_img_url }}</a></td>
                            <td><a target="_blank" href="{{ route('butterflies.viewImage', ['url' => $butterfly->female_img_url]) }}">{{ $butterfly->female_img_url }}</a></td>
                            <td><a target="_blank" href="{{ route('butterflies.viewImage', ['url' => $butterfly->pupa_img_url]) }}">{{ $butterfly->pupa_img_url }}</a></td>
                            <td><a target="_blank" href="{{ route('butterflies.viewImage', ['url' => $butterfly->caterpillar_img_url]) }}">{{ $butterfly->caterpillar_img_url }}</a></td>
                            <th>
                                <form action="{{ route('butterflies.destroy', ['id' => $butterfly->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12">No Records Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection