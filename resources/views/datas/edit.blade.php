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
                        <form action="{{ route('datas.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')                            
                           
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama">Nama Guru</label>
                                    <select name="nama" id="nama" class="form-select @error('nama') is-invalid @enderror">
                                        @foreach ($guru as $g)
                                            <option value="{{ $g->nama }}" @if($g->nama == $data->nama) selected @endif>{{ $g->nama }}  &  {{ $g->kelas }} </option>
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
                                        @foreach ($siswa as $s)
                                            <option value="{{ $s->murid }}" @if($s->murid == $data->murid) selected @endif>{{ $s->murid }}  &  {{ $s->kelas }} </option>
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
                                    <label class="h6 text-capitalize" for="kelas">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select @error('kelas') is-invalid @enderror">
                                        @foreach ($ruangan as $r)
                                            <option value="{{ $r->kelas }}" @if($r->kelas == $data->kelas) selected @endif>{{ $r->kelas }}</option>
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
                                    class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection