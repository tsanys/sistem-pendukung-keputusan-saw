<div class="modal-dialog">
    <div class="modal-content">
        <form action="/criteria/{{ $crt->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{ $crt->id }}Label">Edit Criteria {{ $crt->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" class="form-control" id="code" placeholder="Code" name="code" value="{{ $crt->code }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $crt->name }}">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" aria-label="Type" id="type" name="type">
                        <option value="cost" @if ($crt->type == 'cost') selected @endif>Cost</option>
                        <option value="benefit" @if ($crt->type == 'benefit') selected @endif>Benefit</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">Weight</label>
                    <input type="text" class="form-control" id="weight" placeholder="Weight (%)" name="weight" value="{{ $crt->weight }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
