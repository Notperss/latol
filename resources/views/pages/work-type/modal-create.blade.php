<div class="modal fade" id="modal-form-add-work-type" tabindex="-1" aria-hidden="true"
  aria-labelledby="modal-form-add-work-type-label" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
      </div>

      <div class="modal-body">
        <div class="text-center mb-6">
          <h4 class="role-title mb-2">Tambah Jenis Pekerjaan</h4>
        </div>

        <form action="{{ route('workType.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="mb-2">
            <label for="name" class="form-label">Nama Pekerjaan <code>*</code> </label>
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
