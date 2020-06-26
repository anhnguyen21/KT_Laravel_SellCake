@extends('master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    <!-- THE FIRST SLIDE -->
                    @foreach ($slide as $item)
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="public/source/image/slide/{{$item->image}}" data-src="public/source/image/slide/{{$item->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('public/source/image/slide/{{$item->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li>
                    @endforeach

                    {{-- <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                            data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="public/source/assets/dest/images/thumbs/1.jpg" data-src="public/source/assets/dest/images/thumbs/1.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('public/source/assets/dest/images/thumbs/1.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>

                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                                data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="public/source/assets/dest/images/thumbs/1.jpg" data-src="public/source/assets/dest/images/thumbs/1.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('public/source/assets/dest/images/thumbs/1.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li>

                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                                data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="public/source/assets/dest/images/thumbs/1.jpg" data-src="public/source/assets/dest/images/thumbs/1.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('public/source/assets/dest/images/thumbs/1.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li> --}}
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
{{-- <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div> seller --}}
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($pro->getNewPro() as $item)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                    <a href="{{ route('chitietsanpham',$item->id) }}"><img src="public/source/image/product/{{ $item->image }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body text-center">
                                        <p class="single-item-title">{{ $item->name }}</p>
                                        <p class="single-item-price">
                                            <span>{{ $item->unit_price }}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption text-center">
                                        <a class="add-to-cart" href="{{ route('themgiohang',$item->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('chitietsanpham',$item->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                    </div>
                    <div class="row text-center">{{ $pro->getNewPro()->links() }}</div>
                    <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Top Products- San pham khuyen mai</h4>
                        <div class="beta-products-details">
                        <p class="pull-left">Tim thay {{ count($pro->getSanPhamKM()) }}</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($pro->getSanPhamKM() as $item)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('chitietsanpham',$item->id) }}"><img src="public/source/image/product/{{ $item->image }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body text-center">
                                        <p class="single-item-title">{{ $item->name }}</p>
                                        <p class="single-item-price">
                                            <span>{{ $item->unit_price }}đ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption text-center">
                                        <a class="add-to-cart" href="{{ route('themgiohang',$item->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('chitietsanpham',$item->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    <div class="row text-center">{{ $pro->getSanPhamKM()->links() }}</div>
                    </div>
                    <!-- .beta-products-list -->
                </div>
            </div>
            <!-- end section with sidebar and main content -->


        </div>
    <!-- .main-content -->
</div>
    </div>
</div>
@endsection
