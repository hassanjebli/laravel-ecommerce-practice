<x-base-layout title="Category Details">
    <div class="bg-light p-5">
        <h1>Category Details</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">ID: {{ $category->id }}</h5>
                        <p class="card-text"><strong>Name:</strong> {{ $category->name }}</p>
                    </div>
                    <div class="col-md-6">
                        all products
                        <ul>
                            @forelse ($category->product as $pro)
                                <li>{{ $pro->name }}</li>
                            @empty
                                <li>
                                    <h1>there is no products in this category</h1>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
