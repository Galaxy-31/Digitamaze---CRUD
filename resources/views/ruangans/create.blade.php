@extends('layouts.master')

@section('title', 'Kelas')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Create Kelas</h3>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form action="{{ route('ruangans.store') }}" method="POST">
                            @csrf

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="kelas">Nama Kelas</label>
                                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" placeholder="Nama Kelas">
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
