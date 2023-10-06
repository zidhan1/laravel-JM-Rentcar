@extends('layouts.app')

@section('title','JM Rentcar')

@section('content')

<body>
    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Kendaraan <span>kami</span>
                </h2>
            </div>
            <div class="row">
                @foreach($data as $dataMobil)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('user.sewa',$dataMobil->id)}}" class="option1">
                                    Sewa
                                </a>
                                <a href="{{route('user.deskripsi',$dataMobil->id)}}" class="option2">
                                    Deskripsi
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{asset('/img/car/'.$dataMobil->gambar)}}" alt="{{$dataMobil->nama}}">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$dataMobil->nama}}
                            </h5>
                            <h6>
                                Rp {{$dataMobil->harga}}
                            </h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="btn-box">
                <a href="">
                    View All products
                </a>
            </div>
        </div>
    </section>
    <!-- end product section -->
    <div class="cpy_">
        <p class="mx-auto">
            © 2022 All Rights Reserved By
            <a href="https://html.design/">Zidan - Duvan - Amin</a><br />
        </p>
        <br>
        <p>

        </p>
    </div>
    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6370bbf1b0d6371309cec0ea/1gho5sa3a';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

</body>
@endsection