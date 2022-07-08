@extends('dashboard.layout.app')

@section('title', $app->name)

@section('content')
    <div class="container">
        <div class="row flex-row justify-content-between mt-5">
            <div class="col-3 ms-0 ps-0">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Create">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add New
                </button>
            </div>
            <div class="col text-end me-0 pe-0 d-flex flex-row justify-content-end">
                <h4 class="fw-bold">Alternatives of {{ $app->name }}</h4>
            </div>
        </div>
        <div class="row mt-5">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start" style="width: 5%">#</th>
                                    <th class="border-0" style="width: 65%">Name</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Item -->
                                @forelse ($app->alternatives as $alt)
                                    <tr>
                                        <td style="width: 5%">{{ $loop->iteration }}</td>
                                        <td style="width: 65%">{{ $alt->name }}</td>
                                        <td class="d-flex flex-row">
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $alt->id }}" type="button">
                                                Edit
                                            </button>
                                            <form action="/alternative/{{ $alt->id }}" method="POST" onsubmit="return confirm('You sure to delete this criteria?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $alt->id }}" tabindex="-1" aria-labelledby="editModal{{ $alt->id }}Label" aria-hidden="true">
                                        @include('dashboard.pages.alternatives.modal-edit')
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <h6>No Datas!</h6>
                                        </td>
                                    </tr>
                                @endforelse
                                <!-- End of Item -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/alternative/{{ $app->id }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Create Alternative</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fw-bold">Input score for each criterias.</h6>
                                <div role="separator" class="dropdown-divider my-3"></div>
                                @foreach ($app->criterias as $crt)
                                    <div class="mb-3">
                                        <label for="criteria-{{ $crt->id }}" class="form-label">{{ $crt->name }}</label>
                                        <input type="text" class="form-control" id="criteria-{{ $crt->id }}" placeholder="{{ $crt->name }}" name="scores[][{{ $crt->id }}]">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
