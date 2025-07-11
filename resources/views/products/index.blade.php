@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-shopping-bag"></i> Products</h1>
</div>

@if($products->count() > 0)
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($product->description, 100) }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-primary mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <small class="text-muted">Stock: {{ $product->stock }}</small>
                            </div>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm mt-2 w-100">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@else
    <div class="alert alert-info text-center">
        <i class="fas fa-info-circle"></i> Belum ada produk yang tersedia.
    </div>
@endif
@endsection
