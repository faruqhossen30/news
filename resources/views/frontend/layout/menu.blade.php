@php
// use App\Http\Controllers\Frontend\CategoryNewsController;
$categories = App\Models\Blog\Category::get();

@endphp
<div class="main-menu header-sticky" style="background-color: #215837; ">
    <div class="container-fluid my-1">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('homepage') }}">
                        <img src="{{ asset('frontend/asset/img/daily runner for heshelghor white text-01.png') }}"
                            class="img-fluid" style="height: 50px;" alt="">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    জাতীয়
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">এক</a></li>
                                    <li><a class="dropdown-item" href="#">দুই</a></li>
                                    <li><a class="dropdown-item" href="#">তিন</a></li>
                                </ul>
                            </li> --}}
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="{{route('category.news',$category->id)}}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    জাতীয়
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">এক</a></li>
                                    <li><a class="dropdown-item" href="#">দুই</a></li>
                                    <li><a class="dropdown-item" href="#">তিন</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="col-lg-2 ps-0 ps-md-3">
                        <div class="right-menu-item" style="float: right;">
                            <div class="more-menu" id="more-menu">
                                <i class="fas fa-bars"></i> আরও
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mega menu  section-start -->
                <div class="row mega-menu" id="mega-menu" style="display: none; ">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-lg-2">
                                    <a href="">{{ $category->name }}</a>
                                </div>
                            @endforeach

                        </div>
                        <div class="row mega-menu-bottom">
                            <div class="col-lg-2">
                                <a href=""><i class="fas fa-file-alt text-success"></i> আজকের পত্রিকা</a>
                            </div>
                            <div class="col-lg-2">
                                <a href=""><i class="fas fa-file-alt"></i> দ্বিতীয় সংরক্ষণ</a>
                            </div>
                            <div class="col-lg-2">
                                <a href=""> <i class="far fa-newspaper text-info"></i> ই-পেপার</a>
                            </div>
                            <div class="col-lg-2">
                                <a href=""> <i class="far fa-image text-info"></i> ছবি</a>
                            </div>
                            <div class="col-lg-2">
                                <a href=""><i class="fas fa-file-video"></i> ভিডিও</a>
                            </div>
                            <div class="col-lg-2">

                                <a href=""> <i class="fas fa-archive text-danger"></i> আর্কাইভ</a>
                            </div>
                            <div class="col-lg-2">

                                <a href=""> <i class="fab fa-android text-success"></i> অ্যান্ড্রয়েড</a>
                            </div>
                            <div class="col-lg-2">

                                <a href=""> <i class="fas fa-briefcase text-success"></i> বিজ্ঞাপন</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- mega menu  section-end -->
           </div>
        </nav>
    </div>
</div>
