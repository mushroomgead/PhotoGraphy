<div class="demo">
  <ul id="imageGallery">
    <li data-thumb="">
        <img src="app/img/WEB/WOMEN/4/_MG_2540.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/8496636515_ca9ef2a464_o.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/8496638777_6f091cdf76_o.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/WEB/MEN/1/Chris6.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/8497741520_ec02001b37_o.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/9852394115_538fb4dab3_o.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/WEB/WOMEN/2/_MG_3885.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/WEB/WOMEN/8/NS3.jpg"/>
    </li>
    <li data-thumb="">
        <img src="app/img/WEB/WOMEN/10/_MG_2663.jpg"/>
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
      slideMargin:5,
      enableDrag: true,
      currentPagerPosition:'left',
      pager: false,
      pauseOnHover: true,
      auto: true,
      slideEndAnimation: true,

  });
});
</script>

<!--  <div class="photo-list container" id="aniimated-thumbnials" oncontextmenu="return false">
    <a class="img-entry-vert" href="aapp/img/WEB/WOMEN/4/_MG_2540.jpg">
      <img src="aapp/img/WEB/WOMEN/4/_MG_2540.jpg" />
    </a>
    <a class="img-entry-horiz" href="app/img/8496636515_ca9ef2a464_o.jpg">
      <img src="app/img/8496636515_ca9ef2a464_o.jpg" />
    </a>
</div> -->
