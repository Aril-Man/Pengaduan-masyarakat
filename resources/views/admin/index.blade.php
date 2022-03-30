@extends('layouts.admin.app')
@section('head')
@section('title', 'Data Petugas')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Petugas</h1>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success</div>
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-15 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data petugas</h4>
                        <a href="{{ route('admin.create_petugas') }}" class="btn btn-primary">Tambah Petugas</a>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <table class="table" id="data">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">No Telpon</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $petugas)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $petugas->nama }}</td>
                                                <td>{{ $petugas->username }}</td>
                                                <td>{{ $petugas->telp }}</td>
                                                <td>
                                                    <form action="{{ route('admin.destroy', $petugas->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Yakin Mau diHapus?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
@endsection
