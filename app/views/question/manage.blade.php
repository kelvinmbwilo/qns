@extends('master')

@section('heading')
  Manage Questions ({{ $cat->value }})
@stop

@section('content')
<div class='col-sm-10 col-sm-offset-1'>
<?php $i=1 ?>
    @foreach ($cat->question()->orderBy('ordering', 'asc')->get() as $value)
    <div class="row" id="{{ $value->id }}">
        <div class='col-sm-10'>
            {{ $i++ }} .<span class="editable" id="{{ $value->id }}">{{ $value->question }} </span>
            <span class="subqn" id="{{ $value->id }}"></span>
            @if(count($value->subquestion) != 0)
            <ul class='list-unstyled col-sm-offset-1'>
                @foreach ($value->subquestion as $val)
                <li id="{{ $val->id }}">
                    <i class='fa fa-square-o'></i><span id="{{ $val->id }}" class="editable1"> {{ $val->value }} </span>
                    <a href="#b" title="edit answer" class="editanswer"><i class="fa fa-pencil text-info"></i> </a>
                    <a href="#b" title="delete answer" class="deleteanswer"><i class="fa fa-trash-o text-danger"></i></a>
                </li>
                @endforeach
            </ul>
            @else
            <br> ..................................................................................................
            @endif
        </div>
        <div class='col-sm-2'>
            <button title="delete Question" class='btn btn-xs btn-danger pull-right deleteqn' style="margin: 5px"><i class='fa fa-trash-o'></i></button>
            <button title="edit SQuestion" class='btn btn-xs btn-info pull-right editqn' style="margin: 5px"><i class="fa fa-pencil"></i></button> 
            <button title="add Answer" class='btn btn-xs btn-warning pull-right addsubqn' style="margin: 5px"><i class="fa fa-plus"></i></button> 
            
        </div>
        
        
    </div>
    <hr>
   @endforeach

</div>
@stop