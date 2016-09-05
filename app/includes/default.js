 <script type="text/javascript">

    $(document).ready(function() {
    //   var img_height1 = $("#1").height();
    //   var img_width1  = $("#1").width();

    //   var img_height2 = $("#2").height();
    //   var img_width2  = $("#2").width();

    //   console.log(img_height1);
    //   console.log(img_width1);
    //   console.log(img_height2);
    //   console.log(img_width2);

      $('#aniimated-thumbnials').lightGallery({
          thumbnail:true,
          download:false,
          showThumbByDefault: false
      });
    });
//         $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').addClass("sticky");
    // console.log($(this).width());
    // > 480


    // $(window).scroll(function() {
    //   if ($(this).scrollTop() > 1){
    //     if($(this).width() > 360){
    //               $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').addClass("sticky");
    //     }

    //     }
    //     else{
    //       $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').removeClass("sticky");
    //     }
    // });


    // document.onmousedown=disableclick;
    // function disableclick(event)
    // {
    //   if(event.button==2)
    //    {
    //      return false;
    //    }
    // }

    function myFunction() {
        var x = document.getElementById('myTopnav');
        if (x.className === 'topnav'){
          x.className += ' responsive';
        } else {
        x.className = 'topnav';
        }
    }  
    </script>