@extends('layouts.app')
@section('title', 'Detail Travel')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col pd-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{$item->title}}</h1>
                        <p>
                            {{$item->location}}
                        </p>

                        @if($item->galleries->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ Storage::url($item->galleries->first()->images )}}" class="xzoom"
                                    id="xzoom-default"
                                    xoriginal="{{ Storage::url($item->galleries->first()->images )}}" />
                            </div>

                            <div class="xzoom-thumbs">
                                <!--buat thumbnails -->

                                @foreach($item->galleries as $gallery)
                                <a href="{{Storage::url($gallery->images)}}">
                                    <img src="{{Storage::url($gallery->images)}}" class="xzoom-gallery" width="128"
                                        xpreview="{{Storage::url($gallery->images)}}" />
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <h2>Tentang Wisata</h2>
                        <p>
                            {!! $item->about !!}
                        </p>

                        <div class="features row">
                            <div class="col-md-4">

                                <img src="{{url('frontend/images/ic_event@2x.png')}}" alt="" class="features-image">
                                <div class="description">
                                    <h3>
                                        Featured Event
                                    </h3>
                                    <p>{{$item->featured_event}}</p>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <img src="{{url('frontend/images/ic_bahasa@2x.png')}}" alt="" class="features-image">
                                <div class="description">
                                    <h3>
                                        Language
                                    </h3>
                                    <p>{{$item->language}}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <img src="{{url('frontend/images/ic_foods@2x.png')}}" alt="" class="features-image">
                                <div class="description">
                                    <h3>
                                        Foods
                                    </h3>
                                    <p> {{$item->foods}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!--large 4-->
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <div class="members my-2">
                            <!--my = margin atas bwh -->
                            <img src="{{url('frontend/images/member-3.png')}}" class="member-image mr-1">

                            <img src="{{url('frontend/images/member-4.png')}}" class="member-image mr-1">

                            <img src="{{url('frontend/images/member-3.png')}}" class="member-image mr-1">

                            <img src="{{url('frontend/images/member-4.png')}}" class="member-image mr-1">

                            <img src="{{url('frontend/images/member-3.png')}}" class="member-image mr-1">
                        </div>
                        <hr>
                        <!--buat garis yg tipis pembatas-->

                        <h2>Trip Information</h2>
                        <table class="trip-informations">
                            <tr>
                                <!--tr = tabel row. th = table heading-->
                                <th width="50%">Date of Departure</th>
                                <th width="50%" class="text-right">
                                    {{ \Carbon\Carbon::create($item->date_of_departure)->format('F n, Y') }}
                                </th>
                            </tr>

                            <tr>
                                <!--tr = tabel row. th = table heading-->
                                <th width="50%">Duration</th>
                                <th width="50%" class="text-right">
                                    {{ $item->duration }}
                                </th>
                            </tr>

                            <tr>
                                <!--tr = tabel row. th = table heading-->
                                <th width="50%">Type</th>
                                <th width="50%" class="text-right">
                                    {{ $item->type }}
                                </th>
                            </tr>

                            <tr>
                                <!--tr = tabel row. th = table heading-->
                                <th width="50%">Price</th>
                                <th width="50%" class="text-right">
                                    ${{ $item->price }},00 / person
                                </th>
                            </tr>
                        </table>
                    </div>

                    <div class="join-container">
                        @auth
                            <form action="{{ route('checkout_process', $item->id)}}" method="post">
                                @csrf
                                <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                Join Now
                                </button>
                            </form>
                        @endauth

                        @guest
                            <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                                Login or Register to Join
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@push('prepend-style')
<link rel="stylesheet" href=" {{ url('frontend/libraries/xzoom/xzoom.css')}} " />
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }} "></script>
<script>
    $(document).ready(function () {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
        });
    });

</script>
@endpush
