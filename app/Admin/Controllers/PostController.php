<?php

namespace App\Admin\Controllers;

use App\Post;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Post';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());

        // $grid->name()->display(function($userId) {
        //     return User::find($userId)->name;
        // });

        $grid->column('id', __('Id'));
        // $grid->column('user_id', __('User id'));
        $grid->column('user.name');
        $grid->column('title', __('Title'));
        $grid->column('content', __('Content'));
        $grid->column('categories', __('categories'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Post());

        // $categories = [
        //     'sports' => 'sports',
        //     'food' => 'food'
        // ];

        // $form->number('user_id', __('User id'));
        // $form->text('user.name');
        // $form->select('user_id', 'User')->options($users);
        // $users = User::all();
        // $form->select('user_id','User')->options($users);

        $form->select('user_id',__('User'))->options(User::all()->pluck('name','id'));

        // $users = User::all();
        // $usersArray = $users->toArray();
        // $form->select('user_id', 'User')->options($usersArray);

        $form->text('title', __('Title'));
        $form->textarea('content', __('Content'));
        // $form->select('categories','Category')->options($categories);
        // $form->checkbox('categories')->options(['sports' => 'Sports', 'food' => 'Food']);
        $form->radio('categories')->options(['sports' => 'Sports', 'food'=> 'Food'])->default('sports');
        return $form;
    }
}
