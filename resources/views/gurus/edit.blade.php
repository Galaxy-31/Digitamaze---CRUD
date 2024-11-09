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
                        <form action="{{ route('gurus.update', $guru->id) }}" method="POST">
                            @csrf
                            @method('PUT')                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                        placeholder="Nama Guru" value="{{ $guru->nama }}">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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