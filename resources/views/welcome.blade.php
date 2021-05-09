<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css' )}}">
    <link rel="stylesheet" href="{{ asset('fa/css/all.min.css' )}}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        *{
            font-family: 'Kurale', serif;
        }
        .custom-price{
            font-size: 20px;
            transition: font-size 1s;
        }
        .custom-price:hover{
            font-size: 25px;
        }
        .custom-img{
            transition: all 1s;

        }
        .custom-img:hover{

            transform-style: preserve-3d;
            transform: rotateY(20deg);

        }
        .base{
            perspective-origin: left;
        }
    </style>
</head>
<body>
<div class="">
    <div class="bg-light border-bottom p-2 py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="h3 text-primary fw-bold">{{ config('app.name') }}</div>
            <div class="w-50">
                <div class="input-group">
                    <input type="text"
                           class="form-control"
                           aria-label="search"
                           placeholder="Search something"
                           aria-describedby="search">
                    <div class="input-group-prepend">
                        <div class="input-group-text" id="search">
                            Search
                        </div>
                    </div>
                </div>
            </div>
                <div class="">
                    <a href="{{ route('dashboard') }}" class="">Dashboard</a>
                </div>
            <div>
            </div>
        </div>
    </div>
    <div class="">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset('siteImage/img_1.png') }}" style="height: 35vh;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('siteImage/img_2.png') }}" style="height: 35vh;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('siteImage/img_3.png') }}" style="height: 35vh;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        {{--body--}}
        {{--slider--}}


        @foreach($categories as $category)
            @if(count($category->product) > 0)
                <div class="h3 mt-4 p-3 bg-light"> <i class="fa fa-arrow-right"></i> {{ $category->name }} </div>
                <div class="d-flex flex-wrap">
                    @foreach($category->product as $product)
                        <div class="card m-3" style="width: 18rem;">
                            <div class="base">
                                <img class="card-img-top custom-img"
                                     style="height: 250px;"
                                     src="{{asset($product->image)}}"
                                     alt="Card image cap"
                                     onclick="window.location='{{ route('product.show', $product->id) }}'">
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <a href="{{ route('product.show', $product->id) }}"
                                       class="text-decoration-none text-capitalize text-success h4 fw-bold">{{ $product->name }}</a>
                                </div>

                                <div class="fw-bold custom-price"> {{ $product->price }} &#2547; </div>
                                @if(strlen($product->details) > 71)
                                    <p class="card-text bg-light"> {{ substr($product->details,0,70) }} ...</p>
                                @else
                                    <p class="card-text"> {{ $product->details }}</p>
                                @endif
                            </div>
                            <div class="card-body">

                                @if($product->stock == 0)
                                    <p class="alert alert-danger h5">Out of Stock</p>
                                @else
                                    <a href="" class="card-link">Buy Now</a>
                                @endif


                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach

    </div>
    <div>

    </div>
</div>
</body>

</html>
