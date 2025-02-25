@extends('layouts.app')
@section('title', 'Lokasi Utama')
@section('content')

@section('breadcrumb')
  <x-breadcrumb title="Lokasi Utama" page="Lokasi" active="Lokasi Utama" route="{{ route('mainLocation.index') }}" />
@endsection

<section class="section">
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-normal mb-0 text-body card-title">Lokasi Utama</h4>
        <button type="button" class="btn btn-primary btn-md " data-toggle="modal"
          data-target="#modal-form-add-mainLocation">
          Add
        </button>
        @include('pages.location.main-location.modal-create')
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap mx-2">
        <table class="table" id="table1">
          <thead>
            <tr>
              <th>#</th>
              <th>Lokasi Utama</th>
              <th>Keterangan</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($mainLocations as $mainLocation)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mainLocation->name }}</td>
                <td>{{ $mainLocation->description }}</td>
                <td>
                  <div class="demo-inline-spacing">


                    <a data-toggle="modal" data-target="#modal-form-edit-mainLocation-{{ $mainLocation->id }}"
                      class="btn btn-sm btn-secondary text-white">
                      <i data-feather="edit"></i>
                    </a>
                    @include('pages.location.main-location.modal-edit')


                    <a onclick="showSweetAlert('{{ $mainLocation->id }}')" title="Delete"
                      class="btn btn-sm btn-danger text-white">
                      <i data-feather="trash"></i>
                    </a>
                    <form id="deleteForm_{{ $mainLocation->id }}"
                      action="{{ route('mainLocation.destroy', $mainLocation->id) }}" method="POST">
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
