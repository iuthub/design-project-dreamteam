@extends('template.base')

@section('content')
	<div style="height: 50px;"></div>
	<!-- for fix size of window -->
	<div class="container">
		<div class="w3-row w3-container">
			<div class="w3-col m1">
				<p></p>
			</div>
			<div class="w3-col m10">

				<h1><b>О Нас</b></h1>

        		<div class="w3-container">
        			<div class="w3-row">
        				<div class="w3-col">
        					<pt> MyPet.uz - это единственный и лучший онлайн зоомагазин в Узбекистане. В нашем магазине вы можете найти животных на любой вкус. Широкий  ассортимент состоит из животных, доставленных из России, а также животных выращиваемых у нас в Ташкенте. После выбора питомца вам предоставляется доставка в любую точку Ташкента. С нами вы легко сможете приобрести животное вашей мечты.</pt>
        				</div>
        			</div>
        
        			<div style="height: 40px;"></div>
        
        			<div class="w3-row">
        				<div class="w3-col m2">
        					<img style="width:110px;height:110px;" src="{{ asset('assets/icons/delivery.png') }}" alt="info">
        				</div>
        				<div class="w3-col m10">
        					<h6><b> Подробности доставки:</b></h6>
        					<pt> После оформления заказа животное будет доставлено в течение дня.
        					При сумме заказа больше 200,000 сум доставка -<b>БЕСПЛАТНО</b>. При сумме меньше 200,000 сум доставка составит 8,000 сум. </pt>
        				</div>
        			</div>
        
        			<div style="height: 30px;"></div>
        
        			<div class="w3-row">
        				<div class="w3-col m2">
        					<img style="max-width:110px;max-height:110px;" src="{{ asset('assets/icons/rule.png') }}" alt="info">
        				</div>
        				<div class="w3-col m10">
        					<h6><b>Правила продаж:</b></h6>
        					<pt> Напоминаем, что по правилам продажи животных, мы не несем ответственность за животное после продажи.</pt>
        				</div>
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