<section id="do_action">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<div class="total_area">
					<ul>
						<li class="total">Общая сумма<span>{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0) }} сум</span>
						</li>
						@if(intval(\Gloudemans\Shoppingcart\Facades\Cart::subtotal(0,'','')) >= 200000)
							<li class="tax">Доставка <span>Бесплатно</span></li>
							<li class="total_with_tax">Всего
								<span>{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0) }} сум</span>
							</li>
						@elseif(intval(\Gloudemans\Shoppingcart\Facades\Cart::subtotal(0, '', '')) === 0)
							<li class="tax">Доставка <span>Бесплатно</span></li>
							<li class="total_with_tax">Всего <span>0</span></li>
						@else
							<li class="tax">Доставка <span>8000 сум</span>
							</li>
							<li class="total_with_tax">Всего
								<span>{{ number_format(intval(\Gloudemans\Shoppingcart\Facades\Cart::subtotal(0, '', '')) + 8000) }} сум</span>
							</li>
						@endif
					</ul>

					<form action="{{ route("makeOrder") }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" class="input_total" name="checkout"
						       value="{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0, '', '') }}">
						<input type="hidden" name="singleItem" value="{{ $singleItem }}">
						<input type="text" name="full_name" value="{{ old('full_name', '') }}" placeholder="Фамилия Имя" required>
						<input type="text" name="region" value="{{ old('region', '') }}" placeholder="Район" required>
						<input type="text" name="street" value="{{ old('street', '') }}" placeholder="Улица" required>
						<input type="text" name="house_num" value="{{ old('house_num', '') }}" placeholder="Номер дома/квартиры"
						       required>
						<input type="text" name="address" value="{{ old('address', '') }}" placeholder="Ориентир" required>
						<input type="text" name="extra" value="{{ old('extra', '') }}" placeholder="Дополнительная информация" required>

						<input type="email" name="email" value="{{ old('email', '') }}" placeholder="Электронная Почта (Не обязательно)">
						<div class="input-group mb-3">
							<div class="input-group-prepend" style="margin-right: 0;">
								<span class="input-group-text" id="inputGroup-sizing-default" style="background: #E6E4DF;">+998</span>
							</div>
							<input type="text" class="form-control" name="phone" value="{{ old('phone', '') }}"
							       placeholder="9X XXX XX XX" aria-label="Default"
							       aria-describedby="inputGroup-sizing-default" required>
						</div>
						<button type="submit" class="btn btn-default check_out">Отправить заявку</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>