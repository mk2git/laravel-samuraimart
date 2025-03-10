@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-2">
    @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
    @endcomponent
  </div>
  <div class="col-9">
    <div class="container">
      @if($category !== null)
        <a href="{{route('products.index')}}">トップ</a> > <a href="#">{{$major_category->name}}</a> > {{$category->name}}
        <h1>{{$category->name}}の商品一覧{{$total_count}}件</h1>
      @elseif($keyword !== null)
        <a href="{{route('products.index')}}">トップ</a> > 商品一覧
        <h1>{{$keyword}}の検索結果{{$total_count}}件</h1>
      @endif
    </div>
    <div>
      Sort By
      @sortablelink('id', 'ID')
      @sortablelink('price', 'Price')
      @sortablelink('created_at', 'Created At')
    </div>
    <div class="container mt-4">
      <div class="row w-100">
        {{-- @dd($review_scores) --}}
        @foreach($products as $product)
          <div class="col-3">
            <a href="{{route('products.show', $product)}}">
              @if ($product->image !== "")
                <img src="{{asset($product->image)}}" class=" img-fluid" style="height: 250px; width:300px;">
              @else
                <img src="{{asset('img/dummy.png')}}" class=" img-fluid" style="height: 250px; width:300px;">
              @endif
            </a>
            <div class="row">
              <div class="col-12">
                <p class="samuraimart-product-label mt-2">
                  {{$product->name}} <br>
                  @foreach ($review_scores as $score)
                      @if ((round($score->where('product_id', $product->id)->avg('score'), 1)) > 0)
                          <span class="samuraimart-star-rating-index" data-rate="{{(round($score->where('product_id', $product->id)->avg('score') * 2)) / 2}}">
                        {{round($score->where('product_id', $product->id)->avg('score'), 1)}}
                          </span>
                          <br>
                        @break
                      @endif
                      <label class="samuraimart-star-rating" data-rate="0"></label><br>
                      @break
                  @endforeach

                  <label>&yen; {{number_format($product->price)}}</label>
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <p class=" mb-3">
        {{$products->appends(request()->query())->links()}}
    </p>
  </div>
</div>
@endsection
