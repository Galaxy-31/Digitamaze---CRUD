@extends('layouts.master')

@section('title', 'Data')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Edit Data</h3>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form id="editDataForm" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama">Nama Guru</label>
                                    <select name="nama" id="nama" class="form-select @error('nama') is-invalid @enderror">
                                        @foreach ($guru as $g)
                                            <option value="{{ $g->nama }}" @if($g->nama == $data->nama) selected @endif>{{ $g->nama }} & {{ $g->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="namaError"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="murid">Nama Murid</label>
                                    <select name="murid" id="murid" class="form-select @error('murid') is-invalid @enderror">
                                        @foreach ($siswa as $s)
                                            <option value="{{ $s->murid }}" @if($s->murid == $data->murid) selected @endif>{{ $s->murid }} & {{ $s->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="muridError"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="kelas">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select @error('kelas') is-invalid @enderror">
                                        @foreach ($ruangan as $r)
                                            <option value="{{ $r->kelas }}" @if($r->kelas == $data->kelas) selected @endif>{{ $r->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="kelasError"></span>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" id="submitEditBtn" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Edit</button>
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
            $('#submitEditBtn').click(function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('#namaError').text('');
                $('#muridError').text('');
                $('#kelasError').text('');

                // Collect form data
                let formData = {
                    _token: $('input[name="_token"]').val(),
                    _method: 'PUT',
                    nama: $('#nama').val(),
                    murid: $('#murid').val(),
                    kelas: $('#kelas').val(),
                };

                // AJAX PUT request
                $.ajax({
                    url: "{{ route('datas.update', $data->id) }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        Swal.fire('Success', 'Data Berhasil Diperbarui!', 'success');
                        // Optionally reset the form or perform any other actions
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.nama) {
                                $('#namaError').text(errors.nama[0]);
                            }
                            if (errors.murid) {
                                $('#muridError').text(errors.murid[0]);
                            }
                            if (errors.kelas) {
                                $('#kelasError').text(errors.kelas[0]);
                            }
                            Swal.fire('Error', 'Ups, Ada Sesuatu yang Salah!', 'error');
                        } else {
                            Swal.fire('Error', 'Terjadi Kesalahan. Coba lagi!', 'error');
                        }
                    }
                });
            });
        });
    </script>
@endsection
