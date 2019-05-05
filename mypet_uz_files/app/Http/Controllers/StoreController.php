<?php
	
	namespace App\Http\Controllers;
	
	use App\Animal;
	use App\Contact;
	
	class StoreController extends Controller{
		protected $contacts = null;
		protected $per_page = 20;
		
		public function __construct(){
			$this->contacts = Contact::first();
		}
		
		/**
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 *
		 */
		public function index(){
			$per_page = $this->per_page;
			$contacts = $this->contacts;
//			$animals = Animal::where('title', 'LIKE', '%');
//			$best_animals = $animals->where('is_best', '=', 1)->paginate(8);
//			$gift_animals = $animals->where('is_gifted', '=', 1)->paginate(8);
			
			$best_animals  = Animal::where('is_best', '=', 1)->paginate($per_page);
			$gift_animals  = Animal::where('is_gifted', '=', 1)->paginate($per_page);
			$birds         = Animal::where('is_bird', '=', 1)->paginate($per_page);
			$reptiles      = Animal::where('is_reptile', '=', 1)->paginate($per_page);
			$fishes        = Animal::where('is_fish', '=', 1)->paginate($per_page);
			$rodents       = Animal::where('is_rodent', '=', 1)->paginate($per_page);
			$insects       = Animal::where('is_insect', '=', 1)->paginate($per_page);
			$aquariums     = Animal::where('is_aquarium', '=', 1)->paginate($per_page);
			$caged_animals = Animal::where('is_caged', '=', 1)->paginate($per_page);
			$foods         = Animal::where('is_food', '=', 1)->paginate($per_page);
			$others        = Animal::where('is_others', '=', 1)->paginate($per_page);
			
			return view('store', compact('contacts', 'best_animals', 'gift_animals', 'birds',
				'reptiles', 'fishes', 'rodents', 'insects', 'aquariums', 'caged_animals', 'foods', 'others'));
		}
		
		public function get_by_page($type, $page){
			$per_page = $this->per_page;
			$type = "is_".$type;
			
			$animals = Animal::where($type, '=', 1)->skip($per_page*($page-1))->take($per_page)->get();
			
			echo json_encode($animals);
		}
	}
