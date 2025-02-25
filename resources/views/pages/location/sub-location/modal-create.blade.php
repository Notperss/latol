<div class="modal fade" id="modal-form-add-subLocation" tabindex="-1" aria-hidden="true"
  aria-labelledby="modal-form-add-subLocation-label" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
      </div>

      <div class="modal-body">
        <div class="text-center mb-6">
          <h4 class="role-title mb-2">Tambah Sub Lokasi</h4>
        </div>

        <form action="{{ route('subLocation.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="mb-2">
            <label for="main_location_id" class="form-label">Lokasi Utama <code>*</code> </label>
            <select type="text" class="form-control @error('main_location_id') is-invalid @enderror"
              id="main_location_id" name="main_location_id" required>
              <option value="">Choose</option>
              @foreach ($mainLocations as $mainLocation)
                <option value="{{ $mainLocation->id }}">{{ $mainLocation->name }}</option>
              @endforeach
            </select>
            @error('main_location_id')
              <a style="color: red">
                <small>
                  {{ $message }}
                </small>
              </a>
            @enderror
          </div>

          <div class="mb-2">
            <label for="name" class="form-label">Sub Lokasi <code>*</code> </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
              required>
            @error('name')
              <a style="color: red">
                <small>
                  {{ $message }}
                </small>
              </a>
            @enderror
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Keterangan</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
              name="description" rows="5"> </textarea>
            @error('description')
              <a style="color: red">
                <small>
                  {{ $message }}
                </small>
              </a>
            @enderror
          </div>


          {{-- <div class="mb-3">
          <div class="form-check form-switch form-switch-right form-switch-md">
            <label for="status" class="form-label">Status</label>
            <input class="form-check-input code-switcher" type="checkbox" id="tables-small-showcode" name="status"
              value="1">
          </div>
        </div> --}}

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
