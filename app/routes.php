<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('question.index');
});

Route::get('add/question', function()
{
	return View::make('question.index');
});

Route::get('question/list', array('as' => 'listqns', function () { 
    $qn = Question::all();
    return View::make('question.list',  compact('qn'));
}));


Route::get('add/category', function()
{
	return View::make('category.index');
});

Route::get('question/add', function()
{
    if(isset($_GET)){
        //insert a quetion to database
    $qn = Question::create(array(
        'question'=>$_GET['question'],
        'type'=>$_GET['qtype'],
        'category'=>$_GET['category']
        ));
        
        //chek if it has sub answers
    if(isset($_GET['anss'])){
        print_r($_GET['anss']);
        foreach ($_GET['anss'] as $value) {
            $sub = Subquestion::create(
                    array(
                       'question_id'=>$qn->id,
                        'value'=>$value
                    ));
        }
    }
    }
//    print_r($_POST);
});

Route::post('category/add', array('as' => 'addcategory', function () { 
$msg = "successfull added";
    return View::make('category.index',  compact('msg'));
}));

Route::get('subquestion/add', array('as' => 'addaubqns', function () { 
$sub = Subquestion::create($_GET);
    return $sub;
}));

Route::get('manage/category', array('as' => 'maagecategory', function () { 
    $cat = Category::all();
    return View::make('category.manage',  compact('cat'));
}));

Route::get('manage/question', array('as' => 'maageqn', function () { 
    $qn = Question::all();
    return View::make('question.manage',  compact('qn'));
}));

Route::get('category/manage', array('as' => 'managecategory', function () { 
    $category = Category::find($_GET['id']);
    $category->value = $_GET['value'];
    $category->save();
    return $category->value;
}));

Route::get('question/manage', array('as' => 'managequestion', function () { 
    $qn = Question::find($_GET['id']);
    $qn->question = $_GET['value'];
    $qn->save();
    return $qn->question;
}));

Route::get('subquestion/manage', array('as' => 'managesubquestion', function () { 
    $qn = Subquestion::find($_GET['id']);
    $qn->value = $_GET['value'];
    $qn->save();
    return $qn->value;
}));

Route::post('category/delete', array('as' => 'deletecategory1', function () { 
    $category = Category::find($_POST['id']);
    $category->delete();
}));

Route::post('question/delete', array('as' => 'deleteqn', function () { 
    $qn = Question::find($_POST['id']);
    $sub = $qn->subquestion();
    foreach ($sub as $value) {
       $value->delete();
     }
    $qn->delete();
}));

Route::post('subquestion/delete', array('as' => 'deleteqn', function () { 
    $qn = Subquestion::find($_POST['id']);
    $qn->delete();
}));