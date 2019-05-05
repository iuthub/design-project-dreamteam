@extends('template.base')

@section('content')
	<div style="height: 50px;"></div>
	<div class="container"><!-- for fix size of window -->
		<div class="w3-row w3-container">
			<div class="w3-col m1">
				<p></p>
			</div>
			<div class="w3-col m10">
				<div style="height:75px;"></div>
				<h1>Наши контакты</h1>
				<div class="w3-col m3" style="text-align: left;">
    			<p><img src="{{ asset('assets/icons/mail.png') }}" style="height: 20px; width: 20px;" alt="mail">Почта:</p>
    			<p>{{ $contacts->email }}</p>
    			<p><img src="{{ asset('assets/icons/phone.png') }}" style="height: 16px; width: 16px;" alt="phone">Телефон:</p>
    			<p>+{{ $contacts->phone }}</p><p>+998 91 165 64 46</p><p>+998 93 587 88 78</p>
    
    			<h4><b>Подпишитесь на нас</b></h4>
    			<div class="w3-xlarge w3-section">
    				<a href="{{ $contacts->facebook_url }}"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    				<a href="{{ $contacts->instagram_url }}"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    				<a href="{{ $contacts->telegram_url }}"><i class="fa fa-telegram w3-hover-opacity"></i></a>
    			</div>
		        </div>
			</div>
			<div class="w3-col m1">
				<p></p>
			</div>
		</div>
	</div>
	<!-- end of fixed the size of window-->
@endsection