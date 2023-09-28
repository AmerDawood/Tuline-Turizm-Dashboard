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
                    <h4 class="card-title mb-0 flex-grow-1">App Theme</h4>
                </div><!-- end card header -->
                <div class="card-body">

                    <div class="col-xxl-4 col-md-12">
                        <div>
                            <label for="colorPicker" class="form-label">Sidebar Color</label>
                            <input type="color" class="form-control form-control-color w-100" id="colorPicker" value="#25a0e2">
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-12">
                        <div>
                            <label for="colorPicker" class="form-label">App Color</label>
                            <input type="color" class="form-control form-control-color w-100" id="colorPicker" value="#21a0e2">
                        </div>
                    </div>


                    <div style="padding-top: 50px;">
                        <label for="formFile" class="form-label">Logo (Splash Screen)</label>
                        {{-- <p class="text-muted">Use <code>input</code> attribute with
                            <code>type="file"</code> tag for default file input.
                        </p> --}}
                        <input class="form-control" type="file" id="formFile">
                    </div>

                    <div style="padding-top: 10px;">
                        <label for="basiInput" class="form-label">Logo Name</label>
                        <input type="text" class="form-control" id="basiInput">
                    </div>


                    <div class="text-end" style="padding-top: 20px;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>





                </div>
            </div>
        </div>
    </div>
</div>







        @include('dashboard.layouts.footer')



      @section('scripts')


      @endsection


@endsection




