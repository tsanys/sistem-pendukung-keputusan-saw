@extends('dashboard.layout.app')

@section('title', $app->name)

@section('content')
    <style>
        #myTable tr:nth-child(1) {
            background-color: #C4DFAA;
            font-weight: 800;
        }
    </style>

    <div class="container">
        <div class="row flex-row justify-content-between mt-5">
            <div class="col text-end me-0 pe-0 d-flex flex-row justify-content-end">
                <h4 class="fw-bold">Evaluation of {{ $app->name }}</h4>
            </div>
        </div>
        <div class="row flex-row justify-content-between mt-3">
            <div class="col text-end p-0 d-flex flex-row justify-content-start">
                <h6 class="fw-bold">Criterias</h6>
            </div>
        </div>
        <div class="row mt-3">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">Code</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Weight</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Item -->
                                    @forelse ($criterias as $crt)
                                        <tr>
                                            <td>{{ $crt->code }}</td>
                                            <td>{{ $crt->name }}</td>
                                            <td>{{ $crt->weight / $total_weight }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
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
        <div class="row flex-row justify-content-between mt-3">
            <div class="col text-end p-0 d-flex flex-row justify-content-start">
                <h6 class="fw-bold">Alternatives</h6>
            </div>
        </div>
        <div class="row mt-3">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">Alternative</th>
                                    @foreach ($criterias as $crt)
                                        <th class="border-0">{{ $crt->code }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Item -->
                                    @forelse ($alternatives as $alt)
                                        <tr>
                                            <td>{{ $alt->name }}</td>
                                            @foreach ($alt->scores as $d)
                                                <td>{{ $d->score }}</td>
                                            @endforeach
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="{{ count($criterias) }}" class="text-center">
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
        <div class="row flex-row justify-content-between mt-3">
            <div class="col text-end p-0 d-flex flex-row justify-content-start">
                <h6 class="fw-bold">Matrix Normalization</h6>
            </div>
        </div>
        <div class="row mt-3">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">Alternative</th>
                                    @foreach ($criterias as $crt)
                                        <th class="border-0">{{ $crt->code }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Item -->
                                    @forelse ($alternatives as $alt)
                                        <tr>
                                            <td>{{ $alt->name }}</td>
                                            @foreach ($alt->scores as $d)
                                                @if ($d->criteria->type == 'benefit')
                                                    @php
                                                        $max = $scores->where('criteria_id', $d->criteria->id)->max('score');

                                                        $maxW = round($d->score / $max, 2);
                                                    @endphp
                                                    <td>{{ $maxW ?? '-' }}</td>
                                                @endif
                                                @if ($d->criteria->type == 'cost')
                                                    @php
                                                        $min = $scores->where('criteria_id', $d->criteria->id)->min('score');

                                                        if ($min == 0) {
                                                            $minW = 0;
                                                        } else {
                                                            $minW = round($min / $d->score, 2);
                                                        }

                                                    @endphp
                                                    <td>{{ $minW }}</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="{{ count($criterias) }}" class="text-center">
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
        <div class="row flex-row justify-content-between mt-3">
            <div class="col text-end p-0 d-flex flex-row justify-content-start">
                <h6 class="fw-bold">Result</h6>
            </div>
        </div>
        <div class="row mt-3">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">#</th>
                                    <th class="border-0">Alternative</th>
                                    <th class="border-0">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Item -->
                                    @forelse ($alternatives as $alt)
                                        <tr>
                                            <td></td>
                                            <td>{{ $alt->name }}</td>
                                            @php
                                                $maxV = array();
                                                $minV = array();
                                            @endphp
                                            @foreach ($alt->scores as $res)
                                                @if ($res->criteria->type == 'benefit')
                                                    @php
                                                        $max = $scores->where('criteria_id', $res->criteria->id)->max('score');

                                                        $w = $res->criteria->weight / $total_weight;

                                                        $maxV[] = $w * ($res->score / $max)
                                                    @endphp
                                                @endif
                                                @if ($res->criteria->type == 'cost')
                                                    @php
                                                        $min = $scores->where('criteria_id', $res->criteria->id)->min('score');

                                                        $w = $res->criteria->weight / $total_weight;
                                                        
                                                        if($min == 0) {
                                                            $minV[] = 0;
                                                        } else {
                                                            $minV[] = $w * ($min / $res->score);
                                                        }
                                                    @endphp
                                                @endif
                                            @endforeach
                                            <td>{{ round(array_sum($maxV ?? $minV), 3) }}</td>
                                        </tr>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                order: [[2, 'desc']],
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false,
                "bAutoWidth": false,
                "columnDefs": [
                    { "bSortable": false, "aTargets": [0,1,2] } // Applies the option to all columns
                ]
            });
            $('#myTable tbody tr').each(function (idx) {
               $(this).children("td:eq(0)").html(idx + 1);
            });
        });
    </script>
@endsection
