<!-- button of top & basket -->
<div onclick="topFunction()" id="topB" title="Go to top"><img style="width:45px; height:45px;"
                                                              src="{{ asset('assets/icons/top.png') }}" alt="top"></div>
<a href="{{ route('cart.index') }}"><img id="basketB" style="width:45px;height:45px;" src="{{ asset('assets/icons/basket.png') }}" alt="top"></a>

<!-- Navbar (sit on top) -->
<div class="w3-top">
	<div class="w3-bar w3-white w3-card" id="myNavbar" style="height: 50px">
		<a href="{{ route('index') }}" style="padding: 10px 10px">
			<img style="width:68px; height:42px;" src="{{ asset('assets/img/main/logo-pic.png') }}" alt="logo-pic">
			<img style="width:148px; height:48px;" src="{{ asset('assets/img/main/logo-name.png') }}" alt="logo-name"
			     @if(\Illuminate\Support\Facades\Route::currentRouteName()=='store.index') class="logoName" @endif>
		</a>

	@if(\Illuminate\Support\Facades\Route::currentRouteName()=="store.index")
		<!-- Button of left nav for mobile -->
			<select id="mobileNav"
			        style="width: 200px; height: 30px; padding:center; padding-bottom: center; border-radius: 5px; border-color: ;  position: relative; display: none;"
			        class="category" onchange="openMob()">
				<span>Категории</span>
				<option class="tablinks" value="Популярный" >- Популярный</option>
				<option class="tablinks" value="Подарочные">- Подарочные</option>
				<option class="tablinks" href="#top" value="Птицы">- Птицы</option>
				<option class="tablinks" href="#top" value="Рептилии">- Рептилии</option>
				<option class="tablinks" value="Рыбы">- Рыбы</option>
				<option class="tablinks" value="Грызуны">- Грызуны</option>
				<option class="tablinks" value="Насекомые">- Насекомые</option>
				<option class="tablinks" value="Аквариумы">- Аквариумы</option>
				<option class="tablinks" value="Клеткы">- Клеткы</option>
				<option class="tablinks" href="#top" value="Корма">- Корма</option>
				<option class="tablinks" value="Другие">- Другие</option>
			</select>
	@endif

	<!-- Right-sided navbar links -->
		<div class="w3-right w3-hide-small" style="padding: 6px 6px">
			<a href="{{ route('index') }}"
			   class="w3-bar-item w3-button @if(\Illuminate\Support\Facades\Route::currentRouteName() == "index") active @endif">
				Главная </a>
			<a href="{{ route('store.index') }}"
			   class="w3-bar-item w3-button @if(\Illuminate\Support\Facades\Route::currentRouteName() == "store.index") active @endif">
				Магазин </a>
			<a href="{{ route('about.index') }}"
			   class="w3-bar-item w3-button @if(\Illuminate\Support\Facades\Route::currentRouteName() == "about.index") active @endif">
				О нас </a>
			<a href="{{ route('contacts.index') }}"
			   class="w3-bar-item w3-button @if(\Illuminate\Support\Facades\Route::currentRouteName() == "contacts.index") active @endif">
				Контакты </a>
			<a>
				<img style="width:30px;height:30px; padding: 1px" src="{{ asset('assets/icons/search.png') }}" alt="search">
			</a>
		</div>

		<!-- Hide right-floated links on small screens and replace them with a menu icon -->
		<a href="javascript:void(0)" style="padding: 14px 14px"
		   class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
			<i class="fa fa-bars"></i>
		</a>

	</div>
</div>


<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large"
     style="display:none" id="mySidebar">
	<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
	<a href="{{ route('index') }}" onclick="w3_close()"
	   class="w3-bar-item w3-button @if(\Illuminate\Support\Facades\Route::currentRouteName() == "index") active @endif">
		Главный </a>
	<a href="{{ route('store.index') }}" onclick="w3_close()"
	   class="w3-bar-item w3-button @if(\Illuminate\Support\Facades\Route::currentRouteName() == "store.index") active @endif">
		Магазин </a>
	<a href="{{ route('about.index') }}" onclick="w3_close()"
	   class="w3-bar-item w3-button @if(\Illuminate\Support\Facades\Route::currentRouteName() == "about.index") active @endif">
		О нас </a>
	<a href="{{ route('contacts.index') }}" onclick="w3_close()"
	   class="w3-bar-item w3-button @if(\Illuminate\Support\Facades\Route::currentRouteName() == "contacts.index") active @endif">
		Кантакты </a>
</nav>