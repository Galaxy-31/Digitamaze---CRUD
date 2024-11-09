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
                        <form action="{{ route('datas.store') }}" method="POST">
                            @csrf

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama">Nama Guru</label>
                                    <select name="nama" id="nama" class="form-select @error('nama') is-invalid @enderror">
                                        <option value="" selected disabled>Nama Guru</option>
                                        @foreach ($guru as $g)
                                            <option value="{{ $g->nama }}">{{ $g->nama }}  &  {{ $g->kelas }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="murid">Nama Murid</label>
                                    <select name="murid" id="murid" class="form-select @error('murid') is-invalid @enderror">
                                        <option value="" selected disabled>Nama Murid</option>
                                        @foreach ($siswa as $s)
                                            <option value="{{ $s->murid }}">{{ $s->murid }}  &  {{ $s->kelas }}</option>
                                        @endforeach
                                    </select>
                                    @error('murid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="kelas"> Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select @error('kelas') is-invalid @enderror">
                                        <option value="" selected disabled> Kelas</option>
                                        @foreach ($ruangan as $r)
                                            <option value="{{ $r->kelas }}">{{ $r->kelas }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
