@extends('template.base')

@section('content')
<!--
    <div class="w3-container">
		<div class="w3-row">
			<div class="w3-col">
					<div style="height: 50px"></div>
					<div class="w3-content w3-section" style="max-height:436px;">
  						<img class="mySlides" src="{{ asset('assets/img/main/cat.png') }}" style="width:100%" alt="cat">
  						<img class="mySlides" src="{{ asset('assets/img/main/cat3.png') }}" style="width:100%" alt="cat">
  						<img class="mySlides" src="{{ asset('assets/img/main/cat.png') }}" style="width:100%" alt="cat">
					</div>
			</div>
		</div>
	</div>
-->

    
    <style>
    /* Make the image fully responsive */
    .carousel-inner img 
    {
        width: 100%;
        height: 100%;
    }
    </style>
  
  
  
  
<div style="height: 65px"></div>

<div class="container">
<div id="demo" class="carousel slide" data-ride="carousel">

  
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="mySlides" src="{{ asset('assets/img/main/main.jpg') }}" style="width:100%;" alt="cat">
    </div>
  </div>
</div>	
	
    <div class="disable"; style="height: 70px">
        
    </div>

	<div class="container">
		<div class="w3-row w3-container">
			<div class="w3-col m1">
				<p></p>
			</div>

			

			<div class="w3-col m10">
				<!-- Лучшие животные -->
				
				<div class="w3-row">
					<h4>
						<b>
							<a href="https://mypet.uz/store" style="color: black";><img src="{{ asset('assets/icons/bestseller2.png') }}" style="height: 56px; width: 56px;" alt="popular">
							Популярные</a>
						</b>
					</h4>
					<div class="glide_one glide">
					<div class="glide__track" data-glide-el="track">
					    <ul class="row glide__slides" style="margin:0;">
					        
						@if(count($best_animals) > 0)
							@foreach($best_animals as $animal)
							<li class="glide__slide">
							    
								<div class="column" style="width: 100%; padding: 0; float: none;">
									<div class="card">
									    
										<div class="box">
											<a class="button" href="#popup1" data-id="{{ $animal->id }}">
												<div class="top-right">
													<img style="width:28px;height:28px;"
													     src="{{ asset('assets/icons/info.png') }}" alt="info">
												</div>
												<img class="imageborder" src="{{ asset('uploads/'.$animal->image) }}" alt="info" style="width:100%">
												<div class="font"><p style="font-size: 16pt; color: #424242"><b>{{ $animal->title }}</b></p></div>
											</a>
										</div>
										
										<div class="w3-row">
											<div class="w3-col 12">
												<div class="w3-col s9">
												    <pt class="price"><b>{{ $animal->price }} сум</b></pt>
											    </div>
												<div class="w3-col s3">
													<div class="basket">
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;" href="javascript:;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								</li>
							@endforeach
						@else
							<div>
								<p>Нет подарочных животных.</p>
							</div>
						@endif
						
						</ul>
					</div>
					
					<div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><b><</b></button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><b>></b></button>
                    </div>
					</div>
				</div>

				<!-- Подарочные -->

				<div style="height: 50px"></div>
				<div class="w3-row">
					<h4>
						<b>
						   <a href="https://mypet.uz/store" style="color: black";><img src="{{ asset('assets/icons/gift2.png') }}" style="height: 60px; width: 60px;" alt="gift">
							Подарочные</a>
						</b>
					</h4>
					<div class="glide_second glide">
					<div class="glide__track" data-glide-el="track">
					    <ul class="row glide__slides" style="margin:0;">
					        
						@if(count($gifted_animals) > 0)
							@foreach($gifted_animals as $animal)
							<li class="glide__slide">
							    
								<div class="column" style="width: 100%; padding: 0; float: none;">
									<div class="card">
									    
										<div class="box">
											<a class="button" href="#popup1" data-id="{{ $animal->id }}">
												<div class="top-right">
													<img style="width:28px;height:28px;"
													     src="{{ asset('assets/icons/info.png') }}" alt="info">
												</div>
												<img class="imageborder" src="{{ asset('uploads/'.$animal->image) }}" alt="info" style="width:100%">
												<div class="font"><p style="font-size: 16pt; color: #424242"><b>{{ $animal->title }}</b></p></div>
											</a>
										</div>
										
										<div class="w3-row">
											<div class="w3-col 12">
												<div class="w3-col s9">
												    <pt class="price"><b>{{ $animal->price }} сум</b></pt>
											    </div>
												<div class="w3-col s3">
													<div class="basket">
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;" href="javascript:;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								</li>
							@endforeach
						@else
							<div>
								<p>Нет подарочных животных.</p>
							</div>
						@endif
						
						</ul>
					</div>
					
					<div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><b><</b></button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><b>></b></button>
                    </div>
                    <!--
                    <div class="glide__bullets" data-glide-el="controls[nav]">
                        <button class="glide__bullet" data-glide-dir="=0"></button>
                        <button class="glide__bullet" data-glide-dir="=1"></button>
                        <button class="glide__bullet" data-glide-dir="=2"></button>
                    </div>-->
				</div>
				</div>

				<!-- Рептилии -->
				<div style="height: 50px"></div>
				<div class="w3-row">
					<h4>
						<b>
							<a href="https://mypet.uz/store" style="color: black";><img src="{{ asset('assets/icons/reptile.png') }}" style="height: 46px; width: 60px;" alt="reptile">
							Рептилии</a>
						</b>
					</h4>
					
					<div class="glide_third glide">
					<div class="glide__track" data-glide-el="track">
					    <ul class="row glide__slides" style="margin:0;">
					        
						@if(count($reptile_animals) > 0)
							@foreach($reptile_animals as $animal)
							<li class="glide__slide">
							    
								<div class="column" style="width: 100%; padding: 0; float: none;">
									<div class="card">
									    
										<div class="box">
											<a class="button" href="#popup1" data-id="{{ $animal->id }}">
												<div class="top-right">
													<img style="width:28px;height:28px;"
													     src="{{ asset('assets/icons/info.png') }}" alt="info">
												</div>
												<img class="imageborder" src="{{ asset('uploads/'.$animal->image) }}" alt="info" style="width:100%">
												<div class="font"><p style="font-size: 16pt; color: #424242"><b>{{ $animal->title }}</b></p></div>
											</a>
										</div>
										
										<div class="w3-row">
											<div class="w3-col 12">
												<div class="w3-col s9">
												    <pt class="price"><b>{{ $animal->price }} сум</b></pt>
											    </div>
												<div class="w3-col s3">
													<div class="basket">
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;" href="javascript:;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								</li>
							@endforeach
						@else
							<div>
								<p>Нет подарочных животных.</p>
							</div>
						@endif
						
						</ul>
					</div>
					
					<div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><b><</b></button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><b>></b></button>
                    </div>
					</div>
					
				</div>
				
				<div class="disable"; style="height: 12px;"></div>
				<div style="height: 12px;"></div>
				
				<!-- show all (visit to store) -->
				<div>
				    <a href="https://mypet.uz/store";><button class="yeshyo default">Показать ещё</button></a>
                </div>
				
				<div class="disable"; style="height: 36px;"></div>
			</div>
			<div class="w3-col m1">
				<p></p>
			</div>
		</div>
	</div>

	{{--Popup--}}
	<div id="popup1" class="overlay">
		<div class="popup">
			<h3>Информация</h3>
			<a class="close" href="">&times;</a>
			<div class="content">
				<div class="w3-row w3-container inner-div">
					<div class="w3-col m5 w3-col s5 w3-center">
						<div style="height: 10px;"></div>
						<img src="{{ asset('assets/img/animals/default.png') }}" alt="No title" style="width:100%">
						<h5 style="color: green"><b>0</b></h5>
						<a href="#" id="singleShowForm">Купить сейчас</a>
						<hr>
						<a href="#" id="singleAddToCart">Добавить в корзину</a>
					</div>

					<div class="w3-col m7 w3-col s7">
						<div class="text-div"
						     style="max-height:400px;max-width:460px; border:1px solid #ccc; font:16px/26px Serif;overflow:auto;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
.yeshyo {
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 12px 24px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 60px;
  position: relative;
  margin: -5px -60pt; 
  top: 0%; 
  left: 50%;
}


/* Gray */
.default {
  border-color: #e7e7e7;
  color: black;
}

.default:hover {
  background: #e7e7e7;
}
</style>


@endsection