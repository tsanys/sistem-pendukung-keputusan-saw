@extends('dashboard.layout.app')

@section('title', $app->name)

@section('content')
    <div class="container">
        <div class="row flex-row justify-content-between mt-5">
            <div class="col-3 ms-0 ps-0">
                <a href="/" class="btn btn-primary me-1">Home</a>
                <a href="/apps" class="btn btn-primary">Back</a>
            </div>
            <div class="col text-end me-0 pe-0 d-flex flex-row justify-content-end">
                <h4 class="fw-bold">Sistem Pendukung Keputusan {{ $app->name }}</h4>
                <button class="btn" data-bs-toggle="modal" data-bs-target="#editModal{{ $app->id }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </button>
            </div>
        </div>
        <div class="row mt-5">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2>{{ $app->name }}</h2>
            <p>{{ $app->description }}</p>

            <div class="mt-3">
                <form action="/app/{{ $app->id }}" method="POST" onsubmit="return confirm('You sure to delete this app?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete {{ $app->name }}</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal{{ $app->id }}" tabindex="-1" aria-labelledby="editModal{{ $app->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/edit-app/{{ $app->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal{{ $app->id }}Label">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama SPK</label>
                            <input type="text" class="form-control" id="name" placeholder="Nama SPK" name="name" value="{{ $app->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" placeholder="Deskripsi" name="description" rows="3">{{ $app->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
