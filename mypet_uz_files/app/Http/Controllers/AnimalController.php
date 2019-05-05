<?php
	
	namespace App\Http\Controllers;
	
	use App\Animal;
	use App\Contact;
	use Illuminate\Http\Request;
	
	class AnimalController extends Controller{
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
			$animals        = Animal::all();
			$best_animals   = $animals->where('is_best', '=', true)->take(12);
			$gifted_animals = $animals->where('is_gifted', '=', true)->take(12);
			$reptile_animals  = $animals->where('is_reptile', '=', true)->take(12);
			$contacts       = $this->contacts;
			
			
			return view('index', compact('best_animals', 'gifted_animals', 'reptile_animals', 'contacts'));
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create(){
			//
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request){
			//
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  int $id
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function show($id){
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int $id
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function edit($id){
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  int                      $id
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, $id){
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int $id
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id){
			//
		}
		
		/**
		 * Return specific Animal by id
		 *
		 * @param $id
		 */
		public function getAnimal($id){
			$animal = Animal::find($id);
			
			echo json_encode($animal);
		}
	}
