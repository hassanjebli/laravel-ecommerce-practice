<x-base-layout title="Products Page">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td> {{ $product->id }} </td>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->quantity }} </td>
                        <td> {{ $product->category->name }} </td>
                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                width="150px">
                        </td>
                        <td> {{ $product->price }} </td>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $product->description }}
                        </td>
                        <td>
                            <form style="display: inline" action="{{ route('products.destroy', $product) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-secondary">Show</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            <h6>
                                There is no products....
                                <a href="{{ route('products.create') }}">Create Product</a>
                            </h6>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $products->links() }}
    </div>

</x-base-layout>
