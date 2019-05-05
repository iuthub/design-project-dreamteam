<?php
	
	namespace App\Http\Controllers;
	
	use App\Animal;
	use App\Contact;
	use App\Mail\OrderMail;
	use Gloudemans\Shoppingcart\Facades\Cart;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Mail;
	use Illuminate\Support\Facades\Session;
	use Illuminate\Support\Facades\Validator;
	
	class OrderController extends Controller{
		/**
		 * @param Request $request
		 *
		 * @return \Illuminate\Http\RedirectResponse
		 *
		 */
		public function sendMail(Request $request){
			$contacts = Contact::first();
			
			$validator = Validator::make($request->all(), [
				'checkout' => 'required',
				'full_name' => 'required|max:255',
				'email' => 'present|max:255',
				'region' => 'required|max:255',
				'street' => 'required|max:255',
				'house_num' => 'required|max:255',
				'address' => 'required|max:255',
				'phone' => 'required|max:255',
			]);
			
			if($validator->fails()){
				Session::flash('validation_error', true);
				
				return redirect()->route('cart.index')
					->withErrors($validator)
					->withInput();
			}
			
			$data = $request->all();
			
			if($request->input('singleItem') == "1"){
				$data['animals'] = Cart::instance("singleItem")->content();
			}else{
				$data['animals'] = Cart::instance("main")->content();
			}
			
			
			if(intval($data['checkout']) <= 0){
				Session::flash('empty_cart', true);
				return redirect()->back()->withInput();
			}
			
			try{
				Mail::to($contacts->email)->send(new OrderMail(($data)));
//				Mail::to('d.valiev@student.inha.uz')->send(new OrderMail(($data)));
			}catch(\Exception $e){
				Session::flash('mail_sent', false);
				return redirect()->back()->withInput();
			}
			
			if(count(Mail::failures()) == 0){
				Session::flash('mail_sent', true);
			}else{
				Session::flash('mail_sent', false);
			}
			return redirect()->route('index');
		}
		
		
		public function showForm($id){
			$contacts = Contact::first();
			$animal   = Animal::find(intval($id));
			
			Cart::instance('singleItem')->destroy();
			Cart::instance('singleItem')->add([
				'id' => $animal->id,
				'name' => $animal->title,
				'qty' => 1,
				'price' => $animal->price
			])->associate('App\Animal');
			
			
			$cartItems  = Cart::instance('singleItem')->content();
			$singleItem = true;
			
			return view('cart', compact('cartItems', 'contacts', 'singleItem'));
		}
	}
