@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title">Manage Members</h3>
                            </div>
                            <div class="col-md-3 justify-content-end">
                                <a href="{{ route('admin.members.create') }}" class="btn float-right btn-dark">
                                    Add member
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4 ">
                            <div class="col-12">
                                <form class="form-inline float-right ml-3" action="{{ route('admin.members.index') }}" method="get">
                                    @csrf
                                    <div class="input-group input-group-sm">
                                        <input class="form-control form-control-navbar" name="query" type="search" placeholder="Search" aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn border-secondary btn-navbar" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive overflow-auto">
                            @if(count($members))
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Name</th>
                                    <th>Father/Husband</th>
                                    <th>Mother</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                <tr>
                                    <td>{{ $member->serial_id }}</td>
                                    <td>{{ $member->name}}</td>
                                    <td>{{ $member->hus_father }}</td>
                                    <td>{{ $member->mother }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="cols-md-4">
                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.members.show', $member) }}">View</a>
                                            </div>
                                            <div class="cols-md-4">
                                                <a class="btn btn-sm ml-2 btn-info" href="{{ route('admin.members.edit', $member) }}">Edit</a>
                                            </div>
                                            <div class="cols-md-4">
                                                <button class="btn btn-sm ml-2 btn-danger" data-toggle="modal" data-target="#deleteModal"
                                                        onclick="deleteHead('{{ route('admin.members.destroy', $member) }}')">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert text-center alert-default-secondary">
                                            No Data Found!
                                        </div>
                                    </div>
                                </div>
                                @endif
                            <div class="row">
                                <div class="pagination">
                                    {{ $members->links() }}
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
