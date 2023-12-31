@extends('dashboard.master')

@section('content')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            @foreach ($offers as $offer)


            <div class="col-sm-6 col-xl-4" >
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ asset('uploads/offers/'.$offer->image) }}" alt="Card image cap" style="height: 250px;">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{{ $offer->name }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-muted">{{ $offer->description }}</p>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            {{-- <div class="col-2">
                                <p class="card-text mb-0">
                                    <a href="#" class="btn btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </p>
                            </div> --}}
                            <div class="col-2">
                                <p class="card-text mb-0">


                                <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" style="display: inline-block;">
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
                                    <a href="{{ route('offers.edit',$offer->id) }}" class="btn btn-primary">
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
                                {{ $offers->links() }}

                                </div>






        </div>




    @include('dashboard.layouts.footer')



      @section('scripts')


      @endsection


@endsection




