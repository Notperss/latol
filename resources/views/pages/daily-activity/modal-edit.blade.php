<div class="modal fade" id="modal-form-edit-subLocation-{{ $subLocation->id }}" tabindex="-1" aria-hidden="true"
  aria-labelledby="modal-form-edit-subLocation-{{ $subLocation->id }}-label" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
      </div>
      <form action="{{ route('subLocation.update', $subLocation->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="text-center mb-6">
            <h4 class="role-title mb-2">Edit Lokasi Utama</h4>
          </div>
          <!-- Edit role form -->


          <div class="mb-2">
            <label for="main_location_id" class="form-label">Lokasi Utama <code>*</code> </label>
            <select type="text" class="form-control @error('main_location_id') is-invalid @enderror"
              id="main_location_id" name="main_location_id" required>
              <option value="">Choose</option>
              @foreach ($mainLocations as $mainLocation)
                <option value="{{ $mainLocation->id }}"
                  {{ $mainLocation->id == $subLocation->main_location_id ? 'selected' : '' }}>
                  {{ $mainLocation->name }}</option>
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
            <label for="sub_location" class="form-label">Sub Lokasi <code>*</code> </label>
            <input type="text" value="{{ $mainLocation->name }}"
              class="form-control @error('sub_location') is-invalid @enderror" id="sub_location" name="sub_location"
              required>
            @error('sub_location')
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
              name="description" rows="5">{{ $subLocation->description }} </textarea>
            @error('description')
              <a style="color: red">
                <small>
                  {{ $message }}
                </small>
              </a>
            @enderror
          </div>
          <!--/ Edit role form -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
