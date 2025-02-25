<div class="modal fade" id="modal-form-edit-mainLocation-{{ $mainLocation->id }}" tabindex="-1" aria-hidden="true"
  aria-labelledby="modal-form-edit-mainLocation-{{ $mainLocation->id }}-label" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
      </div>
      <form action="{{ route('mainLocation.update', $mainLocation->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="text-center mb-6">
            <h4 class="role-title mb-2">Edit Lokasi Utama</h4>
          </div>
          <!-- Edit role form -->


          <div class="mb-2">
            <label for="name" class="form-label">Lokasi Utama <code>*</code> </label>
            <input type="text" value="{{ $mainLocation->name }}"
              class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
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
              name="description" rows="5">{{ $mainLocation->description }}</textarea>
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
