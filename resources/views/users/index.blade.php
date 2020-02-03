@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title">Manage Users</h3>
                            </div>
                            <div class="col-md-3 justify-content-end">
                                <a href="{{ route('admin.users.create') }}" class="btn float-right btn-dark">
                                    Add Users
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-auto">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $nominee)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $nominee->name}}</td>
                                        <td>{{ $nominee->email }}</td>
                                        <td class="text-capitalize">{{ $nominee->role }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="cols-md-4">
                                                    <a class="btn btn-sm ml-2 btn-info" href="{{ route('admin.users.edit', $nominee) }}">Edit</a>
                                                </div>
                                                <div class="cols-md-4">
                                                    <button class="btn btn-sm ml-2 btn-danger" data-toggle="modal" data-target="#deleteModal"
                                                            onclick="deleteHead('{{ route('admin.users.destroy', $nominee) }}')">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="pagination">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('extra.delete-modal')
@endsection

@section('footer-script')
    <script>
        function deleteHead(route){
            $('#deleteForm').attr("action", route);
        }
    </script>
@endsection