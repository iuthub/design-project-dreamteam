<?php
	
	namespace App\Admin\Controllers;
	
	use App\Animal;
	use App\Http\Controllers\Controller;
	use Encore\Admin\Controllers\HasResourceActions;
	use Encore\Admin\Form;
	use Encore\Admin\Grid;
	use Encore\Admin\Layout\Content;
	use Encore\Admin\Show;
	
	
	class AnimalController extends Controller{
		use HasResourceActions;
		
		/**
		 * Index interface.
		 *
		 * @param Content $content
		 *
		 * @return Content
		 */
		public function index(Content $content){
			$grid = $this->grid()->disableExport();
			$grid->filter(function($filter){
				$filter->disableIdFilter();
				$filter->like('title', 'Название');
				$filter->between('price', 'Цена');
			});
			
			return $content
				->header('Животные')
				->body($grid);
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
				->header('Добавить')
				->body($this->form());
		}
		
		/**
		 * Make a grid builder.
		 *
		 * @return Grid
		 */
		protected function grid(){
			$grid = new Grid(new Animal);
			
			$grid->id('Id');
			$grid->title('Название');
			$grid->image('Изображение');
			$grid->description('Описание');
			$grid->price('Цена');
			
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
			$show = new Show(Animal::findOrFail($id));
			
			$show->id('Id');
			$show->title('Название');
			$show->image('Изображение');
			$show->description('Описание');
			$show->price('Цена');
			$show->is_best('Лучшее');
			$show->is_gifted('Подарочный');
			$show->is_bird('Птицы');
			$show->is_reptile('Рептилии');
			$show->is_fish('Рыбы');
			$show->is_rodent('Грызуны');
			$show->is_insect('Насекомые');
			$show->is_aquarium('Аквариумы');
			$show->is_caged('Клетки');
			$show->is_food('Корм');
			$show->is_others('Другие');
			
			return $show;
		}
		
		/**
		 * Make a form builder.
		 *
		 * @return Form
		 */
		protected function form(){
			$form = new Form(new Animal);
			
			$form->text('title', 'Название');
			$form->image('image', 'Изображение')->default('default.png');
			$form->textarea('description', 'Описание');
			$form->number('price', 'Цена');
			$form->switch('is_best', 'Лучшее');
			$form->switch('is_gifted', 'Подарочный');
			$form->switch('is_bird', 'Птицы');
			$form->switch('is_reptile', 'Рептилии');
			$form->switch('is_fish', 'Рыбы');
			$form->switch('is_rodent', 'Грызуны');
			$form->switch('is_insect', 'Насекомые');
			$form->switch('is_aquarium', 'Аквариумы');
			$form->switch('is_caged', 'Клетки');
			$form->switch('is_food', 'Корм');
			$form->switch('is_others', 'Другие');
			
			return $form;
		}
	}
