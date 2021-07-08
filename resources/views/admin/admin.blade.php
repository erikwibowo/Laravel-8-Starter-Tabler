@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah">
                <i class="fas fa-plus"></i> Tambah
            </button>
        </div>
        <div class="card-body table-responsive">
            <table class="table datatable table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Login</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->email }}</td>
                            <td>{{ $i->phone }}</td>
                            <td>{{ $i->address }}</td>
                            <td>
                                @if ($i->status)
                                    <span class="badge bg-cyan-lt">Aktif</span>
                                @else
                                    <span class="badge bg-red-lt">Non Aktif</span>
                                @endif
                            </td>
                            <td>{{ $i->login_at }}</td>
                            <td>{{ $i->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>&nbsp;&nbsp;Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal modal-blur fade show" id="modal-tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi beatae delectus deleniti dolorem eveniet facere fuga iste nemo nesciunt nihil odio perspiciatis, quia quis reprehenderit sit tempora totam unde.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
            </div>
        </div>
    </div>
@endsection