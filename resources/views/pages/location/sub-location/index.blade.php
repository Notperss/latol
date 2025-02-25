@extends('layouts.app')
@section('title', 'Sub Lokasi')
@section('content')
@section('breadcrumb')
  <x-breadcrumb title="Sub Lokasi" page="Lokasi" active="Sub Lokasi" route="{{ route('subLocation.index') }}" />
@endsection


<section class="section">
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-normal mb-0 text-body card-title">Sub Lokasi</h4>
        <button type="button" class="btn btn-primary btn-md " data-toggle="modal"
          data-target="#modal-form-add-subLocation">
          Add
        </button>
        @include('pages.location.sub-location.modal-create')
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap mx-2">
        <table class="table" id="table1">
          <thead>
            <tr>
              <th>#</th>
              <th>Lokasi Utama</th>
              <th>Sub Lokasi</th>
              <th>Keterangan</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($subLocations as $subLocation)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subLocation->mainLocation->name }}</td>
                <td>{{ $subLocation->name }}</td>
                <td>{{ $subLocation->description }}</td>
                <td>
                  <div class="demo-inline-spacing">


                    <a data-toggle="modal" data-target="#modal-form-edit-subLocation-{{ $subLocation->id }}"
                      class="btn btn-sm btn-secondary text-white">
                      <i data-feather="edit"></i>
                    </a>
                    @include('pages.location.sub-location.modal-edit')


                    <a onclick="showSweetAlert('{{ $subLocation->id }}')" title="Delete"
                      class="btn btn-sm btn-danger text-white">
                      <i data-feather="trash"></i>
                    </a>
                    <form id="deleteForm_{{ $subLocation->id }}"
                      action="{{ route('subLocation.destroy', $subLocation->id) }}" method="POST">
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
        // If the user clicks "Yes, delete it!", submit the corresponding form
        document.getElementById('deleteForm_' + getId).submit();
      }
    });
  }
</script>
