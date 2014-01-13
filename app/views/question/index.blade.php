@extends('master')

@section('heading')
  Add Question
@stop

@section('content')
   {{ Form::open(array("url"=>"/patient/add/basic","class"=>"form-horizontal")) }}
  <div class="col-sm-6 col-sm-offset-1">
      <div class='form-group'>
        {{ Form::label('category', 'Category',array('class'=>'control-label col-sm-4')) }}
        <div class='col-sm-8'>{{ Form::select('category',Category::lists('value','id'),'Gender',array('class'=>'form-control','required'=>'requiered')) }}  </div>
    </div>
      
      <div class='form-group'>
        {{ Form::label('type', 'Question Type',array('class'=>'control-label col-sm-4')) }}
        <div class='col-sm-8'>{{ Form::select('type',array('open'=>"Open Ended",'closed'=>"Closed Ended"),'Gender',array('class'=>'form-control','required'=>'requiered')) }}  </div>
    </div>
    <div class='form-group'>
        {{ Form::label('question', 'Question',array('class'=>'control-label col-sm-4')) }}
        <div class='col-sm-8'>{{ Form::textarea('question','',array('class'=>'form-control','placeholder'=>'Question')) }} </div>
    </div>
      
  </div>
   <div class='col-sm-5'>
       <div class="row" id='subquestions'>
           <h4 class="text-center">Directed Answers</h4>
           {{ Form::select('subtype',array('one'=>"Only Single Answer Allowed",'many'=>"Allow More Than One Answer"),'',array('class'=>'form-control','required'=>'requiered','id'=>'subtype')) }} 
           <ul>
               
           </ul>
           <div class='form-group'>
                {{ Form::label('answer', 'Answer',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::textarea('answer','',array('class'=>'form-control','placeholder'=>'Question', 'rows'=>'4')) }} </div>
            </div>
           <div class='form-group text-center'>
        {{ Form::button('Add Another',array('class'=>'btn btn-primary btn-xs','id'=>'addanother')) }}
    </div>
       </div>
   </div>
   <div class='col-sm-12 form-group text-center'>
        {{ Form::button('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
        
    </div>
  {{ Form::close() }}
@stop