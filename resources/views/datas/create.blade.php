@extends('layouts.master')

@section('title', 'Data')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Create Data</h3>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form id="dataForm" method="POST">
                            @csrf

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama">Nama Guru</label>
                                    <select name="nama" id="nama" class="form-select @error('nama') is-invalid @enderror">
                                        <option value="" selected disabled>Nama Guru</option>
                                        @foreach ($guru as $g)
                                            <option value="{{ $g->nama }}">{{ $g->nama }} & {{ $g->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="namaError"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="murid">Nama Murid</label>
                                    <select name="murid" id="murid" class="form-select @error('murid') is-invalid @enderror">
                                        <option value="" selected disabled>Nama Murid</option>
                                        @foreach ($siswa as $s)
                                            <option value="{{ $s->murid }}">{{ $s->murid }} & {{ $s->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="muridError"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="kelas">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select @error('kelas') is-invalid @enderror">
                                        <option value="" selected disabled>Kelas</option>
                                        @foreach ($ruangan as $r)
                                            <option value="{{ $r->kelas }}">{{ $r->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="kelasError"></span>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" id="submitBtn" class="btn btn-lg btn-primary w-100 mt-4 mb-0">Create</button>
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
            $('#submitBtn').click(function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('#namaError').text('');
                $('#muridError').text('');
                $('#kelasError').text('');

                // Collect form data
                let formData = {
                    _token: $('input[name="_token"]').val(),
                    nama: $('#nama').val(),
                    murid: $('#murid').val(),
                    kelas: $('#kelas').val(),
                };

                // AJAX POST request
                $.ajax({
                    url: "{{ route('datas.store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        Swal.fire('Success', 'Data Berhasil Dibuat!', 'success');
                        $('#dataForm')[0].reset(); // Reset the form after successful submission
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
