<?php
	
	namespace App\Mail;
	
	use Illuminate\Bus\Queueable;
	use Illuminate\Mail\Mailable;
	use Illuminate\Queue\SerializesModels;
	
	class OrderMail extends Mailable{
		use Queueable, SerializesModels;
		
		public $data;
		
		/**
		 * Create a new message instance.
		 *
		 * @param $data
		 */
		public function __construct($data){
			$this->data = $data;
		}
		
		/**
		 * Build the message.
		 *
		 * @return $this
		 */
		public function build(){
			$data = $this->data;
			return $this->view('emails.index', compact('data'));
		}
	}
