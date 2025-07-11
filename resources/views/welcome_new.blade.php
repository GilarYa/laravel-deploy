@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="text-center">
    <div class="jumbotron bg-primary text-white p-5 rounded mb-4">
        <h1 class="display-4"><i class="fas fa-store"></i> Laravel Shop</h1>
        <p class="lead">Selamat datang di aplikasi toko online sederhana dengan sistem role admin dan user.</p>
        <hr class="my-4">
        <p>Silakan login atau register untuk mulai berbelanja.</p>
        <div class="mt-4">
            <a class="btn btn-light btn-lg me-3" href="{{ route('login') }}" role="button">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a class="btn btn-outline-light btn-lg" href="{{ route('register') }}" role="button">
                <i class="fas fa-user-plus"></i> Register
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h5>Role Management</h5>
                    <p class="text-muted">Sistem dengan role Admin dan User yang berbeda fitur.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-bag fa-3x text-success mb-3"></i>
                    <h5>Product Catalog</h5>
                    <p class="text-muted">User dapat melihat dan browse produk yang tersedia.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-cog fa-3x text-warning mb-3"></i>
                    <h5>Admin Panel</h5>
                    <p class="text-muted">Admin dapat mengelola user, produk, dan mengubah password.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Demo Accounts</h4>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title text-danger">Admin Account</h6>
                        <p class="card-text">
                            <strong>Email:</strong> admin@example.com<br>
                            <strong>Password:</strong> password
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title text-primary">User Account</h6>
                        <p class="card-text">
                            <strong>Email:</strong> user@example.com<br>
                            <strong>Password:</strong> password
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
