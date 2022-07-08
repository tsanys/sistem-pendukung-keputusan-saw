<div class="modal-dialog">
    <div class="modal-content">
        <form action="/alternative/{{ $alt->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{ $alt->id }}Label">Create Alternative</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $alt->name }}">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="fw-bold">Input score for each criterias.</h6>
                        <div role="separator" class="dropdown-divider my-3"></div>
                        @foreach ($app->criterias as $crt)
                            @foreach ($crt->scores as $scr)
                                @if ($scr->alternative_id == $alt->id)
                                    <div class="mb-3">
                                        <label for="criteria-{{ $crt->id }}" class="form-label">{{ $crt->name }}</label>
                                        <input type="text" class="form-control" id="criteria-{{ $crt->id }}" placeholder="{{ $crt->name }}" name="scores[][{{ $crt->id }}]" value="{{ $scr->score }}">
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
