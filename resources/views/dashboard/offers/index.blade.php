@extends('dashboard.master')

@section('content')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            {{-- @foreach ($spaces as $space) --}}


            <div class="col-sm-6 col-xl-4" >
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="https://placehold.co/600x400" alt="Card image cap" style="height: 250px;">
                    <div class="card-header">
                        <h4 class="card-title mb-0">A day in the of a professional fashion designer</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-muted"> Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text mb-0">
                                    <a href="#" class="btn btn-primary">Show</a>
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="card-text mb-0">
                                    <button class="btn btn-danger">Delete</button>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            {{-- @endforeach --}}
                              <div style="padding: 20px">
                                {{-- {{ $spaces->links() }} --}}

                                </div>






        </div>




    @include('dashboard.layouts.footer')



      @section('scripts')


      @endsection


@endsection




