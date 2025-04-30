@extends('layout')
@section('title', 'Master Category')
@section('content-title', 'Category')
@section('content')
@session('success')
    <div class="alert alert-warning">{{ session('success')}}</div>
@endsession

@session('add')
    <div class="alert alert-success">Category Ditambahkan</div>
@endsession

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add New Item</a>
            <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name}}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning" onclick='edit'>Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline" style="display:inline;" onsubmit="return confirm(yakin ingin menghapus?)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apa kamu yakin?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    {{-- <div class="alert alert-danger">
                        belum ada data
                    </div> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection