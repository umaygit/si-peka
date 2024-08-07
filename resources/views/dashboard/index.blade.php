<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>

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
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Jumlah Pendaftar</p>
                                <h4 class="mb-0">{{ \App\Models\Pendaftar::count() }} orang</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><a href="#" class="text-success text-sm font-weight-bolder">Lihat selengkapnya</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Jumlah Prodi TI</p>
                                <h4 class="mb-0">{{ \App\Models\Pendaftar::where('prodi', 'Teknik Informatika')->count() }} orang</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><a href="#" class="text-success text-sm font-weight-bolder">Lihat selengkapnya</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Jumlah Prodi SI</p>
                                <h4 class="mb-0">{{ \App\Models\Pendaftar::where('prodi', 'Sistem Informasi')->count() }} orang</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><a href="#" class="text-success text-sm font-weight-bolder">Lihat selengkapnya</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Jumlah Laki-laki/Perempuan</p>
                                <h4 class="mb-0">{{ \App\Models\Pendaftar::where('jk', 'L')->count() }} Lk/ {{ \App\Models\Pendaftar::where('jk', 'P')->count() }} Pr</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><a href="#" class="text-success text-sm font-weight-bolder">Lihat selengkapnya</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-md-12 mt-4 mb-4">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>


                        <div class="card-body p-4">
                            <div class="calendar">
                                <div class="calendar-event mb-4">
                                    <span class="calendar-icon">
                                        <i class="material-icons text-success text-gradient">event</i>
                                    </span>
                                    <div class="calendar-content">
                                        <h6 class="text-dark text-md font-weight-bold mb-0">Pendaftaran</h6>
                                        <p class="text-secondary font-weight-bold text-sm mt-1 mb-0">22 DEC 10:00 AM</p>
                                    </div>
                                </div>
                                <div class="calendar-event mb-4">
                                    <span class="calendar-icon">
                                        <i class="material-icons text-danger text-gradient">event</i>
                                    </span>
                                    <div class="calendar-content">
                                        <h6 class="text-dark text-md font-weight-bold mb-0">Pembekalan</h6>
                                        <p class="text-secondary font-weight-bold text-sm mt-1 mb-0">21 DEC 5:00 PM</p>
                                    </div>
                                </div>
                                <div class="calendar-event mb-4">
                                    <span class="calendar-icon">
                                        <i class="material-icons text-info text-gradient">event</i>
                                    </span>
                                    <div class="calendar-content">
                                        <h6 class="text-dark text-md font-weight-bold mb-0">Pra PEKA</h6>
                                        <p class="text-secondary font-weight-bold text-sm mt-1 mb-0">20 DEC 3:00 PM</p>
                                    </div>
                                </div>
                                <div class="calendar-event mb-4">
                                    <span class="calendar-icon">
                                        <i class="material-icons text-warning text-gradient">event</i>
                                    </span>
                                    <div class="calendar-content">
                                        <h6 class="text-dark text-md font-weight-bold mb-0">Pelaksanaan PEKA</h6>
                                        <p class="text-secondary font-weight-bold text-sm mt-1 mb-0">19 DEC 11:00 AM</p>
                                    </div>
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
    </div>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "rgba(255, 255, 255, .8)",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });
    </script>
    @endpush
</x-layout>
