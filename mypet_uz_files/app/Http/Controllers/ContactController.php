<?php
	
	namespace App\Http\Controllers;
	
	use App\Contact;
	
	class ContactController extends Controller{
		public $contacts = null;
		
		public function __construct(){
			$this->contacts = Contact::first();
		}
		
		public function index(){
			$contacts = $this->contacts;
			
			return view('contacts', compact('contacts'));
		}
	}
