@extends('master')

@section('heading')
  Add Category
@stop

@section('content')
   {{ Form::open(array("url"=>"category/add","class"=>"form-horizontal")) }}
   
  <div class="col-sm-6 col-sm-offset-2">
   @if(isset($msg))
         <div class="alert alert-success alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ $msg }}!</strong> 
          </div>
         @endif   
        <div class='form-group'>
            {{ Form::label('value', 'Category',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::textarea('value','',array('class'=>'form-control','placeholder'=>'eg Question For System Administrators','rows'=>'3','required'=>'required')) }} </div>
        </div>
      
      
  </div>
   <div class='col-sm-12 form-group text-center'>
        {{ Form::submit('Submit',array('class'=>'btn btn-primary')) }}
        
    </div>
  {{ Form::close() }}
@stop