@extends('main.layouts.master')
@section('content')
    <section class="p-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page"><a href="{{ route('butterflies.index') }}">Butterfly</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
        <form action="{{ route('butterflies.store') }}" method="POST" style="max-width: 700px" enctype="multipart/form-data">
            @csrf
            <h5>Add New Butterfly</h5>
            <div class="row">
                <div class="col-lg-6 mb-3 mb-3">
                    <label for="">Butterfly Species</label>
                    <input type="text" class="form-control" name="species">
                    @error('species')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3 mb-3">
                    <label for="">Common Name/Local Name</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3 mb-3">
                    <label for="">Input Code</label>
                    <input type="text" class="form-control" name="input_code">
                    @error('input_code')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3 mb-3">
                    <label for="">Wing Span</label>
                    <div class="input-group ">
                        <input type="number" class="form-control" name="wing_span">
                        <div class="input-group-append">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                    @error('wing_span')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-4 py-3 mb-3">
                    <input type="checkbox" class="h1" name="is_rare"> Is Rare?
                    @error('is_rare')
                        <br><span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-4 py-3 mb-3">
                    <input type="checkbox" class="h1" name="is_threatened"> Is Threatened?
                    @error('is_threatened')
                        <br><span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-4 py-3 mb-3">
                    <input type="checkbox" class="h1" name="is_vulnerable"> Is Vulnerable?
                    @error('is_vulnerable')
                        <br><span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3 mb-3">
                    <label for="">Male</label>
                    <input type="file" accept="image/png" class="form-control-file" name="male">
                    @error('male')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3 mb-3">
                    <label for="">Female</label>
                    <input type="file" accept="image/png" class="form-control-file" name="female">
                    @error('female')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3 mb-3">
                    <label for="">Caterpillar</label>
                    <input type="file" accept="image/png" class="form-control-file" name="caterpillar">
                    @error('caterpillar')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3 mb-3">
                    <label for="">Pupa</label>
                    <input type="file" accept="image/png" class="form-control-file" name="pupa">
                    @error('pupa')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Save Butterfly</button>
            </div>
        </form>
    </section>
@endsection