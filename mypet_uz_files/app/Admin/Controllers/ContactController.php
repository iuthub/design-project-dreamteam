<?php
	
	namespace App\Admin\Controllers;
	
	use App\Contact;
	use App\Http\Controllers\Controller;
	use Encore\Admin\Controllers\HasResourceActions;
	use Encore\Admin\Form;
	use Encore\Admin\Grid;
	use Encore\Admin\Layout\Content;
	use Encore\Admin\Show;
	
	class ContactController extends Controller{
		use HasResourceActions;
		
		/**
		 * Index interface.
		 *
		 * @param Content $content
		 *
		 * @return Content
		 */
		public function index(Content $content){
			return $content
				->header('Контакты')
				->body($this->grid()->disableTools()->disableExport()->disableCreateButton());
		}
		
		/**
		 * Show interface.
		 *
		 * @param mixed   $id
		 * @param Content $content
		 *
		 * @return Content
		 */
		public function show($id, Content $content){
			return $content
				->header('Информация')
				->body($this->detail($id));
		}
		
		/**
		 * Edit interface.
		 *
		 * @param mixed   $id
		 * @param Content $content
		 *
		 * @return Content
		 */
		public function edit($id, Content $content){
			return $content
				->header('Редактирование')
				->body($this->form()->edit($id));
		}
		
		/**
		 * Create interface.
		 *
		 * @param Content $content
		 *
		 * @return Content
		 */
		public function create(Content $content){
			return $content
				->header('Create')
				->body($this->form());
		}
		
		/**
		 * Make a grid builder.
		 *
		 * @return Grid
		 */
		protected function grid(){
			$grid = new Grid(new Contact);
			
			$grid->id('Id');
			$grid->logo_pic('Logo pic');
			$grid->logo_name('Logo name');
			$grid->email('Email');
			$grid->phone('Phone');
			$grid->facebook_url('Facebook url');
			$grid->instagram_url('Instagram url');
			$grid->telegram_url('Telegram url');
			
			return $grid;
		}
		
		/**
		 * Make a show builder.
		 *
		 * @param mixed $id
		 *
		 * @return Show
		 */
		protected function detail($id){
			$show = new Show(Contact::findOrFail($id));
			
			$show->id('Id');
			$show->logo_pic('Logo pic');
			$show->logo_name('Logo name');
			$show->description('Description');
			$show->email('Email');
			$show->phone('Phone');
			$show->facebook_url('Facebook url');
			$show->instagram_url('Instagram url');
			$show->telegram_url('Telegram url');
			return $show;
		}
		
		/**
		 * Make a form builder.
		 *
		 * @return Form
		 */
		protected function form(){
			$form = new Form(new Contact);
			
			$form->text('logo_pic', 'Logo pic');
			$form->text('logo_name', 'Logo name');
			$form->textarea('description', 'Description');
			$form->email('email', 'Email');
			$form->mobile('phone', 'Phone')->options(['mask' => '999 99 999 99 99'])->rules('required|min:12');
			$form->text('facebook_url', 'Facebook url');
			$form->text('instagram_url', 'Instagram url');
			$form->text('telegram_url', 'Telegram url');
			
			return $form;
		}
	}
