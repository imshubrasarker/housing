@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title">Manage Reference</h3>
                            </div>
                            <div class="col-md-3 justify-content-end">
                                <a href="{{ route('reference.create') }}" class="btn float-right btn-dark">
                                    Add Reference
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
                                    <th>Image</th>
                                    <th>Father</th>
                                    <th>Mother</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($references as $member)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $member->name}}</td>
                                    <td>
                                        <img style="width: 100px; height: 70px" class="profile-user-img"
                                             src="{{ asset('/storage/'.$member->image) }}"
                                             alt="User profile picture">
                                    </td>
                                    <td>{{ $member->father_name }}</td>
                                    <td>{{ $member->mother_name }}</td>
                                    <td>{{ $member->mobile }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="cols-md-4">
                                                <a class="btn btn-sm btn-primary" href="{{ route('reference.show', $member) }}">View</a>
                                            </div>
                                            <div class="cols-md-4">
                                                <a class="btn btn-sm ml-2 btn-info" href="{{ route('reference.edit', $member) }}">Edit</a>
                                            </div>
                                            <div class="cols-md-4">
                                                <form action="{{ route('reference.destroy', $member->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm ml-2 btn-danger float-right">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('extra.delete-modal')
@endsection

@section('js')
    <script>
        function deleteHead(route){
            $('#deleteForm').attr("action", route);
        }
    </script>
@endsection
