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
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            <h1 class="h3 mb-3 text-gray-800">Laporan</h1>

            <!-- DataTales Example -->
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h5 class="font-weight-bold text-primary">Daftar Laporan
                        <span>
                            <a href="#" class="btn btn-primary font-weight-bold ml-4">
                                Cetak Laporan
                            </a>
                        </span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Alamat Pasien</th>
                                    <th scope="col">Tgl. Datang</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Nomor HP</th>
                                    <th scope="col">Keluhan Pasien</th>
                                    <th scope="col">Dokter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $pasien->id }}</td>
                                        <td>{{ $pasien->nama_pasien }}</td>
                                        <td>{{ $pasien->pasien ? $pasien->pasien->alamat_pasien : '' }}</td>
                                        <td>{{ $pasien->pasien ? $pasien->pasien->tgl_datang : '' }}</td>
                                        <td>{{ $pasien->pasien ? $pasien->pasien->nama_obat : '' }}</td>
                                        <td>{{ $pasien->pasien ? $pasien->pasien->no_telp : '' }}</td>
                                        <td>{{ $pasien->pasien ? $pasien->pasien->keluhan_pasien : '' }}</td>
                                        <td>{{ $pasien->dokter_id }}</td>
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
