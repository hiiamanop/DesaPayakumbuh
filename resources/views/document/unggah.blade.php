@extends('Layout/main')
@section('isi')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            @if (Session('role') == 1)
                <li class="nav-item">
                    <a class="nav-link " href="/dashboard">
                        <i class="bi bi-grid"></i>
                        <span>Beranda</span>
                    </a>
                </li><!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed"  href="/statistik">
                        <i class="bi bi-bar-chart"></i><span>Statistik Kependudukan</span>
                    </a>
                </li><!-- End Charts Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Dokumen</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/arsip">
                                <i class="bi bi-circle"></i><span>Arsip Dokumen</span>
                            </a>
                        </li>
                        <li>
                            <a href="/unggah">
                                <i class="bi bi-circle"></i><span>Unggah Dokumen</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Components Nav -->
            @elseif (Session('role') == 2)
                <li class="nav-item">
                    <a class="nav-link " href="/dashboard">
                        <i class="bi bi-grid"></i>
                        <span>Beranda</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="/absensi">
                        <i class="bi bi-card-list"></i>
                        <span>Daftar Absensi</span>
                    </a>
                </li><!-- End Register Page Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/statistik">
                        <i class="bi bi-bar-chart"></i><span>Statistik Kependudukan</span>
                    </a>
                </li><!-- End Charts Nav -->

            @elseif (Session('role') == 0)
                <li class="nav-item">
                    <a class="nav-link " href="/dashboard">
                        <i class="bi bi-grid"></i>
                        <span>Beranda</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="/absensi">
                        <i class="bi bi-card-list"></i>
                        <span>Daftar Absensi</span>
                    </a>
                </li><!-- End Register Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed"  href="/statistik">
                        <i class="bi bi-bar-chart"></i><span>Statistik Kependudukan</span>
                    </a>
                </li><!-- End Charts Nav -->


                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Dokumen</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/arsip">
                                <i class="bi bi-circle"></i><span>Arsip Dokumen</span>
                            </a>
                        </li>
                        <li>
                            <a href="/unggah">
                                <i class="bi bi-circle"></i><span>Unggah Dokumen</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Components Nav -->
            @endif
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Beranda</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                    <li class="breadcrumb-item active">Dasbor</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="User Greetings">
                    <p>Selamat datang, <span id="nama user"><strong>{{ Session('nama') }}</strong></span>
                        Anda masuk sebagai <span
                            style="display: inline-block; padding: 5px 10px;
                        background-color: blue; color: #fff; font-weight: bold; border-radius: 4px;"
                            class="badge">{{ Session('jabatan') }}</span>
                    </p>
                </div>

                <!-- Left side columns -->
                <div>
                    <div class="row">




                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Unggah Dokumen</h5>
                                        @if (Session::has('file_path'))
                                            <div class="preview-file">
                                                <p>File yang baru dimasukkan:</p>
                                                <iframe src="{{ Session::get('file_path') }}" width="100%"
                                                    height="500"></iframe>
                                            </div>
                                        @endif
                                        <form method="POST" action="/unggahproses" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Lampiran</label>
                                                <div class="col-sm-10">
                                                    <input type="file" value="" name="nama_dokumen"
                                                        class="form-control" id="nama_dokumen" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Tujuan</label>
                                                <div class="col-sm-10">
                                                    <select name="tujuan" id="tujuan" class="form-control">
                                                        <option disabled selected value>Tujuan</option>
                                                        <option value="0">Staff</option>
                                                        <option value="1">Kepala Desa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="" name="keterangan"
                                                        class="form-control" id="keterangan"
                                                        placeholder="Masukkan Teks...." required>
                                                    <div class="col mt-3">
                                                        <input class="form-check-input" type="checkbox" name="status"
                                                            id="status" value="1">
                                                        <label class="form-check-label" for="status">Arsipkan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Unggah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Recent Sales -->


                    </div>
                </div>



            </div>
        </section>

    </main><!-- End #main -->
@endsection
