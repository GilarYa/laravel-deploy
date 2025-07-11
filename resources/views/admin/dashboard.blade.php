@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h1>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $totalUsers }}</h4>
                        <p class="mb-0">Total Users</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.users') }}" class="text-white text-decoration-none">
                    <small>Kelola Users <i class="fas fa-arrow-right"></i></small>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $totalProducts }}</h4>
                        <p class="mb-0">Total Products</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.products') }}" class="text-white text-decoration-none">
                    <small>Kelola Products <i class="fas fa-arrow-right"></i></small>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $activeProducts }}</h4>
                        <p class="mb-0">Active Products</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.products.create') }}" class="text-white text-decoration-none">
                    <small>Tambah Product <i class="fas fa-plus"></i></small>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-users"></i> Quick Actions - Users</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.users') }}" class="btn btn-primary btn-block mb-2">
                    <i class="fas fa-users"></i> Kelola Semua Users
                </a>
                <p class="text-muted">Lihat, edit, dan hapus user. Ubah password user jika diperlukan.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-box"></i> Quick Actions - Products</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.products.create') }}" class="btn btn-success btn-block mb-2">
                    <i class="fas fa-plus"></i> Tambah Product Baru
                </a>
                <a href="{{ route('admin.products') }}" class="btn btn-outline-primary btn-block">
                    <i class="fas fa-list"></i> Kelola Semua Products
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-info-circle"></i> Informasi Sistem</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
                        <p><strong>PHP Version:</strong> {{ PHP_VERSION }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Environment:</strong> {{ app()->environment() }}</p>
                        <p><strong>Debug Mode:</strong> {{ config('app.debug') ? 'Enabled' : 'Disabled' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
