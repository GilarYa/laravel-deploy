<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products 12 new</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .info-box {
            background: #e3f2fd;
            border: 1px solid #2196f3;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 30px;
        }
        .info-box h3 {
            margin: 0 0 10px 0;
            color: #1976d2;
        }
        .info-box p {
            margin: 5px 0;
            color: #555;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .product-card h3 {
            margin: 0 0 10px 0;
            color: #333;
        }
        .product-card p {
            margin: 5px 0;
            color: #666;
        }
        .price {
            font-size: 1.2em;
            font-weight: bold;
            color: #4caf50;
        }
        .no-products {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #2196f3;
            text-decoration: none;
            font-weight: bold;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .api-info {
            background: #f5f5f5;
            border-radius: 5px;
            padding: 15px;
            margin-top: 30px;
        }
        .api-info h4 {
            margin: 0 0 10px 0;
            color: #333;
        }
        .api-info code {
            background: #e8e8e8;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/" class="back-link">← Back to Home</a>
        
        <h1>Laravel 12 Products</h1>
        
        <div class="info-box">
            <h3>Laravel 12 Application Info</h3>
            <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
            <p><strong>PHP Version:</strong> {{ PHP_VERSION }}</p>
            <p><strong>Environment:</strong> {{ app()->environment() }}</p>
            <p><strong>Database:</strong> SQLite</p>
            <p><strong>Total Products:</strong> {{ $products->total() }}</p>
        </div>

        @if($products->count() > 0)
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description ?: 'No description available' }}</p>
                        <p class="price">${{ number_format($product->price, 2) }}</p>
                        <p><small>Created: {{ $product->created_at->format('M d, Y') }}</small></p>
                    </div>
                @endforeach
            </div>
            
            <div style="margin-top: 30px;">
                {{ $products->links() }}
            </div>
        @else
            <div class="no-products">
                <h3>No Products Found</h3>
                <p>This is a demonstration of Laravel 12 with an empty products database.</p>
                <p>You can add products using the API endpoints.</p>
            </div>
        @endif

        <div class="api-info">
            <h4>API Endpoints</h4>
            <p><strong>GET</strong> <code>/api/info</code> - Get application information</p>
            <p><strong>GET</strong> <code>/products</code> - List all products (JSON with Accept: application/json)</p>
            <p><strong>POST</strong> <code>/products</code> - Create a new product</p>
            <p><strong>GET</strong> <code>/products/{id}</code> - Get a specific product</p>
            <p><strong>PUT</strong> <code>/products/{id}</code> - Update a product</p>
            <p><strong>DELETE</strong> <code>/products/{id}</code> - Delete a product</p>
        </div>
    </div>
</body>
</html>
