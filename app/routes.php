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
	$qn = Question::all();
    return View::make('question.list',  compact('qn'));
});

Route::get('/sub/{id}', function($id)
{
	$cat = Category::find($id);
    return View::make('question.listcat',  compact('cat'));
});


Route::get('add/question', function()
{
	return View::make('question.index');
});

Route::get('order/question/{id}', function($id)
{   
         $cat = Category::find($id);
        $qn = Question::orderBy('ordering', 'asc')->get();
	return View::make('question.order',  compact("qn","cat"));
});

Route::get('category/question/sub/{id}', function($id)
{   
        $catt = Category::find($id);
        $cat = Category::lists('value','id');
        $qn = Question::orderBy('ordering', 'asc')->get();
	return View::make('question.categorize',  compact("qn","cat","catt"));
});

Route::get('question/list', array('as' => 'listqns', function () { 
    $qn = Question::orderBy('ordering', 'asc')->get();
//    Mail::send('question.fill', compact('qn'), function($message) {
//        $message->to('kelvinmbwilo@gmail.com', 'Kelvin Mbwilo')->subject('Welcome to or questionaire!');
//     });
    return View::make('question.fill',  compact('qn'));
}));

Route::post('question/send', array('as' => 'sendqns', function () { 
    $qn = Question::orderBy('ordering', 'asc')->get();
    Mail::send(url("/"), function($message) {
        $message->to($_POST['email'], '')->subject('Welcome to or questionaire!');
     });
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
        $qn->answer = $_GET['subtype'];
        $qn->save();
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
Category::create(array(
    "value"=>Input::get("value")
));
$msg = "successfull added";
    return View::make('category.index')->with("msg",$msg);
}));

Route::get('subquestion/add', array('as' => 'addaubqns', function () { 
$sub = Subquestion::create($_GET);
    return $sub;
}));

Route::get('manage/category', array('as' => 'maagecategory', function () { 
    $cat = Category::all();
    return View::make('category.manage',  compact('cat'));
}));

Route::get('manage/question/{id}', array('as' => 'maageqn', function ($id) { 
    $cat = Category::find($id);
    $qn = Question::all();
    return View::make('question.manage',  compact('qn','qn1','cat'));
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

Route::post('question/answer', array( 'as'=>'ansqn' , function(){
foreach ($_POST as $key => $value) {
    $key = preg_replace("/[^0-9]/","",$key);
    if(is_array($value)){
        
        $v= implode(",", $value);
        Answer::create(
                array('question_id'=>$key,
                    'answer'=>$v)
                );
    }else{
        Answer::create(
                array('question_id'=>$key,
                    'answer'=>$value)
                );
    }
    $qn = Question::orderBy('ordering', 'asc')->get();
    return View::make('question.fill',  compact('qn'));
}
}));

Route::post('question/order/{id}', array( 'as'=>'orderqn' , function($id){
foreach ($_POST as $key => $value) {
    $key = preg_replace("/[^0-9]/","",$key);
    $qst = Question::find($key);
    if($qst){
        $qst->ordering = $value;
        $qst->save();
    
    echo $key ."-".$qst->ordering."-".$qst->question. "<br>";
        }
}
//$cat = Category::find($id);
//$qn = Question::orderBy('ordering', 'asc')->get();
//return View::make('question.order',  compact("qn","cat"));
}));


Route::post('question/categorize/{id}', array( 'as'=>'orderqn' , function($id){
foreach ($_POST as $key => $value) {
    $key = preg_replace("/[^0-9]/","",$key);
    $qst = Question::find($key);
    if($qst){
        $qst->category = $value;
        $qst->save();
    }
        
}
    
    $catt = Category::find($id);
    $cat = Category::lists('value','id');
    $qn = Question::orderBy('ordering', 'asc')->get();
    return View::make('question.categorize',  compact("qn","cat","catt"));
}));

