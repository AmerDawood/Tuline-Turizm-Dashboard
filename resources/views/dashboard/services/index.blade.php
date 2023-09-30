@extends('dashboard.master')

@section('content')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            @foreach ($services as $service)


            <div class="col-sm-6 col-xl-4" >
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ asset('uploads/services/'.$service->image) }}" alt="Card image cap" style="height: 250px;">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{{ $service->name }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-muted">{{ $service->description }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">

                            <div class="col-2">
                                <p class="card-text mb-0">


                                <form action="{{ route('services.destroy',$service->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-danger btn-delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </form>
                                </p>
                            </div>
                            <div class="col-2">
                                <p class="card-text mb-0">
                                    <a href="{{ route('services.edit',$service->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            @endforeach
                              <div style="padding: 20px">
                                {{ $services->links() }}

                                </div>






        </div>




    @include('dashboard.layouts.footer')



      @section('scripts')


      @endsection


@endsection




