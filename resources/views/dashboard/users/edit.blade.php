@extends('dashboard.master')




@section('content')


    <div class="page-content">
        <div class="container-fluid">

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Update User</h4>

                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="{{ route('users.update',$user->id) }}" class="row g-3" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="col-md-12">
                                    <label for="fullnameInput" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="fullnameInput" placeholder="Enter your name" value="{{ $user->name }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{ $user->email }}">
                                </div>

                                    <!-- Type -->
                                    <div class="col-md-12">
                                        <label for="typeSelect" class="form-label">Type</label>
                                        <select name="type" class="form-select" id="typeSelect">
                                            <option value="user" @if($user->type === 'user') selected @endif>User</option>
                                            <option value="admin" @if($user->type === 'admin') selected @endif>Admin</option>
                                        </select>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-12">
                                        <label for="statusSelect" class="form-label">Status</label>
                                        <select name="status" class="form-select" id="statusSelect">
                                            <option value="active" @if($user->status === 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($user->status === 'inactive') selected @endif>Inactive</option>
                                        </select>
                                    </div>

                                 


                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update User</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->


        </div>
    </div>

@endsection
