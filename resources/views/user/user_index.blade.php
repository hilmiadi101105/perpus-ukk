@extends('layouts.dashboard')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Pengguna</div>

                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                + Tambah Pengguna
                            </a>
                        </div>


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Id</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>              
                            
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                                    
                                    <tr>                   
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                           @foreach ($u->roles as $role)
                                               {{ $role->name }}
                                           @endforeach
                                        </td>
                                        <td>
                                        

                                            <form action="{{ route('users.delete', $u->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                   hapus
                                                </button>

                                            {{-- <a class="btn btn-primary" href="{{ route('users.edit', $u->id) }}">
                                                <i class="fa fa-file-pen"></i></a> --}}
                                            </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection