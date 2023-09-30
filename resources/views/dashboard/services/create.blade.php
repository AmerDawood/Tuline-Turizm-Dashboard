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
                    <h4 class="card-title mb-0 flex-grow-1">Create Service</h4>
                </div><!-- end card header -->
                <div class="card-body">

                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="live-preview">
                            <form action="">
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Service Name</label>
                                    <input type="text" class="form-control" id="employeeName"
                                        placeholder="Enter offer name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeUrl" class="form-label">Service Description</label>
                                    <input type="text" class="form-control" id="description"
                                        placeholder="Enter offer description" name="description">
                                </div>

                                <div class="mb-3">
                                    <label for="StartleaveDate" class="form-label">From</label>
                                    <input type="number" class="form-control" data-provider="flatpickr"
                                        id="StartleaveDate" name="from" placeholder="Enter Start From service" step="1">
                                </div>


                                <div class="mb-3">
                                    <label for="StartleaveDate" class="form-label">Price</label>
                                    <input type="number" class="form-control" data-provider="flatpickr"
                                        id="StartleaveDate" name="price" placeholder="Enter Pricee" step="1">
                                </div>


                                <div class="mb-3">
                                    <label for="StartleaveDate" class="form-label">Days Number</label>
                                    <input type="number" class="form-control" data-provider="flatpickr"
                                        id="StartleaveDate" name="days_number" placeholder="Enter Days Number" step="1">
                                </div>

                                <div class="mb-3">
                                    <label for="offerName" class="form-label">Section Name</label>
                                    <select class="form-select" id="offerName" name="section_id">
                                        <option value="" disabled selected>Select an section</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="offerName" class="form-label">Area Name</label>
                                    <select class="form-select" id="offerName" name="area_id">
                                        <option value="" disabled selected>Select an area</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $section->id }}">{{ $area->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Select Image</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="image" name="image">
                                        <label class="input-group-text" for="image">Upload</label>
                                    </div>
                                </div>

                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                    <input type="hidden" name="is_available" value="0"> <!-- Hidden input for unchecked value -->
                                    <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="is_available" value="1">
                                    <label class="form-check-label" for="customSwitchsizelg">Is Available</label>
                                </div>









                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Add Services</button>
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




