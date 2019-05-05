@extends('template.base')

@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"></td>
							<td class="description">Название</td>
							<td class="price">Цена</td>
							<td class="quantity">Кол-во</td>
							<td class="total">Всего</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if(count($cartItems) > 0)
							@foreach($cartItems as $rowId => $item)
								<tr>
									<td class="cart_product">
										<img src="{{ asset('uploads/'.$item->model->image) }}" alt="{{ $item->name }}">
									</td>
									<td class="cart_description">
										<h4><a href="#">{{ $item->name }}</a></h4>
									</td>
									<td class="cart_price">
										<p>{{ $item->price }} сум</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<a class="cart_quantity_down" href="#" style="text-decoration: none;" data-id="{{ $rowId }}"
											   data-singleitem="{{ $singleItem }}">
												- </a>
											<input disabled='disabled' class="cart_quantity_input" type="text" name="quantity"
											       value="{{ $item->qty }}"
											       autocomplete="off"
											       size="1">
											<a class="cart_quantity_up" href="#" style="text-decoration: none;" data-id="{{ $rowId }}"
											   data-singleitem="{{ $singleItem }}"> + </a>
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">{{ number_format($item->price * $item->qty, 0) }} сум</p>
									</td>
									@if(!$singleItem)
									<td class="cart_delete">
										<form action="{{ route('cart.destroy', ['rowId'=>$item->rowId]) }}" method="POST">
											<input class="btn btn-default" type="submit" value="X"/>
											<input type="hidden" name="_method" value="delete"/>
											{!! csrf_field() !!}
										</form>
									</td>
									@endif
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="6" style="color: #A1CB5F; font-size: 24px; padding-top: 10px;">Корзина пуста.</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	@include('partials.form')
@endsection