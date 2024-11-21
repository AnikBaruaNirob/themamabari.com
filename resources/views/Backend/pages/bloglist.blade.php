@extends('Backend.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Blog List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4">Blog Posts</h1>

        <!-- Blog Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            
                    <tr>
                    @foreach($blogpost as $key => $blog)
                        <td></td>
                        <td>{{$blog-> title}}</td>
                        <td>{{$blog-> slug}}</td>
                        <td>{{$blog -> content}}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-warning">Edit</a>
                            <form action="" method="POST" class="d-inline-block">
                             
                             
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </td>
                        @endforeach
                    </tr>
      
                    
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            
        </div>

        <!-- Add New Post Button -->
        <a href="{{route('blog.create')}}" class="btn btn-primary mt-3">Add New Post</a>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
