@extends('dashboard.master')

@section('content')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">


            @foreach ($sections as $section)

            <div class="col-sm-6 col-xl-4" >
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ asset('uploads/sections/'.$section->image) }}" alt="Card image cap" style="height: 150px;">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{{ $section->name }}</h4>
                    </div>
                    {{-- <div class="card-body">
                        <p class="card-text text-muted"> Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.</p>
                    </div> --}}

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


                                <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display: inline-block;">
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
                                    <a href="{{ route('sections.edit',$section->id) }}" class="btn btn-primary">
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
                                {{ $sections->links() }}

                                </div>






        </div>




    @include('dashboard.layouts.footer')



      @section('scripts')


      @endsection


@endsection




