<?php
	
	namespace App\Http\Controllers;
	
	use App\Contact;
	
	class AboutUsController extends Controller{
		public $contacts = null;
		
		public function __construct(){
			$this->contacts = Contact::first();
		}
		
		public function index(){
			$contacts = $this->contacts;
			return view('about_us', compact('contacts'));
		}
	}
