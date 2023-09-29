@extends('dashboard.master')

@section('styles')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>

@endsection


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
                        <h4 class="card-title mb-0 flex-grow-1">Create User</h4>

                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="{{ route('areas.update',$area->id) }}" class="row g-3" method="POST">
                                @csrf
                                @method('PUT')
                                 @include('dashboard.areas._form')
                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update Area</button>
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




@section('scripts')

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script>
        var map = L.map('map').setView([31.4167, 34.3333], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            maxZoom: 18
        }).addTo(map);

        // var marker = L.marker([31.4167, 34.3333]).addTo(map);


        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            var marker = L.marker([lat,lng]).addTo(map);

            document.getElementById("latitude").value = lat;
            document.getElementById("longitude").value = lng;
        });


    </script>

@endsection

