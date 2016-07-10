<div class="demo">
  <ul id="imageGallery">

    <li data-thumb="app/img/WEB/STILL/_MG_0060.jpg">
        <img src="app/img/WEB/STILL/_MG_0060.jpg"/>
    </li>
    <li data-thumb="app/img/WEB/STILL/_MG_4580GG.jpg">
        <img src="app/img/WEB/STILL/_MG_4580GG.jpg"/>
    </li>
    <li data-thumb="app/img/WEB/STILL/AAA.jpg">
        <img src="app/img/WEB/STILL/AAA.jpg"/>
    </li>
    <li data-thumb="app/img/WEB/STILL/COLA.jpg">
        <img src="app/img/WEB/STILL/COLA.jpg"/>
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
