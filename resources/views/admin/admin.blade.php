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
                                    <button class="btn btn-sm btn-primary btn-edit" data-id="{{ $i->id }}"><i class="fas fa-eye"></i>&nbsp;&nbsp;Edit</button>
                                    <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $i->id }}" data-name="{{ $i->name }}"><i class="fas fa-trash"></i>&nbsp;&nbsp;Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $(document).on("click", '.btn-edit', function() {
                $('#modal-loading').modal("show");
                let id = $(this).data("id");
                $.ajax({
                    url: "{{ route('admin.data') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $("#name").val(data.name);
                        $("#email").val(data.email);
                        $("#email_old").val(data.email);
                        $("#phone").val(data.phone);
                        $("#address").val(data.address);
                        $("#id").val(data.id);
                        $('#modal-loading').modal("hide");
                        $('#modal-edit').modal("show");
                    },
                });
            });
            $(document).on("click", '.btn-delete', function() {
                let id = $(this).data("id");
                let name = $(this).data("name");
                $("#data-delete").text("Apakah anda yakin akan menghapus "+name+"?");
                $("#id-delete").val(id);
                $('#modal-delete').modal("show");
            });
        });
    </script>
@endsection
@section('modal')
    <div class="modal modal-blur fade show" id="modal-tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <div>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <div>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telepon</label>
                            <div>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Telepon" value="{{ old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <div>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat" rows="2">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <div>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade show" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update') }}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <div>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <div>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telepon</label>
                            <div>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Telepon" value="{{ old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <div>
                                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat" rows="2">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <div>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="email_old" id="email_old">
                    <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade show" id="modal-delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.delete') }}" method="POST">
                        @method("DELETE")
                        @csrf
                    <p id="data-delete"></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id-delete">
                    <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection