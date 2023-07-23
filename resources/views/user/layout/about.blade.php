@extends('user.layout.main')
@section('content')
<style>
    .container{
        font-family: Airal, sans-serif;
    }
    .about_section {
            background-color: lightskyblue;
            padding: 60px 0;
            text-align: center;
        }

        .about_content h1 {
            font-size: 40px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .about_content p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 0;
        }

        .about_gallery_section {
            padding: 60px 0;
            background-color: lightcyan;
            margin-bottom: 2px;
        }

        .single_gallery_section {
            margin-bottom: 30px;
        }

        .single_gallery_section .gallery_thumb img {
            width: 100%;
            height: auto;
        }

        .about_gallery_content h3 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .about_gallery_content p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 0;
        }
</style>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <!--about section area -->
    <section class="about_section mt-1 mb-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <figcaption class="about_content">
                        <h1>CameraBazzar</h1>
                        <p><b>Welcome to CameraBazzar. Our passion for cameras drives our commitment to providing an exceptional online shopping experience. As camera enthusiasts ourselves, we know how important it is to find the perfect equipment to capture life's most beautiful moments.</b></p>
                    </figcaption>
                </div>
            </div>
        </div>
    </section>
    <!--about section end-->

    <!--services img area-->
    <div class="about_gallery_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="{{asset('user/assets/img/about/aboutus.jpeg')}}" alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>What do we Provide!</h3>
                                <p><b>CameraBazzar has carefully curated a diverse selection of name brand cameras, lenses, and accessories to ensure our customers have access to the latest technology and innovation. Whether you're a professional photographer or an avid hobbyist, our goal is to give you the tools you need to unleash your creativity and capture stunning images.</b></p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-6 col-md-6">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="{{asset('user/assets/img/about/aboutus.jpeg')}}" alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>CameraBazzar</h3>
                                <p><b>Thank you for choosing CameraBazzar as your reliable source for all things cameras. We look forward to joining you on your photography journey and helping you capture moments that will last a lifetime.</b></p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <!--services img end-->       
@endsection