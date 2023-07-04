@extends('layouts.main')

@section('content')
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar static-top mb-4 bg-white shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            </form>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-lg-inline small mr-2 text-gray-600">{{ Auth::user()->name }}</span>
                        <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right animated--grow-in shadow" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Pasien</h1>
            <p class="mb-4">Daftar pasien anda</p>
            <!-- DataTales Example -->
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary m-0">Data Pasien Anda
                        <span>
                            <a href="{{ route('dokter.create') }}" class="btn btn-primary font-weight-bold ml-4">
                                + Tambah Pasien
                            </a>
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>Alamat Pasien</th>
                                    <th>Tanggal Berobat</th>
                                    <th>Keluhan</th>
                                    <th>Nama Dokter</th>
                                    <th>Obat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $pasien->nama_pasien }}</td>
                                        <td>{{ $pasien->pasien ? $pasien->pasien->alamat_pasien : '' }}</td>
                                        <td>{{ $pasien->pasien ? $pasien->pasien->tgl_datang : '' }}</td>
                                        <td>{{ $pasien->pasien ? $pasien->pasien->keluhan_pasien : '' }}</td>
                                        <td>{{ $pasien->nama_dokter }}</td>
                                        <td>{{ $pasien->pasien ? $pasien->pasien->nama_obat : '' }}</td>
                                        <td>
                                            <span>
                                                <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning">
                                                    Edit
                                                </a>
                                            </span>
                                            <span>
                                                <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-success">
                                                    Info
                                                </a>
                                            </span>
                                            <form action="{{ route('pasien.destroy', $pasien->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <span><button onclick="return confirm('Are you sure?')"
                                                        class="btn btn-danger d-block" type="submit">Hapus</button></span>
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
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
