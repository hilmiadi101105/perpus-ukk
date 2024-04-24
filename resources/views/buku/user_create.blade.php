@extends('layouts.dashboard')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body bg-white">
                        <h1 class="h3 font-weight-bold mb-4">Tambah Pengguna Baru</h1>
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                               <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                               <input type="password" class="form-control" id="password" name="password" multiple required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                               <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="roles">Role:</label>
                               <select class="form-control" id="roles" name="roles[]" multiple required>
                            
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name}}">{{ $role->name }}</option>
                                    @endforeach
                               </select>
                            </div>

                          
                           
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection