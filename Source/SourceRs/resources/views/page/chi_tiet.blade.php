@extends('master')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
        <h6 class="inner-title">{{$sanpham->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Product</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                    <img src="public/source/image/product/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                        <p class="single-item-title">{{$sanpham->name}}</p>
                            <p class="single-item-price">
                            <span>{{$sanpham->unit_price}} đ</span>
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                        <p>{{$sanpham->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-options">
                            <input type="number">
                            <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$sanpham->description}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>

                    <div class="row">
                        @foreach ($sp_tuongtu as $item)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if($item->promotion>0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif


                                <div class="single-item-header">
                                    <a href="#"><img src="public/source/image/product/{{$item->image}}" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                <p class="single-item-title">{{$item->name}}</p>
                                    <p class="single-item-price">
                                        @if($item->promotion>0)
                                            <span class="flash-del">{{$item->unit_price}}</span>
                                            <span class="flash-sale">{{$item->promotion_price}}</span>
                                        @else
                                            <span>{{$item->unit_price}}</span>
                                        @endif


                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($sp_banchay as $item)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="#"><img src="public/source/image/product/{{$item->image}}" alt=""></a>
                                <div class="media-body">
                                   {{$item->name}}
                                <span class="beta-sales-price">{{$item->unit_price}}</span>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">New Products</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($sp_new as $item)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="#"><img src="public/source/image/product/{{$item->image}}" alt=""></a>
                                <div class="media-body">
                                   {{$item->name}}
                                <span class="beta-sales-price">{{$item->unit_price}}</span>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection
