@extends('layout')
@section('title', 'Add Category')
@section('content-title', 'Add Category')
@section('content') 
<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="form-group mb-3">
    <label class="font-weight-bold">Category Name</label>
    <textarea class="form-control @error('name') is-invalid @enderror" name="name" rows="5" placeholder="Masukkan Nama Category">{{ old('name') }}</textarea>

    <!-- error message untuk name -->
    @error('name')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
    <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
    <button type="reset" class="btn btn-md btn-warning">RESET</button>
</form>
@endsection