<div class="demo">
  <ul id="imageGallery">

    <li data-thumb="">
        <img src="app/img/8496636515_ca9ef2a464_o.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/8496638777_6f091cdf76_o.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/8497741520_ec02001b37_o.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/9852394115_538fb4dab3_o.jpg"/>
    </li>

  </ul>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#imageGallery').lightSlider({
      gallery:false,
      item:1,
      loop:true,
      thumbItem:9,
      slideMargin:0,
      enableDrag: true,
      currentPagerPosition:'left',
      
      // pauseOnHover: true,
      auto: true,
      slideEndAnimation: true,

      // onSliderLoad: function(el) {
      //     el.lightGallery({
      //         selector: '#imageGallery .lslide'
      //     });
      // }
  });
});
</script>
