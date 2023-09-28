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
                        <h4 class="card-title mb-0 flex-grow-1">Privacy And Policy</h4>

                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="" class="row g-3" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3" style="direction: rtl;">
                                    <label>Content</label>
                                    <textarea name="description" placeholder="Privacy Description" id="description" class="myeditor"></textarea>
                                </div>



                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update Privacy</button>
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
