<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        @if ($message = session('success'))
        <script>
            Swal.fire({
            // position: "top-end",
            icon: "success",
            title: "{{ $message }}",
            showConfirmButton: false,
            timer: 3000
        });
        </script>
        @endif
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end mb-3">
                        <form action="{{ route('pendaftar.index') }}" method="GET" class="d-flex me-auto">
                            <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama atau Prodi" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                        <a href="{{ route('pendaftar.export-excel') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a>
                    </div>



                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3"><i class="fas fa-graduation-cap"></i> Data Pendafaran Peserta Pengenalan Kampus dan Akademik (PEKA) 2024</h6>
                            </div>

                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asal Sekolah</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No HP/WA</th>
                                            <th class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                            <th class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftars as $pendaftar)
                                        <tr>
                                            <td class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $pendaftar->nama }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $pendaftar->prodi }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{ $pendaftar->sekolah }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{ $pendaftar->alamat }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">Mahasiswa Baru</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $pendaftar->no_hp }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('pendaftar.edit', $pendaftar->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="{{ route('pendaftar.show', $pendaftar->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Show user">
                                                    <i class="fas fa-eye"></i> Lihat
                                                </a>
                                            <td class="align-middle">
                                                <form action="{{ route('pendaftar.destroy', $pendaftar->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('cetak.print', $pendaftar->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Print biodata">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </td>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tr>
                                        <tr>
                                            <td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>


