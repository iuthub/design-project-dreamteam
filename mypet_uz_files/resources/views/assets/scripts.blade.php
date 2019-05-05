<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/slideshow.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/top-button.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/popup.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/mobile-nav.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/left-nav.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dropdown.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/toastr.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/glide.min.js') }}"></script>

<!-- new script -->
<script>
var n;
if (window.matchMedia("screen and (max-width: 320px)").matches) {
  n=1;
} else {
  if (window.matchMedia("screen and (max-width: 800px)").matches) {
  n=2;
} else {
  n=4;
}
}

new Glide('.glide_third', {
  type: 'carousel',
  startAt: 0,
  perView: n
  
}).mount()


  new Glide('.glide_second', {
  type: 'carousel',
  startAt: 0,
  perView: n
  
}).mount()

new Glide('.glide_one', {
  type: 'carousel',
  startAt: 0,
  perView: n
  
}).mount()
</script>



{{--Script to Add to Cart--}}
<script>
	$(document).on('click', '.row #addToCart', function(){
		token = "{{ csrf_token() }}"

		$.ajax({
			url: '/cart',
			type: 'POST',
			data: {
				_token: token,
				id: $(this).data('id')
			},
			datatype: 'json',
			success: function(response){
				var data = JSON.parse(response)
				toastr.success(data + ' добавлен/а в корзину.')
			},
			error: function(){
				console.log('Error')
			}
		})
	})
</script>

{{--Increment & Decrement Quantity of Item in Cart--}}
<script>
	Number.prototype.format = function(n, x){
		var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')'
		return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,')
	}

	// decrement
	$(document).on('click', '.cart_quantity .cart_quantity_down', function(e){
		e.preventDefault()
		var input = $(this).next()
		if(parseInt(input.val()) > 1){
			input.val(parseInt(input.val()) - 1)

			var parent = $(this).parent().parent()
			var price = parseInt(parent.prev().find('p').text())
			var total = parent.next().find('.cart_total_price').text(price * parseInt(input.val()) + ' сум')

			var tax = 0
			var checkout_total = $('.total_area ul').find('.total span')
			var total_sum = parseInt(checkout_total.text().replace(/,/g, '')) - price
			checkout_total.text(total_sum.format() + ' сум')

			if(total_sum < 200000){
				$('.total_area .tax').html('Доставка <span>8000</span>')
				tax = 1
			}

			$('.total_area .total_with_tax').html('Всего <span>' + (total_sum + tax * 8000).format() + ' сум</span>')
			$('.total_area form .input_total').val((total_sum + tax * 8000))

			$(this).attr('disabled', true)

			$.ajax({
				url: '/cart/subtract/' + $(this).data('id') + '/' + $(this).data('singleitem'),
				type: 'GET',
				success: function(response){
					toastr.success('Успешно.')
					$(this).attr('disabled', false)
				},
				error: function(){
					toastr.success('Ошибка.')
				}
			})
		}
	})

	// increment
	$(document).on('click', '.cart_quantity .cart_quantity_up', function(e){
		e.preventDefault()
		var input = $(this).prev()
		input.val(parseInt(input.val()) + 1)

		var parent = $(this).parent().parent()
		var price = parseInt(parent.prev().find('p').text())
		var total = parent.next().find('.cart_total_price').text((price * parseInt(input.val())).format() + ' сум')

		var tax = 1
		var checkout_total = $('.total_area ul').find('.total span')
		var total_sum = parseInt(checkout_total.text().replace(/,/g, '')) + price
		checkout_total.text(total_sum.format() + ' сум')


		if(total_sum >= 200000){
			$('.total_area .tax').html('Доставка <span>Бесплатно</span>')
			tax = 0
		}

		$('.total_area .total_with_tax').html('Всего <span>' + (total_sum + tax * 8000).format() + ' сум</span>')
		$('.total_area form .input_total').val((total_sum + tax * 8000))

		$(this).attr('disabled', true)

		$.ajax({
			url: '/cart/add/' + $(this).data('id') + '/' + $(this).data('singleitem'),
			type: 'GET',
			success: function(response){
				toastr.success('Успешно.')
				$(this).attr('disabled', false)
			},
			error: function(){
				toastr.success('Ошибка.')
			}
		})

	})
</script>

{{--Toastr Notification--}}
<script>
	@if(\Illuminate\Support\Facades\Session::has('validation_error'))
	toastr.error('Ошибка. Проверьте ваши данные.')
	@endif
</script>

{{--Script for Sending Mail--}}
<script>
	$('.total_area .check_out').on('click', function(e){
		e.preventDefault()
		$(this).attr('disabled', 'disabled')

		toastr.info('Отправляется... Подождите.')

		$('.total_area form').submit()
	})

	@if(\Illuminate\Support\Facades\Session::has('mail_sent') && \Illuminate\Support\Facades\Session::get('mail_sent'))
	toastr.success('Заявка принята.')
	@endif

	@if(\Illuminate\Support\Facades\Session::has('empty_cart') && \Illuminate\Support\Facades\Session::get('empty_cart'))
	toastr.warning('Корзина Пуста.')
	@endif
</script>

{{-- Popup script --}}
<script>
	Number.prototype.format = function(n, x){
		var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')'
		return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,')
	}

	$(document).on('click', '.column .card .button', function(e){
		e.preventDefault()

		$('#popup1').css({
			'visibility': 'visible',
			'opacity': 1
		})

		$.ajax({
			url: '/animal/' + $(this).data('id'),
			type: 'GET',
			success: function(response){
				var data = JSON.parse(response)

				$('#popup1 img').attr('src', '/uploads/' + data.image)
				$('#popup1 img').attr('alt', data.title)
				$('#popup1 h5 b').text(parseInt(data.price).format() + ' сум')
				$('#popup1 #singleAddToCart').data('id', data.id)
				$('#popup1 #singleShowForm').data('id', data.id)

				if(data.description != null){
					$('#popup1 .w3-col.m7 div').html(data.description)
				}else{
					$('#popup1 .w3-col.m7 div').text('Нет описания.')
				}
			},
			error: function(){
				toastr.error('Ошибка. Перезагрузите страницу.')
			}
		})
	})

	$(document).on('click', '#popup1 #singleShowForm', function(e){
		e.preventDefault()

		var token = "{{ csrf_token() }}"
		var id = $(this).data('id')

		$.ajax({
			url: '/cart',
			type: 'POST',
			data: {
				_token: token,
				id: id
			},
			datatype: 'json',
			success: function(response){
				// var data = JSON.parse(response)
				// toastr.success(data + ' добавлен/а в корзину.')
				window.location = "/cart"
			},
			error: function(){
				toastr.error('Ошибка. Перезагрузите страницу.')
			}
		})
	})

	$(document).on('click', '#popup1 #singleAddToCart', function(e){
		e.preventDefault()

		var token = "{{ csrf_token() }}"
		var id = $(this).data('id')

		$.ajax({
			url: '/cart',
			type: 'POST',
			data: {
				_token: token,
				id: id
			},
			datatype: 'json',
			success: function(response){
				var data = JSON.parse(response)
				toastr.success(data + ' добавлен/а в корзину.')
			},
			error: function(){
				toastr.error('Ошибка. Перезагрузите страницу.')
			}
		})
	})

	$(document).on('click', '#popup1 .close', function(e){
		e.preventDefault()

		$('#popup1').css({
			'visibility': 'hidden',
			'opacity': 0
		})
	})
</script>


{{--Pagination--}}
<script>
	$('.pagination_part .page-link').on('click', function(e){
		e.preventDefault()
        
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        
		var row = $(this).parents('.row')
		var parent = $(this).parent('.page-item')

		$.ajax({
			url: '/animals/' + $(this).data('type') + '/' + $(this).data('page'),
			type: 'GET',
			success: function(response){
				var data = JSON.parse(response)

				row.find('.column').remove()
				parent.siblings().removeClass('active')
				parent.addClass('active')

				for(var animal of data){
					var column = `<div class="column">
								<div class="card">
									<div class="box">
										<a class="button" href="#popup1" data-id="` + animal['id'] + `">
											<div class="top-right">
												<img style="width:28px;height:28px;"
												     src="{{ asset('assets/icons/info.png') }}" alt="info">
											</div>
											<img src="/uploads/` + animal['image'] + `" alt="info" style="width:100%">
											<div class="font"><p style="font-size: 16pt; color: #424242"><b>` + animal['title'] + `</b></p></div>
										</a>
									</div>
									
										<div class="w3-row">
											<div class="w3-col 12">
												<div class="w3-col s9">
													<pt class="price"><b>` + animal['price'] + ` сум</b></pt>
												</div>
												<div class="w3-col s3">
														<div class="basket">
															<a id="addToCart" data-id="` + animal['id'] + `" style="cursor:pointer;">
																<img style="width:28px;height:28px;" src="{{ asset('assets/icons/basket.png') }}"
																     alt="basket">
															</a>
														</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>`

					row.prepend(column)
				}
			},
			error: function(){
				toastr.error('Ошибка. Перезагрузите страницу.')
			}
		})
	})
</script>