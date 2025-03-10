@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-2">
      @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
      @endcomponent
    </div>

    <div class="col-9">
      <h1>おすすめの商品</h1>
      <div class="row">
        @foreach ($recommend_products as $recommend_product)
        <div class="col-4">
          <a href="{{route('products.show', $recommend_product)}}">
            @if ($recommend_product->image)
             <img src="{{asset($recommend_product->image)}}" class=" img-fluid" style="height: 250px; width:300px;">
            @else
             <img src="{{asset('img/chestnut.jpg')}}" class=" img-fluid" style="height: 250px; width:300px;">
            @endif
          </a>
          <div class="row">
            <div class="col-12">
              <p class="samuraimart-product-label mt-2">
              {{$recommend_product->name}}<br>
              @foreach ($review_scores as $score)
                @if ((round($score->where('product_id', $recommend_product->id)->avg('score'), 1)) > 0)
                    <span class="samuraimart-star-rating-index" data-rate="{{(round($score->where('product_id', $recommend_product->id)->avg('score') * 2)) / 2}}">
                    {{round($score->where('product_id', $recommend_product->id)->avg('score'), 1)}}
                    </span>
                    <br>
                    @break
                @endif
                <label class="samuraimart-star-rating" data-rate="0"></label><br>
                @break
              @endforeach
              <label>&yen;{{number_format($recommend_product->price)}}</label>
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="d-flex justify-content-between mt-5">
        <h1>新着商品</h1>
        <a href="{{route('products.index', ['sort' => 'id', 'direction' => 'desc'])}}">もっと見る</a>
      </div>

      <div class="row">
        @foreach ($recently_products as $recently_product )
          <div class="col-3">
              <a href="{{route('products.show', $recently_product)}}">
                @if ($recently_product->image !== "")
                    <img src="{{asset($recently_product->image)}}" class=" img-fluid" style="height: 250px; width:300px;">
                @else
                    <img src="{{asset('img/sofa.jpg')}}" class=" img-fluid" style="height: 250px; width:300px;">
                @endif
              </a>
              <div class="row">
                  <div class="col-12">
                      <p class="samuraimart-product-label mt-2">{{$recently_product->name}} <br>
                        @foreach ($review_scores as $score)
                            @if ((round($score->where('product_id', $recently_product->id)->avg('score'), 1)) > 0)
                                <span class="samuraimart-star-rating-index" data-rate="{{(round($score->where('product_id', $recently_product->id)->avg('score') * 2)) / 2}}">
                                {{round($score->where('product_id', $recently_product->id)->avg('score'), 1)}}
                                </span>
                                <br>
                                @break
                            @endif
                               <label class="samuraimart-star-rating" data-rate="0"></label><br>
                                @break
                        @endforeach
                        <label>&yen;{{number_format($recently_product->price)}}</label>
                      </p>
                  </div>
              </div>
          </div>
        @endforeach
      </div>

      <h1 class="mt-5">注目商品</h1>
      <div class="row">
          @foreach ($featured_products as $featured_product)
            <div class="col-3">
                <a href="{{route('products.show', $featured_product)}}">
                <img src="{{asset('img/robot-vacuum-cleaner.jpg')}}" class="img-fluid"style="height: 250px; width:300px;"></a>
                <div class="row">
                    <div class="col-12">
                        <p class="samuraimart-product-label mt-2">{{$featured_product->name}} <br>
                            @foreach ($review_scores as $score)
                                @if ((round($score->where('product_id', $featured_product->id)->avg('score'), 1)) > 0)
                                    <span class="samuraimart-star-rating-index" data-rate="{{(round($score->where('product_id', $featured_product->id)->avg('score') * 2)) / 2}}">
                                    {{round($score->where('product_id', $featured_product->id)->avg('score'), 1)}}
                                    </span>
                                    <br>
                                    @break
                                @endif
                                <label class="samuraimart-star-rating" data-rate="0"></label><br>
                                    @break
                            @endforeach
                            <label>&yen;{{number_format($featured_product->price)}}</label>
                        </p>
                    </div>
            </div>
            </div>
          @endforeach
      </div>
    </div>
  </div>
@endsection
