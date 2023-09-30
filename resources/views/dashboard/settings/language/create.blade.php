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
                    <h4 class="card-title mb-0 flex-grow-1">Add Language</h4>
                </div><!-- end card header -->
                <div class="card-body">

                    <form action="{{ route('languages.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="live-preview">
                            <form action="">
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Language Title</label>
                                    <input type="text" class="form-control" id="employeeName"
                                        placeholder="Enter Title" name="title">
                                </div>

                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Language Abbreviation</label>
                                    <input type="text" class="form-control" id="employeeName"
                                        placeholder="Enter Language Abbreviation" name="abbreviation">
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Add Language</button>
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




