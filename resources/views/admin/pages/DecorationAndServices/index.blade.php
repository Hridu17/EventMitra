@extends('admin.inc.main')

@section('container')
    <main>
        <!-- Add Decoration Form -->
        <div class="form-container">
            <h2>Decoration And Services</h2>
            <h3>Add New Decoration</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.decorations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="decoration-name">Decoration Name</label>
                <input type="text" id="decoration-name" name="title" placeholder="Enter decoration name" required>

                <label for="decoration-description">Decoration Description</label>
                <textarea id="decoration-description" name="description" placeholder="Enter decoration description" rows="4"
                    required></textarea>

                <label for="decoration-price">Decoration Price (NPR)</label>
                <input type="number" step="0.01" name="price" id="decoration-price" placeholder="Enter price"
                    required>

                <label for="decoration-image">Upload Image</label>
                <input type="file" id="decoration-image" name="image" accept="image/*" required>

                <button type="submit">Add Decoration</button>
            </form>

        </div>

        <!-- Decorations List -->
        <div class="table-container">
            <h2>Current Decorations</h2>
            <table>
                <thead>
                    <tr>
                        <th>Decoration Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($decorations as $value)
                        <tr>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }}</td>
                            <td><img src="{{ asset('uploads/' . $value->image) }}" alt="Decoration Image" width="100">
                            </td>
                            <td>
                                <a href="{{ route('admin.decorations.edit', $value->id) }}">Edit</a>
                                <form action="{{ route('admin.decorations.destroy', $value->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </main>
@endsection
