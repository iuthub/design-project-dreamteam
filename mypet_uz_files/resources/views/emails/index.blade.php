<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
		      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Заказ</title>
	</head>
	<body>
		<h1>Новая заявка</h1>
		<h3>Общая цена: {{ number_format($data['checkout'], 0) }} сум</h3>

		<hr>

		<h3>Имя покупателя: {{ $data['full_name'] }}</h3>
		<h3>Телефон покупателя: {{ $data['phone'] }}</h3>
		@if($data['email'])
			<h3>Электроная почта: {{ $data['email'] }}</h3>
		@endif
		<h3>Район: {{ $data['region'] }}</h3>
		<h3>Улица: {{ $data['street'] }}</h3>
		<h3>Номер дома/квартиры: {{ $data['house_num'] }}</h3>
		<h3>Ориентир: {{ $data['address'] }}</h3>
		@if($data['extra'])
			<h3>Дополнительная информация: {{ $data['extra'] }}</h3>
		@endif
		<hr>

		@foreach($data['animals'] as $rowKey=>$animal)
			<h3>Название: {{ $animal->name }}</h3>
			<h3>Количество: {{ $animal->qty }}</h3>
			<h3>Цена: {{ number_format(intval($animal->price)*intval($animal->qty), 0) }} сум</h3>
			<hr>
		@endforeach
	</body>
</html>