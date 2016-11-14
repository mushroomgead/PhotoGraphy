$(document).ready(function() {
    /** Fixed footer always bottom of page **/
    $(window).trigger('resize');

    $(window).resize(function () {
        var screen_height = $(document).height();
        var header_height = $('#section-header').outerHeight();
        var footer_height = $('footer').outerHeight();
        var body_height   = screen_height-header_height-footer_height;

        $('#page_index').css('min-height',body_height);
    });
    /** Fixed scroll while loading **/
    $('html').addClass('fix-scroll');

    /** Used for Show Photo Slider in Index.php **/
    $('#imageGallery').lightSlider({
        item:1,
        loop:true,
        slideMove:1,
        slideMargin:5,
        pager: false,
        pauseOnHover: true,
        auto: true,
        speed: 400,
        pause: 5000
    });

    $(window).scroll(function() {
        if($(this).scrollTop() > 200){
        $('#goTop').stop().animate({
          bottom: '50px'
        }, 100);
        }
        else{
        $('#goTop').stop().animate({
         bottom: '-100px'
        }, 100);
        }
    });

    $(window).on('load',function() {
        $("html").removeClass('fix-scroll');
        $('#loader').delay(50).fadeOut(150);

        $('.grid').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: 280
        });
    });

    /** Used for Click it's go to the top of page. **/
    $('#goTop').click(function() {
        $('html, body').stop().animate({
        scrollTop: 0 }, 100, function() {
            $('#goTop').stop().animate({
             bottom: '-100px'  
            }, 100);
        });
    });

    /** Used for Show Photo to screen. **/
    var $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: 200
    });

    /** Used for Mode ADMIN :: Delete Photo. **/
    // <?php if (isset($_SESSION['UserData']['username'])) { ?>

    $grid.on('click','.grid-item',function(event){
        if (confirm('Delete ?')){
        event.preventDefault();

        $.ajax({
            url  : 'app/database/ajaxcenter.php',
            type :'POST',
            data : {
              case     : 'deletePhoto',
              filepath : $('#filepath').val(),
              category : $('#category').val(),
              filename : $('#filename').val()
            },
            success: function(result){
              console.log(result);
            },
            error: function(result){
              alert('AJAX Error!');
            }
        });
        // remove clicked element
        $grid.masonry( 'remove', this )
        // layout remaining item elements
        .masonry('layout');
        }
    })

    // <?php } ?>
});

/** Function HambergerMenu Used for show tab menu list when responsive screen **/
function HambergerMenu() {
    if($('#myTopnav').hasClass('responsive')){
        $("#myTopnav").removeClass("responsive");
        $('.demo').css('padding-top','50');
    }else{
        $("#myTopnav").addClass("responsive");
        $('.demo').removeAttr('padding-top');
    }
}

/** Function GetImageFromDB Used for Get Value From Database **/
function GetImageFromDB(category, subcategory){
    $.ajax({
        url  : 'app/database/ajaxcenter.php',
        type :'POST',
        data:{
            case          : 'GenImage',
            p_category    : category,
            p_subcategory : subcategory
        },
        success:function(result){
          var photos = JSON.parse(result);
          var isCover = false;

          setLayout(photos, isCover);
        },
        error:function(text,err){
          alert(text.responseText);
        }
    });
}

/** Function GetCoverImageFromDB Used for Get Value From Database **/
function GetCoverImageFromDB(category,flgmark){
    $.ajax({
        url  : 'app/database/ajaxcenter.php',
        type :'POST',
        data:{
            case          : 'GenCoverImage',
            p_flgmark     : flgmark,
            p_category    : category
        },
        success:function(result){
            var photos = JSON.parse(result);
            var isCover = true;

            setLayout(photos, isCover);
        },
        error:function(text,err){
            alert(text.responseText);
        }
    });
}

/**-- Function SetLayout Used for Set Photo Layout from Database to Screen. --**/
function setLayout(photos, isCover){
    $.fn.perfectLayout = function (photos) {
        var node = this;
        var perfectRows = perfectLayout(photos, $(this).width(), $(window).height(), { margin: 5 });
        node.empty();
        var x = 0;
        var setimageNode = function(img, isCover){

            if(!isCover) {
                var caption = "";
            }else{
                var caption = '<span class="cover-img">'+img.caption+'</span>';
            }

            var imgNode = $('<a href="'+ img.src +'"><div class="image">'+caption+'<img src="'+img.data+'" style="display:none;"></img></div></a>');

            imgNode.children('.image').css({
                'width': img.width + 'px',
                'height': img.height + 'px',
                'background': 'url(' + img.data + ')',
                'background-size': 'cover'
            });
            return imgNode;
        }
        perfectRows.forEach(function (row) {
            if(Object.prototype.toString.call(row)=="[object Object]"){
                var img = row;
                node.append(setimageNode(img, isCover));
            } else if (Object.prototype.toString.call(row)=="[object Array]") {
                row.forEach(function (img) {
                    node.append(setimageNode(img, isCover));
                });
            }
        });
    };

    var gallery = $('#gallery');

    $(window).resize(function () {
        gallery.perfectLayout(photos);
    });

    $(window).trigger('resize');

    if(!isCover){
        gallery.lightGallery({
            thumbnail:true,
            download:false,
            showThumbByDefault: false
        });
    }
}