<!--                                        Bismillahir rahmanir rahim                                  -->
<!DOCTYPE html>
<html lang="ru">
	<head>
	
	
	
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136022549-1"></script>
                <script>
                     window.dataLayer = window.dataLayer || [];
                     function gtag(){dataLayer.push(arguments);}
                     gtag('js', new Date());

                     gtag('config', 'UA-136022549-1');
                </script>
                
                
	
	
	
	
		<title>Интернет Магазин Животных в Ташкенте - mypet.uz</title>
		<meta charset="UTF-8">
		
		<meta>
		<meta name="description" content="Интернет Магазин Животных в Ташкенте - mypet.uz">
        <meta name="keywords" content="Магазин Животных, Интернет Магазин, Животных в Ташкенте, сайт животных, купить животных, купить популярный животных, популярный животных в
        ташкенте, купить подарочные животных, подарочные животных в ташкенте, купить птицы, птицы в ташкенте, купить птицы в ташкенте, купить рептилии, рептилии в ташкенте,
        рептилии купить в ташкенте, купить рыбы, рыбы в ташкенте, купить рыбы в ташкенте, купить грызуны в ташкенте, купить грызуны, грызуны в ташкенте, купить насекомые, 
        насекомые в ташкенте, купить насекомые в ташкенте, купить птицы, птицы в ташкенте, купить аквариумые, аквариумые в ташкенте, купить клеткы, купить клеткы в ташкенте, 
        в ташкенте, купить корма, корма в ташкенте, купить корма в ташкенте, ">
        <meta name="authors" content="Nazrulla Sadulaev, Sherzod Abdulxalilov, Rustam Zoirov, Azimjon Akhmadov">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}">
		{{-- icon --}}
		<link rel="shortcut icon" href="{{ asset('assets/img/main/logo-pic.png') }}" type="image/x-icon">

		{{-- styles --}}
		@include('assets.styles')
		
                
                
	</head>

	<body>
		{{-- header --}}
		@include('partials.header')

		{{-- dynamic content --}}
		@yield('content')

		{{-- footer --}}
		@include('partials.footer')

		{{-- scripts --}}
		@include('assets.scripts')
	</body>
</html>