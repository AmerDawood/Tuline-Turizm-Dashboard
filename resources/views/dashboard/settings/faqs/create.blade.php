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

                    <form action="{{ route('faqs.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="live-preview">
                            <form action="">
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Question</label>
                                    <input type="text" class="form-control" id="employeeName"
                                        placeholder="Enter Question" name="question">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeUrl" class="form-label">Answer</label>
                                    <input type="text" class="form-control" id="description"
                                        placeholder="Enter Answer" name="answer">
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




