@section('header')
<style>
    .navbar-nav li{
        padding-right: 40px;
        
    }
</style>

<nav class="navbar navbar-default" role="navigation">
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
      <li class=""><a href="{{ route('listqns') }}"><i class='fa fa-bars fa-2x text-info'></i> Questions</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus-square-o fa-2x text-info"></i> Add<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>{{ link_to("add/question","Add Question") }}</li>
            <li>{{ link_to("add/category","Add Category") }}</li>
        </ul>
      </li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-2x text-info"></i> Manage<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>{{ link_to("manage/question","Question") }}</li>
            <li>{{ link_to("manage/category","Category") }}</li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
    </div>
</nav>
<script>
$(document).ready(function(){
    $("#topnavs li").hide().hover(function(){
        $(this).addClass("btn btn-warning");
    },function (){
        $(this).removeClass("btn btn-warning");
    });
});
</script>
@show