@extends('dashboard.master')


@section('styles')

@endsection

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
                    <h4 class="card-title mb-0 flex-grow-1">Create Notification</h4>
                </div><!-- end card header -->
                <div class="card-body">

                    <form action="" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="live-preview">
                            <form action="">
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Notification Title</label>
                                    <input type="text" class="form-control" id="employeeName"
                                        placeholder="Enter offer name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeUrl" class="form-label">Notifiacyion Description</label>
                                    <input type="text" class="form-control" id="description"
                                        placeholder="Enter offer description" name="description">
                                </div>

                                <div class="col-lg-12">
                                    <select class="form-select mb-3" aria-label="Default select example">
                                        <option selected="">Select users </option>
                                        <option value="1">Amer Dawood</option>
                                        <option value="2">Ahmad Ali</option>
                                        <option value="3">Billal</option>
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label for="image_url" class="form-label">Select Image *</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="image_url" name="image_url">
                                        <label class="input-group-text" for="image_url">Upload</label>
                                    </div>
                                </div>


                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Create Notification</button>
                                </div>
                            </form>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>







        @include('dashboard.layouts.footer')



      @section('scripts')


      @endsection


@endsection




