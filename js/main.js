$(document).ready(function() {

    $(window).resize(function () {
        var screen_height = $(window).height();
        var header_height = $('#section-header').outerHeight();
        var footer_height = $('footer').outerHeight();
        var body_height   = screen_height-header_height-footer_height;

        $('#page_index').css('min-height','');
        $('#page_index').css('min-height',body_height);
    });

    /** Fixed scroll while loading **/
    $('html').addClass('fix-scroll');

    /** Fixed footer always bottom of page **/
    $(window).trigger('resize');

    /** When click upload button **/
    $('.upload').click(function(){
        // console.log(this);
        $(this).parent('div').children('.file').click();
    });

    /** Used for Show Photo Slider in Index.php **/
    $(".rslides").responsiveSlides({
        auto  : true,
        speed : 1000
    });

    $(window).scroll(function() {
        if($(this).scrollTop() > 200) {
            $('#goTop').stop().animate({
              bottom: '50px'
            }, 100);
        } else { 
            $('#goTop').stop().animate({
             bottom: '-100px'
            }, 100);
        }
    });

    $(window).on('load',function() {
        $("html").removeClass('fix-scroll');
        $('#loader').delay(50).fadeOut(150);
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
        url  : 'database/ajaxcenter.php',
        type :'POST',
        data : {
                case          : 'GenImage',
                p_category    : category,
                p_subcategory : subcategory
        },
        success:function(result){
            var photos = JSON.parse(result);
            var isCover = false;

            setLayout(photos, isCover);
            checkAdminMode(photos);
        },
        error:function(text,err){
          console.log(text.responseText);
        }
    });
}

/** Function GetCoverImageFromDB Used for Get Value From Database **/
function GetCoverImageFromDB(category,flgmark){
    $.ajax({
        url  : 'database/ajaxcenter.php',
        type :'POST',
        data: {
                case          : 'GenCoverImage',
                p_flgmark     : flgmark,
                p_category    : category
        },
        success:function(result){
            var photos = JSON.parse(result);
            var isCover = true;

            setLayout(photos, isCover);
            checkAdminMode(photos);
        },
        error:function(text,err){
            console.log(text.responseText);
        }
    });
}

/**-- Function for Check Admin Mode --**/
function checkAdminMode(photos){
    if(photos[0].data.admin_mode == 'Y'){
        $('#info-delete').append('<i class="fa fa-remove"></i> Click on the photo to remove.');

        $('#gallery a#img_').click(function(){
            var filepath = $(this).attr('filepath');
            var category = $(this).attr('category');
            var filename = $(this).attr('filename');
            var file_path_backend = $(this).attr('file_path_backend');

            $.ajax({
                type: 'post',
                url : 'database/ajaxcenter.php',
                data: {
                    'case'     : 'deletePhoto',
                    'filepath' : filepath,
                    'category' : category,
                    'file_path_backend' : file_path_backend,
                    'filename' : filename
                },
                success:function(result){
                    alert('Deleted !!');
                    console.log(result);
                    location.reload();
                },
                error:function(msg, err){
                    alert(msg.responseText);
                }
            });
        });
    }
}

/**-- Function Delete Photo--*/
function deletePhoto(){
    var filepath = $(this).attr('filepath');
    var category = $(this).attr('category');
    var filename = $(this).attr('filename');
    var file_path_backend = $(this).attr('file_path_backend');

    $.ajax({
        type: 'post',
        url : 'database/ajaxcenter.php',
        data: {
            'case'     : 'deletePhoto',
            'filepath' : filepath,
            'category' : category,
            'file_path_backend' : file_path_backend,
            'filename' : filename
        },
        success:function(result){
            alert('Deleted !!');
            console.log(result);
            location.reload();
        },
        error:function(msg, err){
            alert(msg.responseText);
        }
    });
}

/**-- Function to change flg status --*/
function changeFlgStatus(flg){
    var category = $(this).attr('category');
    var filename = $(this).attr('filename');
    $.ajax({
        type: 'post',
        url:'database/ajaxcenter.php',
        data:{
            'case'     : 'changeFlgPhoto',
            'category' : category,
            'filename' : filename,
            'flg'      : flg
        },
        success:function(result){
            alert('changed to'+flg);
        },
        error:function(msg, err){
            alert(msg.responseText);
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
                var caption = '<span class="cover-img">'+img.data.caption+'</span>';
            }

            if(img.data.admin_mode == 'Y' && !isCover){
                var imgNode = $('<a id="img_" href="javascript:void(0)" filepath="'+img.data.file_thumb+'" file_path_backend="'+img.data.file_path_backend+'" category="'+img.data.category+'" filename="'+img.data.filename+'"><div class="image">'+caption+'<img src="'+img.data.file_thumb+'" style="display:none;"></img></div></a>');
            }else{
                var imgNode = $('<a id="folder" href="'+ img.src +'"  class="gead"><div class="image">'+caption+'<img src="'+img.data.file_thumb+'" style="display:none;"></img></div></a>');
            }

            imgNode.children('.image').css({
                'width': img.width + 'px',
                'height': img.height + 'px',
                'background': 'url(' + img.data.file_thumb + ')',
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
        if(!($('#nav-admin').hasClass('nav-admin'))){
            gallery.lightGallery({
                thumbnail:true,
                download:false,
                showThumbByDefault: false
            });
        }
    }
}