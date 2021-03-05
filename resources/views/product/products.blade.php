<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="col-xs-12">
        <div class="page-header">

            @hasrole('superadmin')
                <p><a class="pull-right" href="{{ url()->to('product/create') }}">Add a Product</a></p>
            @endhasrole

            <h3>Products</h3>
            <p>Shop for Products</p>
        </div>

        @if(!is_null($product))

        <div class="carousel slide" id="myCarousel">
            <div class="carousel-inner">
                <div class="item active">
                    <ul class="thumbnails">

                            @if (isset($singular))

                                <li class="col-sm-12">
                                    <div class="fff">
                                        <div class="thumbnail">
                                            <a href="#"><img style="width:360px; height: 320px;" src="https://thumbs.dreamstime.com/b/red-empty-shopping-bag-flat-icon-white-heart-isolated-background-eps-file-available-91955974.jpg" alt=""></a>
                                        </div>
                                        <div class="caption">
                                            <h4>{{ $product->name }}</h4>
                                            <p>Priced at only @convert($product->price)</p>
                                            <p>Description: {{ $product->description }}</p>
                                            <a target="_blank" class="btn btn-mini" href="{{ $product->url }}">» link</a>
                                            @hasrole('superadmin')
                                            <a href="{{ url('product/'.$product->id).'/edit' }}">[change]</a>
                                            @endhasrole
                                            @hasrole('customer')
                                            <a href="{{ url('cart/'.$product->id) }}">[Add to Cart]</a>
                                            @endrole
                                        </div>
                                        <br><a href="{{ url('product') }}">&larr; back</a></p>
                                    </div>
                                </li>

                            @else

                                @foreach ($product as $eachProduct)

                                        <li class="col-sm-3">
                                            <div class="fff">
                                                <div class="thumbnail">
                                                    <a href="#"><img style="width:360px; height: 220px;" src="https://cdn3.vectorstock.com/i/1000x1000/19/82/shopping-bag-red-icon-inside-vector-13601982.jpg" alt=""></a>
                                                </div>
                                                <div class="caption">
                                                    <h4>{{ $eachProduct->name }}</h4>
                                                    <p>Priced at only @convert($eachProduct->price)</p>
                                                    <a class="btn btn-mini" href="{{ url('product/'.$eachProduct->id) }}">» More Details</a>
                                                    @hasrole('superadmin')
                                                        <a href="{{ url('product/'.$eachProduct->id).'/edit' }}">[change]</a>
                                                    @endhasrole
                                                    @hasrole('customer')
                                                        <a href="{{ url('cart/'.$eachProduct->id) }}">[Add to Cart]</a>
                                                    @endrole
                                                </div>
                                            </div>
                                            <br>
                                        </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>


                <br><div class="row">
                    <div class="col-md-12">
                        {{ $product->links() }}
                    </div>
                </div>

            @endif
        </div>
    </div>
@endif
@endsection
<style>
    /* Global */

    * { font-size:103%}

    img { max-width:100%; }

    a {
        -webkit-transition: all 150ms ease;
        -moz-transition: all 150ms ease;
        -ms-transition: all 150ms ease;
        -o-transition: all 150ms ease;
        transition: all 150ms ease;
    }

    a:hover {
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)"; /* IE 8 */
        filter: alpha(opacity=50); /* IE7 */
        opacity: 0.6;
        text-decoration: none;
    }



    body{
        border-top:0;
        background:#c4e17f;
        background-image:-webkit-linear-gradient(left,#c4e17f,#c4e17f 12.5%,#f7fdca 12.5%,#f7fdca 25%,#fecf71 25%,#fecf71 37.5%,#f0776c 37.5%,#f0776c 50%,#db9dbe 50%,#db9dbe 62.5%,#c49cde 62.5%,#c49cde 75%,#669ae1 75%,#669ae1 87.5%,#62c2e4 87.5%,#62c2e4);background-image:-moz-linear-gradient(left,#c4e17f,#c4e17f 12.5%,#f7fdca 12.5%,#f7fdca 25%,#fecf71 25%,#fecf71 37.5%,#f0776c 37.5%,#f0776c 50%,#db9dbe 50%,#db9dbe 62.5%,#c49cde 62.5%,#c49cde 75%,#669ae1 75%,#669ae1 87.5%,#62c2e4 87.5%,#62c2e4);background-image:-o-linear-gradient(left,#c4e17f,#c4e17f 12.5%,#f7fdca 12.5%,#f7fdca 25%,#fecf71 25%,#fecf71 37.5%,#f0776c 37.5%,#f0776c 50%,#db9dbe 50%,#db9dbe 62.5%,#c49cde 62.5%,#c49cde 75%,#669ae1 75%,#669ae1 87.5%,#62c2e4 87.5%,#62c2e4);background-image:linear-gradient(to right,#c4e17f,#c4e17f 12.5%,#f7fdca 12.5%,#f7fdca 25%,#fecf71 25%,#fecf71 37.5%,#f0776c 37.5%,#f0776c 50%,#db9dbe 50%,#db9dbe 62.5%,#c49cde 62.5%,#c49cde 75%,#669ae1 75%,#669ae1 87.5%,#62c2e4 87.5%,#62c2e4)
    }

    .thumbnails li> .fff .caption {
        background:#fff !important;
        padding:10px
    }

    /* Page Header */
    .page-header {
        background: #f9f9f9;
        margin: -30px -40px 40px;
        padding: 20px 40px;
        border-top: 4px solid #ccc;
        color: #999;
        text-transform: uppercase;
    }

    .page-header h3 {
        line-height: 0.88rem;
        color: #000;
    }

    ul.thumbnails {
        margin-bottom: 0px;
    }



    /* Thumbnail Box */
    .caption h4 {
        color: #444;
    }

    .caption p {
        color: #999;
    }



    /* Carousel Control */
    .control-box {
        text-align: right;
        width: 100%;
    }
    .carousel-control{
        background: #666;
        border: 0px;
        border-radius: 0px;
        display: inline-block;
        font-size: 34px;
        font-weight: 200;
        line-height: 18px;
        opacity: 0.5;
        padding: 4px 10px 0px;
        position: static;
        height: 30px;
        width: 15px;
    }



    /* Mobile Only */
    @media (max-width: 767px) {
        .page-header, .control-box {
            text-align: center;
        }
    }
    @media (max-width: 479px) {
        .caption {
            word-break: break-all;
        }
    }


    li { list-style-type:none;}

    ::selection { background: #ff5e99; color: #FFFFFF; text-shadow: 0; }
    ::-moz-selection { background: #ff5e99; color: #FFFFFF; }

</style>
