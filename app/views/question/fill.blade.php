@extends('master')

@section('heading')
  Questions
@stop

@section('content')
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
                    
                    <i class='fa fa-square-o'></i><span class="editable1"> {{ $val->value }} </span>
                    
                </li>
                @endforeach
            </ul>
            @else
            <br>
            <div class='col-sm-8'>{{ Form::textarea('answer','',array('class'=>'form-control','placeholder'=>'Your Answer', 'rows'=>'4')) }} </div>
            @endif
        </div>
        
    </div>
   @endforeach
</table>
</div>
@stop