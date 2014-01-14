@extends('master')

@section('heading')
  Questions
@stop

@section('content')
{{ Form::open(array("url"=>"/question/answer","class"=>"form-horizontal")) }}
<div class='col-sm-10 col-sm-offset-1'>
                <?php $i=1 ?>

    @foreach ($qn as $value)
    <div class="row">
        <div class='col-sm-10'>
            
            <span>{{ $i++ }} . {{ $value->question }} </span>
            <span class="subqn"></span>
            @if(count($value->subquestion) != 0)
            <ul class='list-unstyled col-sm-offset-1'>
                @foreach ($value->subquestion as $val)
                <li>
                    @if($value->answer == "one")
                      <div class="radio">
                        <label>
                          <input type="radio" name="qn{{ $value->id }}" id="qn{{ $value->id }}" value="{{ $val->id }}" >
                          {{ $val->value }}
                        </label>
                       </div>
                    @else
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="{{ $val->id }}" name="qn{{ $value->id }}[]" id="qn{{ $value->id }}">
                          {{ $val->value }}
                        </label>
                      </div>
                    @endif
                </li>
                @endforeach
            </ul>
            @else
            <br>
            <div class='col-sm-8'>{{ Form::textarea("qn{$value->id}",'',array('class'=>'form-control','placeholder'=>'Your Answer', 'rows'=>'4')) }} </div>
            @endif
        </div>
        
    </div>
   @endforeach

</div>
<div class='col-sm-12 form-group text-center'>
        {{ Form::submit('Submit',array('class'=>'btn btn-primary')) }}
        
    </div>
  {{ Form::close() }}
@stop