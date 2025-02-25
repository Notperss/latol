@extends('layouts.app')
@section('title', 'Jenis Pekerjaan')
@section('content')

@section('breadcrumb')
  <x-breadcrumb title="Jenis Pekerjaan" page="Lokasi" active="Jenis Pekerjaan" route="{{ route('workType.index') }}" />
@endsection

<section class="section">
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-normal mb-0 text-body card-title">Jenis Pekerjaan</h4>
        <button type="button" class="btn btn-primary btn-md " data-toggle="modal"
          data-target="#modal-form-add-work-type">
          Add
        </button>
        @include('pages.daily-activity.work-type.modal-create')
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap mx-2">
        <table class="table" id="table1">
          <thead>
            <tr>
              <th>#</th>
              <th>Jenis Pekerjaan</th>
              <th>Keterangan</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($workTypes as $workType)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $workType->name }}</td>
                <td>{{ $workType->description }}</td>
                <td>
                  <div class="demo-inline-spacing">

                    <a data-toggle="modal" data-target="#modal-form-edit-work-type-{{ $workType->id }}"
                      class="btn btn-sm btn-secondary text-white">
                      <i data-feather="edit"></i>
                    </a>
                    @include('pages.daily-activity.work-type.modal-edit')


                    <a onclick="showSweetAlert('{{ $workType->id }}')" title="Delete"
                      class="btn btn-sm btn-danger text-white">
                      <i data-feather="trash"></i>
                    </a>
                    <form id="deleteForm_{{ $workType->id }}" action="{{ route('workType.destroy', $workType->id) }}"
                      method="POST">
                      @method('DELETE')
                      @csrf
                    </form>

                  </div>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>


@endsection

<script>
  function showSweetAlert(getId) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You won\'t be able to revert this!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // If the user clicks "Yes, delete it!", mainmit the corresponding form
        document.getElementById('deleteForm_' + getId).submit();
      }
    });
  }
</script>
