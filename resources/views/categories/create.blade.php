<x-base-layout title="Create Category">
    <div class="bg-light p-5">
        <h1>Create Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="category" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" id="category" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

</x-base-layout>
