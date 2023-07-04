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
            {{-- Topbar Navbar --}}
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
            <h1 class="h3 mb-2 text-gray-800">Tambah Pasien</h1>
            <p class="mb-4">Isi formulir pendaftaran berikut untuk menambahkan pasien baru</p>
            <!-- DataTales Example -->
            <div class="card mb-4 shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex align-items-center justify-content-between flex-row py-3">
                    <h6 class="font-weight-bold text-primary m-0">Formulir Pasien Baru</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pasien.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pasien_id">Nama Pasien</label>
                            <select class="form-control" id="pasien_id" name="nama_pasien">
                                @if ($perjanjians->count())
                                    @foreach ($perjanjians as $perjanjian)
                                        <option value="{{ $perjanjian->nama_pasien }}">{{ $perjanjian->nama_pasien }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="">Anda tidak ada janji dengan pasien</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pasien_id">Pasien Id</label>
                            <select class="form-control" id="pasien_id" name="pasien_id">
                                @foreach ($perjanjians as $perjanjian)
                                    <option value="{{ $perjanjian->id }}">{{ $perjanjian->pasien_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dokter_id">Nama Dokter</label>
                            <select class="form-control" id="dokter_id" name="dokter_id">
                                @foreach ($dokters as $dokter)
                                    <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>
                                @endforeach
                            </select>
                            {{-- @endforeach --}}
                        </div>
                        <div class="form-group">
                            <label for="alamat_pasien">Alamat Pasien</label>
                            <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien"
                                placeholder="Alamat Pasien" value="{{ old('alamat_pasien') }}">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="tel" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                                name="no_telp" placeholder="Nomor Telpon Pasien" value="{{ old('no_telp') }}">
                            @error('no_telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keluhan_pasien">Keluhan</label>
                            <textarea class="form-control @error('keluhan_pasien') is-invalid @enderror" id="exampleFormControlTextarea1"
                                rows="3" name="keluhan_pasien">{{ old('keluhan_pasien') }}</textarea>
                            @error('keluhan_pasien')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_obat">Obat</label>
                            <select class="form-control" id="nama_obat" name="nama_obat">
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->nama_obat }}">{{ $obat->nama_obat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Tambah</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
