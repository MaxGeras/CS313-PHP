$(document).on('ready page:load',function(){
    $("#p1").hover(function(){
        $("#p1").css("color", "white");
        $("#p1").css("background", "grey"); 
        $("#p1").css("font-size", "110%"); 
    },
    function(){
        $("#p1").css("color", "#FF8C00");
        $("#p1").css("background", "grey");
        $("#p1").css("font-size", "100%");
            

    });

    $("#p4").mouseenter(function(){
        $("#p4").css("color", "white");
        $("#p4").css("background", "grey"); 
        $("#p4").css("font-size", "110%"); 
    });

      $("#p4").mouseleave(function(){
          $("#p4").css("color", "#FF8C00");
        $("#p4").css("background", "grey");
        $("#p4").css("font-size", "100%");
      });

       $("#p5").mouseenter(function(){
        $("#p5").css("color", "white");
        $("#p5").css("background", "grey"); 
        $("#p5").css("font-size", "110%"); 
    });

      $("#p5").mouseleave(function(){
          $("#p5").css("color", "#FF8C00");
        $("#p5").css("background", "grey");
        $("#p5").css("font-size", "100%");
      });
         $("#p6").mouseenter(function(){
        $("#p6").css("color", "white");
        $("#p6").css("background", "grey"); 
        $("#p6").css("font-size", "110%"); 
    });

      $("#p6").mouseleave(function(){
          $("#p6").css("color", "#FF8C00");
        $("#p6").css("background", "grey");
        $("#p6").css("font-size", "100%");
      });


    $("#pic").click(function(){
    $("#p2").attr("src", "wife.jpg");
    }); 
});