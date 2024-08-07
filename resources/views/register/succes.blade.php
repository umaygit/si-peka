<x-layout bodyClass="">

    <div>
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div
                                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                    style="background-image: url('../assets/img/illustrations/peka2022.jpg'); background-size: cover;">
                                </div>
                            </div>
                            <div
                                class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                                <div class="card card-plain">
                                    <div class="card-header"></div>
                                        <h2>Selamat,! </h2>
                                        <h4 class="font-weight-bolder">Anda Telah Berhasil Mendaftar sebagai Peserta PEKA 2024,</h4>
                                        <p class="mb-0">Silakan scan barcode di bawah ini untuk masuk ke grup.</p>
                                    </div>
                                    <div class="card-body text-center">
                                        <img src="{{ asset('assets/img/frame.png') }}" alt="Scan Barcode" class="img-fluid" style="max-width: 50%;">
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-2 text-sm mx-auto">
                                            Kembali ke halaman <a href="{{ route('register.create') }}" class="text-primary text-gradient font-weight-bold">Pendaftaran</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    @push('js')
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script>
        $(function() {

        var text_val = $(".input-group input").val();
        if (text_val === "") {
          $(".input-group").removeClass('is-filled');
        } else {
          $(".input-group").addClass('is-filled');
        }
    });
    </script>
    @endpush

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if ($message = session('success'))
    <script>
        Swal.fire({
        // position: "top-end",
        icon: "success",
        title: "{{ $message }}",
        showConfirmButton: false,
        timer: 5000
    });
    </script>
    @endif
</x-layout>
