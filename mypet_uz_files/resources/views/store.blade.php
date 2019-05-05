@extends('template.base')

<style>
	.imgTopPicOfStore {
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
</style>

@section('content')
	<!-- Products -->
	<div class="w3-row w3-container">
		<div style="height: 50px"></div>

		<!-- top picture -->
		<img class="imgTopPicOfStore" src="{{ asset('assets/img/store/animals.jpg') }}" alt="Paris" style="width:80%;">
		<div style="height: 20px;"></div>
		<!-- Button of Left Nav -->

		<div class="tab">
			<h4 style="padding: 10px 20px"><b>Kатегории</b></h4>
			<button class="tablinks" onclick="openPet(event, 'Популярный')" id="defaultOpen"> - Популярные</button>
			<button class="tablinks" onclick="openPet(event, 'Подарочные')"> - Подарочные</button>
			<button class="dropdown-btn"> - Животные
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<button class="tablinks" onclick="openPet(event, 'Птицы')"> - Птицы</button>
				<button class="tablinks" onclick="openPet(event, 'Рептилии')"> - Рептилии</button>
				<button class="tablinks" onclick="openPet(event, 'Рыбы')"> - Рыбы</button>
				<button class="tablinks" onclick="openPet(event, 'Грызуны')"> - Грызуны</button>
				<button class="tablinks" onclick="openPet(event, 'Насекомые')"> - Насекомые</button>
			</div>
			<!-- <button class="tablinks" onclick="openPet(event, 'Скидки')">Скидки</button> -->
			<button class="tablinks" onclick="openPet(event, 'Аквариумы')"> - Аквариумы</button>
			<button class="tablinks" onclick="openPet(event, 'Клеткы')"> - Клетки</button>
			<button class="tablinks" onclick="openPet(event, 'Корма')"> - Корм</button>
			<button class="tablinks" onclick="openPet(event, 'Другие')"> - Другие</button>
		</div>


		<!-- Популярный -->
		<div id="Популярный" class="tabcontent">
			<div class="w3-row w3-container">
				<h3><b><img src="{{ asset('assets/icons/bestseller2.png') }}" style="height: 60px; width: 60px;" alt="best">
						Популярный</b></h3>
				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($best_animals) && !empty($best_animals))
						@foreach($best_animals as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($best_animals->total() > $best_animals->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($best_animals->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $best_animals->total()/$best_animals->count(); $i++)
										<li class="page-item @if($i+1 == $best_animals->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="best">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($best_animals->currentPage() == $best_animals->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет популярных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Подарочные -->
		<div id="Подарочные" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/gift2.png') }}" style="height: 60px; width: 60px;" alt="gift">
						Подарочные</b></h4>
				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($gift_animals) && !empty($gift_animals))
						@foreach($gift_animals as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($gift_animals->total() > $gift_animals->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($gift_animals->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $gift_animals->total()/$gift_animals->count(); $i++)
										<li class="page-item @if($i+1 == $gift_animals->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="gifted">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($gift_animals->currentPage() == $gift_animals->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Птицы-->
		<div id="Птицы" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/bird.ico') }}" style="height: 60px; width: 60px;" alt="bird"> Птицы</b>
				</h4>
				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($birds) && !empty($birds))
						@foreach($birds as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($birds->total() > $birds->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($birds->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $birds->total()/$birds->count(); $i++)
										<li class="page-item @if($i+1 == $birds->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="bird">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($birds->currentPage() == $birds->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Рыбы -->
		<div id="Рыбы" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/fish.png') }}" style="height: 60px; width: 60px;" alt="fish"> Рыбы</b>
				</h4>

				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($fishes) && !empty($fishes))
						@foreach($fishes as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($fishes->total() > $fishes->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($fishes->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $fishes->total()/$fishes->count(); $i++)
										<li class="page-item @if($i+1 == $fishes->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="fish">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($fishes->currentPage() == $fishes->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Рептилии -->
		<div id="Рептилии" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/reptile.png') }}" style="height: 46px; width: 60px;" alt="reptile">
						Рептилии</b></h4>

				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($reptiles) && !empty($reptiles))
						@foreach($reptiles as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($reptiles->total() > $reptiles->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($reptiles->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $reptiles->total()/$reptiles->count(); $i++)
										<li class="page-item @if($i+1 == $reptiles->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="reptile">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($reptiles->currentPage() == $reptiles->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Грызуны -->
		<div id="Грызуны" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/rodent3.png') }}" style="height: 60px; width: 60px;" alt="rodent">
						Грызуны</b></h4>

				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($rodents) && !empty($rodents))
						@foreach($rodents as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($rodents->total() > $rodents->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($rodents->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $rodents->total()/$rodents->count(); $i++)
										<li class="page-item @if($i+1 == $rodents->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="rodent">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($rodents->currentPage() == $rodents->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Насекомые -->
		<div id="Насекомые" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/insect.png') }}" style="height: 60px; width: 60px;" alt="insect">
						Насекомые</b></h4>

				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($insects) && !empty($insects))
						@foreach($insects as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($insects->total() > $insects->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($insects->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $insects->total()/$insects->count(); $i++)
										<li class="page-item @if($i+1 == $insects->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="insect">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($insects->currentPage() == $insects->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Аквариумы -->
		<div id="Аквариумы" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/aquarium.png') }}" style="height: 60px; width: 60px;" alt="aquarium">
						Аквариумы</b></h4>

				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($aquariums) && !empty($aquariums))
						@foreach($aquariums as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($aquariums->total() > $aquariums->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($aquariums->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $aquariums->total()/$aquariums->count(); $i++)
										<li class="page-item @if($i+1 == $aquariums->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="aquarium">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($aquariums->currentPage() == $aquariums->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Клеткы -->
		<div id="Клеткы" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/cells3.png') }}" style="height: 60px; width: 60px;" alt="cells3"> Клетки</b>
				</h4>

				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($caged_animals) && !empty($caged_animals))
						@foreach($caged_animals as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($caged_animals->total() > $caged_animals->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($caged_animals->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $caged_animals->total()/$caged_animals->count(); $i++)
										<li class="page-item @if($i+1 == $caged_animals->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="caged">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($caged_animals->currentPage() == $caged_animals->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Корма -->
		<div id="Корма" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/korm.png') }}" style="height: 60px; width: 60px;" alt="food"> Корм</b>
				</h4>

				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($foods) && !empty($foods))
						@foreach($foods as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($foods->total() > $foods->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($foods->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $foods->total()/$foods->count(); $i++)
										<li class="page-item @if($i+1 == $foods->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="food">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($foods->currentPage() == $foods->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>

		<!-- Другие -->
		<div id="Другие" class="tabcontent">
			<div class="w3-row w3-container">
				<h4><b><img src="{{ asset('assets/icons/box-other.png') }}" style="height: 60px; width: 60px;" alt="box-other">
						Другие</b></h4>

				<div class="row">
					<!-- w3-disabled -> if u want to make disabled product, u should add to grid of column-->
					@if(isset($others) && !empty($others))
						@foreach($others as $animal)
							<div class="column">
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
														<a id="addToCart" data-id="{{ $animal->id }}" style="cursor:pointer;">
															<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																	     alt="basket">
														</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
						@endforeach

						@if($others->total() > $others->count())
							<nav aria-label="Page navigation example" class="mt-5 pagination_part" style="width: 100%">
								<ul class="pagination justify-content-center">
									<li class="page-item @if($others->currentPage() == 1) disabled @endif">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@for ($i = 0; $i < $others->total()/$others->count(); $i++)
										<li class="page-item @if($i+1 == $others->currentPage()) active @endif">
											<a class="page-link" href="#" id="page-link" data-page="{{ $i+1 }}"
											   data-type="others">{{ $i+1 }}</a>
										</li>
									@endfor
									<li class="page-item @if($others->currentPage() == $others->lastPage()) disabled @endif">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						@endif
					@else
						<p>Нет подарочных животных.</p>
					@endif
				</div>
			</div>
		</div>
	</div>


	{{--Popup--}}
	<div id="popup1" class="overlay">
		<div class="popup" style="height: fit-content;">
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
@endsection