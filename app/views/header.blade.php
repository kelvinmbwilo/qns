@section('header')
<style>
    .navbar-nav li{
        padding-right: 40px;
        
    }
</style>

<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
     <div class='row'><h4 class="text-center text-warning text-info" style="font-family: lato">STAKEHOLDERS QUESTIONNAIRE FOR ROAD SAFETY MANAGEMENT SYSTEM IN TANZANIA</h4>
  
  </div>
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <!--<a class="navbar-brand" href="#"><i class='fa fa-home fa-3x text-info'></i></a>-->
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class='fa fa-bars fa-2x text-info'></i> Questions<b class="caret"></b></a>
            <ul class="dropdown-menu">
                @foreach(Category::all() as $cat)
                <li>{{ link_to("sub/{$cat->id}",$cat->value) }}</li>
                @endforeach
                
            </ul>
          </li>
      <li class=""><a href="#" title="share via email" data-toggle="modal" data-target="#myModal"><i class='fa fa-share-square-o fa-2x text-info'></i> Share</a></li>
      
        
    </ul>
    <ul class="nav navbar-nav navbar-right">
        
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-2x text-info"></i> Category<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>{{ link_to("add/category","Add") }}</li>
            <li>{{ link_to("manage/category","Manage") }}</li>
        </ul>
      </li>
      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class='fa fa-list-ol fa-2x text-info'></i> Manage Qns<b class="caret"></b></a>
            <ul class="dropdown-menu">
                 <li>{{ link_to("add/question","Add Question") }}</li>
                @foreach(Category::all() as $cat)
                <li>{{ link_to("manage/question/{$cat->id}",$cat->value) }}</li>
                @endforeach
                
            </ul>
          </li>
      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class='fa fa-list-ol fa-2x text-info'></i> Order<b class="caret"></b></a>
            <ul class="dropdown-menu">
                @foreach(Category::all() as $cat)
                <li>{{ link_to("order/question/{$cat->id}",$cat->value) }}</li>
                @endforeach
                
            </ul>
          </li>
          
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class='fa fa-arrows-alt fa-2x text-info'></i> Categorize<b class="caret"></b></a>
            <ul class="dropdown-menu">
                @foreach(Category::all() as $cat)
                <li>{{ link_to("category/question/sub/{$cat->id}",$cat->value) }}</li>
                @endforeach
                
            </ul>
          </li>
          
          
    </ul>
  </div><!-- /.navbar-collapse -->
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class='form-group'>
                {{ Form::label('email', 'Email Adress',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::text('email','',array('class'=>'form-control','placeholder'=>'Email Address', 'rows'=>'4')) }} </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="share">Share</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
$(document).ready(function (){
    $("#share").click(function(){
        var email =  $('#email').val();
        if(email === ""){
            $('#email').focus();
         }else{
             $(".modal-body").html("<i class='fa fa-spinner fa-spin fa-4x'></i> Sending Mail....");
             $.post("../question/send",{email:email},function(){
                 $(".modal-body").html("<i class='fa fa-chek fa-spin fa-4x'></i> <h2> Email Was Sent Successfull To "+email+"</h2>");
             });
         }
    });
    
    $('#myModal').on('hidden.bs.modal', function () {
                    $('#myModal').remove();
                });
});
</script>
@show