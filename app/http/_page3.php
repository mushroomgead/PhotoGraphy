<div class="demo">
  <ul id="imageGallery">
    <li data-thumb="http://sachinchoolur.github.io/lightslider/img/thumb/cS-1.jpg">
        <img src="http://sachinchoolur.github.io/lightslider/img/cS-1.jpg" />
    </li>
    <li data-thumb="http://sachinchoolur.github.io/lightslider/img/thumb/cS-2.jpg">
        <img src="http://sachinchoolur.github.io/lightslider/img/cS-2.jpg" />
    </li>
  </ul>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#imageGallery').lightSlider({
      gallery:true,
      item:1,
      loop:true,
      thumbItem:9,
      slideMargin:0,
      enableDrag: false,
      currentPagerPosition:'left',
      onSliderLoad: function(el) {
          el.lightGallery({
              selector: '#imageGallery .lslide'
          });
      }
  });
});
</script>
