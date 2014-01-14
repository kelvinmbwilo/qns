@extends('master')

@section('heading')
  Change  Questions Order
@stop

@section('content')
{{ Form::open(array("url"=>"/question/order","class"=>"form-horizontal")) }}
<div class='col-sm-10 col-sm-offset-1'>
<?php $i=1 ?>
    @foreach ($qn as $value)
    <div class="row" id="{{ $value->id }}">
        <div class='col-sm-10'>
            {{ $i }} .<span class="editable" id="{{ $value->id }}">{{ $value->question }} </span>
            <span class="subqn" id="{{ $value->id }}"></span>
            @if(count($value->subquestion) != 0)
            <ul class='list-unstyled col-sm-offset-1'>
                @foreach ($value->subquestion as $val)
                <li id="{{ $val->id }}">
                    <i class='fa fa-square-o'></i><span id="{{ $val->id }}" class="editable1"> {{ $val->value }} </span>
                </li>
                @endforeach
            </ul>
            @else
            <br> ..................................................................................................
            @endif
        </div>
        <div class='col-sm-2'>
            <div class='form-group'>
                <div class='col-sm-8'>{{ Form::text("qn{$value->id}",$i++,array('class'=>'form-control','required'=>'requiered')) }}  </div>
            </div>
        </div>
        
        
    </div>
    <hr>
   @endforeach
   
<div class='col-sm-12 form-group text-center'>
        {{ Form::submit('Save Changes in ordering',array('class'=>'btn btn-primary btn-block')) }}
        
    </div>
  
</div>
{{ Form::close() }}
@stop