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
                <h4 class="fw-bold">Criterias of {{ $app->name }}</h4>
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
                                    <th class="border-0 rounded-start">#</th>
                                    <th class="border-0">Code</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Type</th>
                                    <th class="border-0">
                                        Weight (<span id="totalW" class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="if the total weight is more than 100% or less, then you have to change each weight so that the total weight fits 100%"></span> %)
                                    </th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Item -->
                                @forelse ($app->criterias as $crt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $crt->code }}</td>
                                        <td>{{ $crt->name }}</td>
                                        <td>{{ $crt->type }}</td>
                                        <td id="weights">{{ $crt->weight }} %</td>
                                        <td class="d-flex flex-row">
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $crt->id }}" type="button">
                                                Edit
                                            </button>
                                            <form action="/criteria/{{ $crt->id }}" method="POST" onsubmit="return confirm('You sure to delete this criteria?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $crt->id }}" tabindex="-1" aria-labelledby="editModal{{ $crt->id }}Label" aria-hidden="true">
                                        @include('dashboard.pages.criterias.modal-edit')
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
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
                <form action="/criteria/{{ $app->id }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Create Criteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" class="form-control" id="code" placeholder="Code" name="code">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" aria-label="Type" id="type" name="type">
                                <option value="cost">Cost</option>
                                <option value="benefit">Benefit</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="text" class="form-control" id="weight" placeholder="Weight (%)" name="weight">
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

    <script>
        var total = 0;
        var weights = document.querySelectorAll('#weights');
        for (var i = 0; i < weights.length; i++) {
            total += parseInt(weights[i].innerHTML);
        }
        document.getElementById('totalW').innerHTML = total;

        if (total > 100 || total < 100) {
            document.getElementById('totalW').innerHTML = '<span class="text-danger">' + total + '</span>';
        }

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
