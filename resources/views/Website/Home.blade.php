<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/animationcustom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="big-body">
        <div class="layout-header">
            <div class="bar mt-3">
                <div class="logo">
                    <img src="/uploads/logo1.png" alt="" srcset="" width="150px" height="150px">
                </div>
                <div class="menu-home">
                    @include('Website/menungang')
                </div>
            </div>
            <div class="fade-slide">
                @foreach ($banner as $item)
                    <img src="/uploads/{{ $item->hinhanh }}" alt="" srcset="">
                @endforeach
            </div>
        </div>
        <div class="content">
            @include('Website/product-line1')
            @include('Website/product-line2')
            @include('Website/product-line3')
            @include('Website/product-line4')
            @include('Website/product-line5')
            @include('Website/product-line6')
            @include('Website/product-line7')
      
        </div>
        
    </div>
    <div>
        @include('Website/footer')
    </div>
    <script src="https://kit.fontawesome.com/dc8bdf0c28.js" crossorigin="anonymous"></script>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('js/wowanimate.min.js') }}"></script>

    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/slide_owl.min.js') }}"></script>
    <script src="{{ asset('js/scroll.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <script>
        $('.fade-slide').slick({
            speed: 4000,
            infinite: true,
            fade: true,
            cssEase: 'linear',
            autoplay: true,
            arrows: false,
            autoplaySpeed: 1500,
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    </script>
</body>

</html>
