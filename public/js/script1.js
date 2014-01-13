$(document).ready(function(){
//    $("#registerpat").click(function (){
//        $('#maincontents').html("<div class='text-center'><i class='fa fa-spinner fa-spin fa-5x'></i></div>");
//        $.ajax({
//        type: "GET",
//        url:'patient/add/basic',
//        data: { id: "userId" }
//      }).done(function( msg ) {
//        $('#maincontents').html(msg);
//      });
//    });
    $("#subquestions").hide();
    $('select#type').change(function(){
        if($(this).val() === 'open'){
            $("#subquestions").hide('slow');
        }else{
        $("#subquestions").show('slow');
        
        $("#addanother").click(function (){
            var ans = $("textarea#answer").val();
            if(ans === ""){
                $("textarea#answer").focus();
            }else{
                var val = "<li><span>"+ans+"</span><i class='fa fa-trash-o text-danger pull-right delete'></i></li>";
                $("textarea#answer").val('');
                $("textarea#answer").focus();
                $("#subquestions").find("ul").append(val);
                $('.delete').click(function(){
                   $(this).parent().remove(); 
                });
            }
        });
        }
     });
     
    $("#submitqn").click(function(){
       if($("textarea#question").val() === ""){
            $("textarea#question").focus();
        }else{
        
        //prepare data for a question table
        var question = $("textarea#question").val();
        var category = $('select#category').val();
        var qtype    = $('select#type').val();
        
        //chek if there are multiple choice answers
        var anss = new Array();
        var subtype = "";
        if(qtype === 'closed'){
            //prepare data for a subquestion table
            subtype = $("select#subtype").val();
            alert(subtype)
            $("#subquestions").find("ul").find('li').each(function (index){
                anss.push($(this).find('span').text()); 
            });
        }
       
        $('#maincontents').html("<div class='text-center'><i class='fa fa-spinner fa-spin fa-5x'></i></div>");
        //use ajax method to post the form while displaying the loading image
        $.ajax({
            type: "GET",
            url:'../question/add',
            data: { 
                question: question,
                category: category,
                qtype:    qtype,
                subtype:  subtype,
                anss:     anss
            }
          }).done(function( msg ) {
              $('#maincontents').html("<h1>Question added sucessfull</h1> Please Wait redirecting......");
            setTimeout(function() {
                
                window.location.assign("../question/list")
            }, 4000);
          });
      }
    });
    
    
    //editing categories
    $('.editcat').click(function(){
        $(this).hide('slow');
        var editbtn = $(this);
        var original = editbtn.parent().parent().find('td.editable').text().replace(/^\s+|\s+$/g,'') ;
        var textarea = "<textarea class='form-control col-sm-9'>"+original+"</textarea>";
        textarea += "<a href='#a' class='changeval'><i class='fa fa-check fa-2x text-success'></i> save </a>";
        textarea += "<a href='#a' class='cancelchange'><i class='fa fa-times fa-2x text-danger'></i> Cancel</a>";
        editbtn.parent().parent().find('td.editable').html(textarea);
        
        //cancelling a process
        $(".cancelchange").click(function(){
            $(this).parent().html(original);
            editbtn.show("slow");
        });
        //processing the tick
        $(".changeval").click(function(){
            var id = $(this).parent().attr("id");
            var value = $(this).parent().find('textarea').val();
            var td = $(this).parent();
            $(this).html("<i class='fa fa-spinner fa-spin fa-2x'></i> Editing....")
           
           //sending data to be proccessed 
            $.ajax({
            type: "GET",
            url:'../category/manage',
            data: { 
                id: id,
                value :value
            }
          }).done(function( msg ) {
              td.html(msg);
              editbtn.show("slow");
          });
          
          
        });
    });
    
    $(".deletecat").click(function(){
        var id1 = $(this).parent().parent().attr('id');
        $(".deletecat").show("slow").parent().parent().find("span").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deletecat").show("slow");
            $(this).parent().parent().find("span").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.post("../category/delete",{id:id1},function(data){
              btn.hide("slow").next("hr").hide("slow");
           });
        });
    });//endof deleting category

 //editing questions
    $('.editqn').click(function(){
        $(this).hide('slow');
        var editbtn = $(this);
        var original = editbtn.parent().parent().find('.editable').text().replace(/^\s+|\s+$/g,'') ;
        var textarea = "<textarea class='form-control col-sm-9'>"+original+"</textarea>";
        textarea+= "<a href='#a' class='changeval'><i class='fa fa-check fa-2x text-success'></i> save </a>"
        textarea += "<a href='#a' class='cancelchange'><i class='fa fa-times fa-2x text-danger'></i> Cancel</a>";
        editbtn.parent().parent().find('.editable').html(textarea);
        
        //cancelling a process
        $(".cancelchange").click(function(){
            $(this).parent().html(original);
            editbtn.show("slow");
        });
        
        //processing the tick
        $(".changeval").click(function(){
            var id = $(this).parent().attr("id");
            var value = $(this).parent().find('textarea').val();
            var td = $(this).parent();
            $(this).html("<i class='fa fa-spinner fa-spin fa-2x'></i> Editing....")
           
           //sending data to be proccessed 
            $.ajax({
            type: "GET",
            url:'../question/manage',
            data: { 
                id: id,
                value :value
            }
          }).done(function( msg ) {
              td.html(msg);
              editbtn.show("slow");
          });
          
          
        });
    });
    
    
    
    $(".deleteqn").click(function(){
        var id1 = $(this).parent().parent().attr('id');
        $(".deleteqn").show("slow").parent().parent().find("span.delqnn").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span class='delqnn'><br>Are You Sure <br /> <a href='#s' id='yes'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deleteqn").show("slow");
            $(this).parent().parent().find("span.delqnn").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.post("../question/delete",{id:id1},function(data){
              btn.hide("slow").next("hr").hide("slow");
           });
        });
    });//endof deleting category
    
    //editing sub questions
    $('.editanswer').click(function(){
        $(this).hide('slow');
        var editbtn = $(this);
        var original = editbtn.parent().find('.editable1').text().replace(/^\s+|\s+$/g,'') ;
        var textarea = "<textarea class='form-control col-sm-9'>"+original+"</textarea>";
        textarea+= "<a href='#a' class='changeval'><i class='fa fa-check fa-2x text-success'></i> save </a>"
        textarea += "<a href='#a' class='cancelchange'><i class='fa fa-times fa-2x text-danger'></i> Cancel </a>";
        editbtn.parent().find('.editable1').html(textarea);
        
        //cancelling a process
        $(".cancelchange").click(function(){
            $(this).parent().html(original);
            editbtn.show("slow");
        });
        
        //processing the tick
        $(".changeval").click(function(){
            var id = $(this).parent().attr("id");
            var value = $(this).parent().find('textarea').val();
            var td = $(this).parent();
            $(this).html("<i class='fa fa-spinner fa-spin fa-2x'></i> Editing....")
           
           //sending data to be proccessed 
            $.ajax({
            type: "GET",
            url:'../subquestion/manage',
            data: { 
                id: id,
                value :value
            }
          }).done(function( msg ) {
              td.html(msg);
              editbtn.show("slow");
          });
          
          
        });
    });
    
    $(".deleteanswer").click(function(){
        var id1 = $(this).parent().attr('id');
        $(".deleteanswer").show("slow").parent().parent().find("span.btns").remove();
        var btn = $(this).parent();
        $(this).hide("slow").parent().append("<span class='btns'><br>Are You Sure <br /> <a href='#s' id='yes'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deleteanswer").show("slow");
            $(this).parent().parent().find("span.btns").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.post("../subquestion/delete",{id:id1},function(data){
              btn.hide("slow").next("hr").hide("slow");
           });
        });
    });//endof deleting subquestions
    
    $(".addsubqn").click(function (){
        var textarea = "<textarea class='form-control col-sm-4'></textarea><br>";
        textarea+= "<a href='#a' id='addsubqn'><i class='fa fa-check text-info'></i> submit</a>";
        $(this).parent().parent().find(".subqn").append("<span class='otherqn'>"+textarea+"</span>");
        
        $("#addsubqn").click(function (){
            var value = $(this).parent().find("textarea").val();
            $(this).html("<i class='fa fa-spinner fa-spin fa-2x'></i> Adding....")
            var id = $(this).parent().parent().attr('id');
           //sending data to be proccessed 
            $.ajax({
            type: "GET",
            url:'../subquestion/add',
            data: { 
                question_id: id,
                value :value
            }
          }).done(function( msg ) {
             location.reload()
          });
          
        });
    })

    //adding dependencies
    $(".adddependece").click(function(){
        //display a list of all questions with multiple values
    });
});
