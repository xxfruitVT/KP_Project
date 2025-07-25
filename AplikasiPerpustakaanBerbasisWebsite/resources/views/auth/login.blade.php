@extends('layoutseperpus.auth')
@section('content')

<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Masuk</h4>
                                <p class="mb-0">Silahkan masukkan akun pengguna Anda!</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login.submit') }}" method="POST" role="form">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" name="password" id="password">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="showPassword">
                                        <label class="form-check-label" for="showPassword">Lihat Password</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                                    </div>
                                </form>
                                <hr class="my-4 horizontal dark">
                                <div class="text-center">
                                    <a href="{{ route('login.google') }}" class="btn btn-white btn-lg w-100">
                                        <img src="https://w7.pngwing.com/pngs/249/19/png-transparent-google-logo-g-suite-google-guava-google-plus-company-text-logo.png" alt="Google" style="width: 20px; vertical-align: middle; margin-right: 8px;">
                                        Masuk dengan Google
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Belum punya akun?
                                    <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Mendaftar</a>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                            <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');

        document.getElementById('showPassword').addEventListener('change', function() {
            const type = this.checked ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            passwordConfirmationInput.setAttribute('type', type);
        });
    })
</script>

@endsection
