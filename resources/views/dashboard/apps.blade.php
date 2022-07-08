@extends('dashboard.layout.apps')

@section('title', 'List Sistem Pendukung Keputusan')

@section('content')
    <div class="container">
        <div class="row flex-row justify-content-between mt-5">
            <div class="col ms-0 ps-0">
                <a href="/" class="btn btn-primary">Back</a>
            </div>
            <div class="col text-end me-0 pe-0">
                <h4 class="fw-bold">List Sistem Pendukung Keputusan</h4>
            </div>
        </div>
        <div class="text-center mt-5 me-2">
            @forelse ($apps as $app)
                <a href="/app/{{ $app->id }}" class="btn btn-primary">
                    {{ $app->name }}
                </a>
            @empty
                <p>No Datas!</p>
            @endforelse
        </div>
    </div>
@endsection
