@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title">Manage Nominees</h3>
                            </div>
                            <div class="col-md-3 justify-content-end">
                                <a href="{{ route('admin.nominees.create') }}" class="btn float-right btn-dark">
                                    Add Nominees
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
                                    <th>Member Name</th>
                                    <th>Father/Husband</th>
                                    <th >National ID</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($nominees as $nominee)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $nominee->name}}</td>
                                        <td>{{ $nominee->member['name'] }}</td>
                                        <td>{{ $nominee->hus_father }}</td>
                                        <td width="20%">{{ $nominee->nid }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="cols-md-4">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.nominees.show', $nominee) }}">View</a>
                                                </div>
                                                <div class="cols-md-4">
                                                    <a class="btn btn-sm ml-2 btn-info" href="{{ route('admin.nominees.edit', $nominee) }}">Edit</a>
                                                </div>
                                                <div class="cols-md-4">
                                                    <button class="btn btn-sm ml-2 btn-danger" data-toggle="modal" data-target="#deleteModal"
                                                            onclick="deleteHead('{{ route('admin.nominees.destroy', $nominee) }}')">
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
                                    {{ $nominees->links() }}
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