<!-- Footer -->
<div style="height: 40px"></div>
<footer class="w3-center w3-light-grey w3-padding-64">
	<div class="w3-container w3-row">
		<div class="w3-col m4">
			<a href="#">
				<img style="width:152px; height:96px;" src="{{ asset('assets/img/main/logo-pic.png') }}" alt="logo-pic">
			</a>
			<a href="#">
				<img style="width:288px; height:86px;" src="{{ asset('assets/img/main/logo-name.png') }}" alt="logo-pic">
			</a>
			<p>{!! $contacts->description !!}</p>
		</div>

		<div class="w3-col m1"><p></p></div>

		<div class="w3-col m4" style="text-align: left;">
			<h4><b>Магазин</b></h4>
			<div class="w3-row">
				<a href="https://mypet.uz/store">
					<div class="w3-col m6">
						<p>- Популярный</p>
						<p>- Подарочные</p>
						<p>- Птицы</p>
						<p>- Рептилии</p>
						<p>- Рыбы</p>
						<p>- Грызуны</p>
					</div>
					<div class="w3-col m6">
						<p>- Насекомые</p>
						<p>- Аквариумы</p>
						<p>- Клеткы</p>
						<p>- Корма</p>
						<p>- Другие</p>
					</div>
				</a>
			</div>
		</div>

		<div class="w3-col m3" style="text-align: left;">
			<h4><b>O нас</b></h4>
			<p><img src="{{ asset('assets/icons/mail.png') }}" style="height: 20px; width: 20px;" alt="mail">Почта:</p>
			<p>{{ $contacts->email }}</p>
			<p><img src="{{ asset('assets/icons/phone.png') }}" style="height: 16px; width: 16px;" alt="phone">Телефон:</p>
			<p>+{{ $contacts->phone }}</p>

			<h4><b>Подпишитесь на нас</b></h4>
			<div class="w3-xlarge w3-section">
				<a href="{{ $contacts->facebook_url }}"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
				<a href="{{ $contacts->instagram_url }}"><i class="fa fa-instagram w3-hover-opacity"></i></a>
				<a href="{{ $contacts->telegram_url }}"><i class="fa fa-telegram w3-hover-opacity"></i></a>
			</div>
		</div>
	</div>

</footer>