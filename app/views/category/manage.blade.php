@extends('master')

@section('heading')
  Manage Categories
@stop

@section('content')
<div class='col-sm-10 col-sm-offset-1'>
<table class='table'>
    @foreach ($cat as $value)
    <tr id='{{ $value->id }}'>
        <td class='editable col-sm-10' id='{{ $value->id }}'>
            {{ $value->value }}
        </td>
        <td class='col-sm-2'>
            <button title="delete category" class='btn btn-xs btn-danger pull-right deletecat'><i class='fa fa-trash-o'></i></button>
            <button title="edit category" class='btn btn-xs btn-info pull-right editcat'><i class="fa fa-pencil"></i></button> &nbsp;&nbsp;&nbsp;
        </td>
    </tr>
   @endforeach
</table>
</div>
@stop