@extends('layouts.app')
@section('title', 'Perusahaan')
@section('content')

@section('breadcrumb')
  <x-breadcrumb title="Perusahaan" page="Unit Kerja" active="Perusahaan" route="{{ route('company.index') }}" />
@endsection

<!-- Content -->
<section class="section">
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center ">
        <h4 class="fw-normal mb-0 text-body">Company</h4>
        @can('company.index')
          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-form-add-company">
            <i class="bi bi-plus-lg"></i>
            Add
          </button>
        @endcan

      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap mx-2">
        <table class="table" id="table1">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Deskripsi</th>
              <th>Logo</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($companies as $company)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->description }}</td>
                <td class="text-center">
                  @if ($company->logo)
                    <img src="{{ asset('storage/' . ($company->logo ?? '')) }}" alt="Logo" width="60px">
                  @else
                    no image
                  @endif
                </td>
                <td>
                  <div class="demo-inline-spacing">
                    @can('company.index')
                      <a data-toggle="modal" data-target="#modal-form-edit-company-{{ $company->id }}"
                        class="btn btn-sm btn-secondary text-white">
                        <i data-feather="edit"></i>
                      </a>
                      @include('pages.work-unit.company.modal-edit')
                    @endcan

                    @can('company.index')
                      <a onclick="showSweetAlert('{{ $company->id }}')" title="Delete"
                        class="btn btn-sm btn-danger text-white">
                        <i data-feather="trash"></i>
                      </a>
                      <form id="deleteForm_{{ $company->id }}" action="{{ route('company.destroy', $company->id) }}"
                        method="POST">
                        @method('DELETE')
                        @csrf
                      </form>
                    @endcan
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
<!-- / Content -->

<!--/ Basic Bootstrap Table -->
@include('pages.work-unit.company.modal-create')

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
        // If the company clicks "Yes, delete it!", submit the corresponding form
        document.getElementById('deleteForm_' + getId).submit();
      }
    });
  }
</script>
@endsection
