<x-base-layout title="Product Details">
    <div class="bg-light p-5">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">ID: {{ $product->id }}</h5>
                        <p class="card-text"><strong>Name:</strong> {{ $product->name }}</p>
                        <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
