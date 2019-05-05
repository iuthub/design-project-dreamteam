<?php
	
	namespace App\Http\Controllers;
	
	use App\Animal;
	use App\Contact;
	use Gloudemans\Shoppingcart\Facades\Cart;
	use Illuminate\Http\Request;
	
	class CartController extends Controller{
		public $contacts = null;
		
		public function __construct(){
			$this->contacts = Contact::all()->first();
		}
		
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(){
			$contacts  = $this->contacts;
			$cartItems = Cart::instance("main")->content();
			$singleItem = '0';
			
			return view('cart', compact('contacts', 'cartItems', 'singleItem'));
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request){
			$animal = Animal::find($request->input('id'));
			
			Cart::instance("main")->add([
				'id' => $animal->id,
				'name' => $animal->title,
				'qty' => 1,
				'price' => $animal->price
			])->associate('App\Animal');
			
			echo json_encode($animal->title);
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int $rowId
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($rowId){
			Cart::instance("main")->remove($rowId);
			
			return redirect()->back();
		}
		
		/**
		 * Add one to Quantity of specific item in Cart
		 *
		 * @param $rowId
		 */
		public function addOne($rowId, $singleItem){
		    $item = Cart::instance("main")->get($rowId);
			Cart::instance("main")->update($rowId, $item->qty + 1);
		    
// 			if($singleItem){
// 				$item = Cart::instance("singleItem")->get($rowId);
// 				Cart::instance("singleItem")->update($rowId, $item->qty + 1);
// 			}else{
// 				$item = Cart::instance("main")->get($rowId);
// 				Cart::instance("main")->update($rowId, $item->qty + 1);
// 			}
		}
		
		/**
		 * Subtract one to Quantity of specific item in Cart
		 *
		 * @param $rowId
		 */
		public function subtractOne($rowId, $singleItem){
		    $item = Cart::instance("main")->get($rowId);
			Cart::instance("main")->update($rowId, $item->qty - 1);
		    
// 			if($singleItem){
// 				$item = Cart::instance("singleItem")->get($rowId);
// 				Cart::instance("singleItem")->update($rowId, $item->qty - 1);
// 			}else{
// 				$item = Cart::instance("main")->get($rowId);
// 				Cart::instance("main")->update($rowId, $item->qty - 1);
// 			}
		}
	}
