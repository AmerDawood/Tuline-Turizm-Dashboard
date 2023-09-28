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
                    <h4 class="card-title mb-0 flex-grow-1">Create FAQs</h4>
                </div><!-- end card header -->
                <div class="card-body">

                    <form action="" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="live-preview">
                            <form action="">
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="employeeName"
                                        placeholder="Enter offer name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeUrl" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description"
                                        placeholder="Enter offer description" name="description">
                                </div>


                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Add FAQs</button>
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




