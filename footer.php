   
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
    rel="Stylesheet" type="text/css" />

     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Date range picker -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
 
    <!-- Custom js -->  

    <!-- //Calender script -->
  <script type="text/javascript">
    $(function() {

        $('input[name="datefilter"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });
  </script>

<!-- //Drag and clone -->
  <script>   
   $(document).ready(function(){
    $(document).on('mouseover','#sortable1 > li',function(){
      if(!$(this).hasClass("ui-draggable-handle")){
        $(this).trigger("click");
      }
      
    });
   
   });
    (function ($) {
      $.fn.liveDraggable = function (opts) {
          this.click("mouseover", function() {
            if (!$(this).data("init")) {
                $(this).data("init", true).draggable(opts);
        $(this).removeClass("drag");
            }
          });
          return this;
      };
    }(jQuery));
    $('.drag').liveDraggable({
      helper: 'clone',
            cursor: 'move'    
  });   

    
  </script> 

<!-- //recipe box data remove -->
  <script>
    $(document).on("click","body .delete_box",function() {
      $(this).parent().parent().parent().parent().html('<img class="recipe_img" src="./img/Recip.png">');
      $(this).parent().parent().parent().remove();    
    });
  </script>



  <script>
    // $('.recipe_nam').draggable({
    //   handle: '.drag_box',
    //   containment: '.content_data'
    //   });
     $(document).ready(function() {
    var dropped = false;
    var start_dropped = false;
    var draggable_sibling;

    $(".sortable").sortable({
        start: function(event, ui) {
      start_dropped = true;
      console.log("coming here");
            draggable_sibling = $(ui.item).prev();
        },
        stop: function(event, ui) {
      start_dropped = false;
      console.log("coming here 2");
            if (dropped) {
                if (draggable_sibling.length == 0)
                    $('.sortable').prepend(ui.item);

                draggable_sibling.after(ui.item);
                dropped = false;
            }
        }
    });
   var x = null;
    $(".droppable").droppable({
      drop: function(e, ui) {
    if(start_dropped == true){ return}
        var parent = $(this);
    console.log("recipe_nam",parent.hasClass("recipe_nam"));
        parent.find('img').remove();
        var x = ui.draggable.clone();
        var img = $(x)  

        if (x.hasClass("outside")) {
          x.removeClass("outside");   
        }      
        // x.draggable({
        //   helper: 'original'
        // });

        x.find('.ui-resizable-handle').remove();
        x.resizable();
        x.appendTo(this);
        ui.helper.remove();          
      }
    });
});    
  </script>

<!-- //nutrition edit btn -->
<script>
  $(document).ready(function(){
    $(".left_items1 .graph_item").click(function(){
      $(".breakfast_item p").css('display', 'none');
      $(".breakfast_item_fn").css('display', 'block');
      $('.hide-trash').css('display', 'block');
      $('.content_item_list.graphy_hide').css('display', 'none');
      $('.content_item_footer').css('display', 'none');
      $('.hide-new-row-flex').css('display', 'block');      
    });
  });
  </script>
<!-- //nutrition close btn -->
     <script>
    $(document).on("click",".close_item",function() {
         $(".breakfast_item p").css('display', 'block');
        $(".breakfast_item_fn").css('display', 'none');
        $('.hide-trash').css('display', 'none');
        $('.content_item_list.graphy_hide').css('display', 'flex'); 
        $('.content_item_footer').css('display', 'flex');
        $('.hide-new-row-flex').css('display', 'none'); 
    });
  </script>

<!-- //add new row -->
  <script>
    $(document).ready(function(){
    $(".add_new_row").click(function(){      
      $('.content_item_list.default-hidee').css('display', 'flex');
    });
  })
    </script>

 
<!-- //delete recipe row -->
<script>
  $(document).on("click","body .hide-trash",function() {    
    $(this).parent().remove();    
  });
</script>
<!-- <script type="text/javascript">
  $("#login-form").submit(function(e) {
    e.preventDefault();
}).validate({
    rules: {
            email: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "specify email"
            },
            password: {
                required: "specify password"
            }
        },
    submitHandler: function(form) { 
      if ($('#login-form').valid())
      {
        $('#login-form').submit();
      }    
        //$("#submitForm").submit();

        //submit via ajax
        //return false;  //This doesn't prevent the form from submitting.
    }
});

</script> -->

  </body>
</html>



