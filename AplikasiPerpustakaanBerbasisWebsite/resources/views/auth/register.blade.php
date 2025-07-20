@extends('layouts.auth')
@section('content')

<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Mendaftar</h4>
                                <p class="mb-0">Bergabunglah menjadi bagian dari Kami!</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('register.submit') }}" method="POST" role="form" id="registrationForm">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Nama Lengkap" aria-label="Nama Lengkap" name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
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
                                        <div id="passwordHelp" class="form-text text-muted" style="margin-top: 5px;"></div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password" aria-label="Konfirmasi Password" name="password_confirmation" id="password_confirmation">
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div id="passwordConfirmationHelp" class="form-text text-muted" style="margin-top: 5px;"></div>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="showPassword">
                                        <label class="form-check-label" for="showPassword">Lihat Password</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" id="registerButton" disabled>Mendaftar</button>
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
                                    Sudah punya akun?
                                    <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Masuk</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=2128&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Buku adalah jendela dunia"</h4>
                            <p class="text-white position-relative">Melalui setiap halaman buku, pengetahuan dan inspirasi menunggu untuk ditemukan. Ayo, manfaatkan waktu Anda dan baca literasi di perpustakaan kami!</p>
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
        const passwordConfirmationInput = document.getElementById('password_confirmation');
        const passwordHelp = document.getElementById('passwordHelp');
        const registerButton = document.getElementById('registerButton');

        document.getElementById('showPassword').addEventListener('change', function() {
            const type = this.checked ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            passwordConfirmationInput.setAttribute('type', type);
        });

        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const hasUpperCase = /[A-Z]/.test(password);
            const hasLowerCase = /[a-z]/.test(password);
            const hasNumbers = /[0-9]/.test(password);
            const validLength = password.length >= 8;

            passwordHelp.innerHTML = `
                <ul>
                    <li style="color: ${hasUpperCase ? 'green' : 'red'};">
                        ${hasUpperCase ? '✔ ' : '✖ '} Minimal 1 huruf besar
                    </li>
                    <li style="color: ${hasLowerCase ? 'green' : 'red'};">
                        ${hasLowerCase ? '✔ ' : '✖ '} Minimal 1 huruf kecil
                    </li>
                    <li style="color: ${hasNumbers ? 'green' : 'red'};">
                        ${hasNumbers ? '✔ ' : '✖ '} Minimal 1 angka
                    </li>
                    <li style="color: ${validLength ? 'green' : 'red'};">
                        ${validLength ? '✔ ' : '✖ '} Minimal 8 karakter
                    </li>
                </ul>
            `;

            validateButton();
            // passwordConfirmationInput.value = password;
        });

        passwordConfirmationInput.addEventListener('input', validateButton);

        function validateButton() {
            const isPasswordValid = (
                /[A-Z]/.test(passwordInput.value) &&
                /[a-z]/.test(passwordInput.value) &&
                /[0-9]/.test(passwordInput.value) &&
                passwordInput.value.length >= 8
            );

            registerButton.disabled = !(isPasswordValid && passwordConfirmationInput.value === passwordInput.value);

            clearMessages();

            if (passwordConfirmationInput.value === passwordInput.value && passwordConfirmationInput.value !== '') {
                passwordConfirmationInput.style.borderColor = 'green';
                passwordHelp.innerHTML += `
                    <div style="color: green;" id="matchMessage">✔ Password cocok!</div>
                `;
            } else {
                passwordConfirmationInput.style.borderColor = 'red';
                if (passwordConfirmationInput.value !== '') {
                    passwordHelp.innerHTML += `
                        <div style="color: red;" id="mismatchMessage">✖ Password tidak cocok!</div>
                    `;
                }
            }
        }

        function clearMessages() {
            const mismatchMessage = document.getElementById('mismatchMessage');
            const matchMessage = document.getElementById('matchMessage');
            if (mismatchMessage) {
                mismatchMessage.remove();
            }
            if (matchMessage) {
                matchMessage.remove();
            }
        }
    });
</script>
@endsection
