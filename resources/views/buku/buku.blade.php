@extends('layouts.dashboard')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Buku</div>

                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{ route('buku.create') }}" class="btn btn-primary">
                                + Tambah Data Buku
                            </a>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Foto</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>              
                                    <th class="col-2 px-4 py-2">Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($buku as $b)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/'.$b->foto) }}" alt="Foto Buku" width="100">
                                        
                                        <td>{{ $b->judul }}</td>
                                        <td>{{ $b->penulis }}</td>
                                        <td>{{ $b->penerbit }}</td>
                                        <td>{{ $b->tahun_terbit }}</td>
                                        <td>
                                            <form action="{{ route('buku.delete', $b->id) }}" method="delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"> hapus                                  
                                                </button>

                                                <a class="btn btn-primary" href="{{ route('buku.edit', $b->id) }}">
                                                    edit
                                    </form>
                                        </td>
                                    </tr>
                                    
                                        
                                        
                                    
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data buku.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection