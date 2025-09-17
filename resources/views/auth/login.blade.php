@extends('layouts.auth')

@section('main-content')
<div class="container d-flex align-items-center" style="min-height: 100vh;">
    <div class="row justify-content-center w-100">
        <div class="col-lg-5 col-md-7">
            <div class="bg-white rounded shadow-sm p-4">
                <!-- Error Message Container - Fixed Height -->
                <div class="error-container" style="min-height: 40px; margin-bottom: 0.5rem;">
                    @if ($errors->any())
                        <div class="alert alert-danger py-1 px-2 mb-2" role="alert" style="font-size: 0.75rem; line-height: 1.2;">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li style="font-size: 0.75rem;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                
                <!-- Login Form -->
                <div class="text-center mb-5">
                    <img src="{{ asset('img/logo-kpf.png') }}" alt="Logo KPF" class="img-fluid" style="max-height: 50px;">
                    <h1 class="h5 fw-bold mt-2 mb-1" style="color: #199447;">KONTAKPERKASA FUTURES</h1>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-2">
                        <label for="email" class="form-label fw-500 small mb-1">Email</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" 
                                   value="{{ old('email') }}" required autofocus
                                   placeholder="Masukkan email Anda">
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="password" class="form-label fw-500 small mb-1">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none small">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" class="form-control form-control-sm" id="password" name="password" required
                                   placeholder="Masukkan password Anda">
                            <button class="btn btn-outline-secondary toggle-password" type="button" style="font-size: 0.8rem;">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="transform: scale(0.9);">
                        <label class="form-check-label small text-muted" for="remember">
                            Ingat saya
                        </label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn-login btn-sm py-2 mt-1">
                            <i class="fas fa-sign-in-alt me-2"></i>Masuk
                        </button>
                        
                        {{-- <p class="text-center mt-2 small mb-0">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-medium">
                                Daftar di sini
                            </a>
                        </p> --}}
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="text-muted small" style="font-size: 0.8rem;">
                        &copy; {{ date('Y') }} KontakPerkasa Futures. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const passwordInput = this.previousElementSibling;
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });
</script>
@endpush

<style>
    /* Additional styles specific to login page */
    .toggle-password {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        background-color: #f8f9fa;
        border: 1px solid #e2e8f0;
        border-left: none;
    }
    
    .toggle-password:hover {
        background-color: #e9ecef;
    }
    
    .input-group-text {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-right: none;
    }
    
    .form-control:focus {
        box-shadow: none;
        border-color: #dee2e6;
    }
    
    .form-control:focus + .input-group-text {
        border-color: #dee2e6;
    }
</style>
@endsection