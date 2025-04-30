@extends('layout')
@section('title', 'Edit Category')
@section('content-title', 'Edit Category')
@section('content') 
<form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="form-group mb-3">
    <label class="font-weight-bold">Category Name</label>
    <textarea class="form-control @error('name') is-invalid @enderror" name="name" rows="5" placeholder="Masukkan Nama Category Baru">{{ old('name') }}</textarea>

    <!-- error message untuk name -->
    @error('name')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
    <button type="submit" class="btn btn-md btn-primary me-3">UBAH</button>
    <button type="reset" class="btn btn-md btn-warning">RESET</button>
</form>
@endsection