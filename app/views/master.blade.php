<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Questionnaire For Stakeholders</title>
        <style>@import url(//fonts.googleapis.com/css?family=Lato:700);</style>
        {{ HTML::style("bootstrap/css/bootstrap.css") }}
        {{ HTML::style("bootstrap/css/bootstrap-theme.css") }}
        {{ HTML::style("font-awesome/css/font-awesome.css") }}
        {{ HTML::style("jqueryui/css/start/jquery-ui.css") }}
        
        {{ HTML::script("js/jquery-1.9.1.js") }}
    </head>
    <body>
        @include('header')
        <div class="container">
            <div class='row'>
                <h2 class="text-center">@yield('heading') </h2>
                <div  id="maincontents">
                   @yield('content') 
                   <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                </div>
                    </div>
                
                </div>
        @include('footer')
        {{ HTML::script("jqueryui/js/jquery-ui-1.10.3.custom.js") }}
        {{ HTML::script("bootstrap/js/bootstrap.js") }}
        {{ HTML::script("js/script1.js") }}
    </body>
</html>
