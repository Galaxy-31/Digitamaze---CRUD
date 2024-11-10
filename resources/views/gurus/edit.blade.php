@extends('layouts.master')

@section('title', 'Guru')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Edit Guru</h3>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form id="editGuruForm" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                        placeholder="Nama Guru" value="{{ $guru->nama }}">
                                    <span class="text-danger" id="namaError"></span>
                                </div>
                            </div>
                            
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="kelas">Nama Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select @error('kelas') is-invalid @enderror">
                                        @foreach ($ruangan as $r)
                                            <option value="{{ $r->kelas }}" @if($r->kelas == $guru->kelas) selected @endif>{{ $r->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="kelasError"></span>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" id="submitEditGuruBtn" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and SweetAlert if not already included -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#submitEditGuruBtn').click(function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('#namaError').text('');
                $('#kelasError').text('');

                // Collect form data
                let formData = {
                    _token: $('input[name="_token"]').val(),
                    _method: 'PUT',
                    nama: $('#nama').val(),
                    kelas: $('#kelas').val(),
                };

                // AJAX PUT request
                $.ajax({
                    url: "{{ route('gurus.update', $guru->id) }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        Swal.fire('Success', 'Data Guru Berhasil Diperbarui!', 'success');
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.nama) {
                                $('#namaError').text(errors.nama[0]);
                            }
                            if (errors.kelas) {
                                $('#kelasError').text(errors.kelas[0]);
                            }
                            Swal.fire('Error', 'Ups, Ada Kesalahan dalam Input!', 'error');
                        } else {
                            Swal.fire('Error', 'Terjadi Kesalahan. Coba lagi!', 'error');
                        }
                    }
                });
            });
        });
    </script>
@endsection
