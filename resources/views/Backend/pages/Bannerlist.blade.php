@extends('Backend.master')

@section('content')
    <div class="container">
        <h2>Banner List</h2>
        <a href="{{ route('banners.form') }}" class="btn btn-primary">Add New Banner</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td>{{ $banner->title }}</td>
                        <td><img src="{{ url('uploads/' . $banner->image) }}" width="100"></td>
                        <td>{{ $banner->link }}</td>
                        <td>{{ $banner->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <!-- Add edit/delete buttons -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
