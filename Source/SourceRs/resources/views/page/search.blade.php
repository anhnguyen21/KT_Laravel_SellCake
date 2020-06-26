@extends('master')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="row">
                    @foreach ($proSear as $item)
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
            {{-- <div class="row text-center">{{$proSear->links()}}</div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
