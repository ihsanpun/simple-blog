@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Categories</h1>
    </div>

    <div class="table-responsive">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="/dashboard/categories/create" class="btn btn-info text-white">Create New Category</a>
        <table class="table table-striped table-sm" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td><a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"> <span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/categories/{{ $category->id }}" method="post"class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>
        // let table = new DataTable('#myTable');
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
