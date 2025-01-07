<x-base-layout title="Categories Page">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create New Category</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td> {{ $category->id }} </td>
                        <td> {{ $category->name }} </td>
                        <td>
                            <form style="display: inline" action="{{ route('categories.destroy', $category) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-secondary">Show</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <h6>
                                There is no categories....
                                <a href="{{ route('categories.create') }}">Create Category</a>
                            </h6>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>

</x-base-layout>
