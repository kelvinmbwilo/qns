@extends('master')

@section('heading')
  Categorize  Questions ({{ $catt->value }})
@stop

@section('content')
{{ Form::open(array("url"=>"/question/categorize/{$catt->id}","class"=>"form-horizontal")) }}
<div class='col-sm-10 col-sm-offset-1'>
<?php $i=1 ?>
    @foreach ($catt->question()->orderBy('ordering', 'asc')->get() as $value)
    <div class="row" id="{{ $value->id }}">
        <div class='col-sm-8'>
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
        <div class='col-sm-4'>
            <div class='form-group'>
                <div class='col-sm-8'>{{ Form::select("qn{$value->id}",$cat,$value->category,array('class'=>'form-control','required'=>'requiered')) }}  </div>
            </div>
        </div>
        
        
    </div>
    <hr>
   @endforeach
   
<div class='col-sm-12 form-group text-center'>
        {{ Form::submit('Save Changes',array('class'=>'btn btn-primary btn-block')) }}
        
    </div>
  
</div>
{{ Form::close() }}
@stop
