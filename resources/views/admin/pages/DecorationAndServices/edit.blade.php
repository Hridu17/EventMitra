@extends('admin.inc.main')
@section('container')
    <div class="form-container">
        <h2>Edit Decoration & Services</h2>
        <form action="{{ route('admin.decorations.update', $decoration->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Important for update requests -->

            <label for="title">Decoration Name</label>
            <input type="text" id="title" name="title" value="{{ old('title', $decoration->title) }}" required>

            <label for="description">Decoration Description</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description', $decoration->description) }}</textarea>

            <label for="price">Decoration Price (NPR)</label>
            <input type="number" name="price" step="0.01" id="price"
                value="{{ old('price', $decoration->price) }}" required>


            <label for="image">Upload Image</label>
            <input type="file" id="image" name="image" accept="image/*">

            <button type="submit">Update Decoration</button>
        </form>

    </div>
@endsection
