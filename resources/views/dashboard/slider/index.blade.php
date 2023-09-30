@extends('dashboard.master')

@section('content')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            @foreach ($sliders as $slider)


            <div class="col-sm-6 col-xl-4" >
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ asset('uploads/sliders/'.$slider->image) }}" alt="Card image cap" style="height: 250px;">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{{ $slider->name }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-muted">{{ $slider->description }}</p>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-2">
                                <p class="card-text mb-0">
                                    <a href="#" class="btn btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </p>
                            </div>
                            <div class="col-2">
                                <p class="card-text mb-0">
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </p>
                            </div>
                            <div class="col-2">
                                <p class="card-text mb-0">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            @endforeach
                              <div style="padding: 20px">
                                {{ $sliders->links() }}

                                </div>






        </div>




    @include('dashboard.layouts.footer')



      @section('scripts')


      @endsection


@endsection




