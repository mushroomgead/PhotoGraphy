<?php
$category = 'men';

if(isset($_GET['subpage'])){
  genImageBlock($category, $_GET['subpage']);
}else{?>
<div id="block-photo">
  <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=1">
    <div data-content="Folder 1" class="image pull-left">
      <img src="app/img/WEB/MEN/1/Chris1.jpg" />
    </div>
  </a>

  <a class="img-entry-vert sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=2">
    <div data-content="Folder 2" class="image pull-left">
      <img src="app/img/WEB/MEN/2/_N4A1421.jpg" />
    </div>
  </a>

  <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=3">
    <div data-content="Folder 3" class="image pull-left">
      <img src="app/img/WEB/MEN/3/_MG_5694.jpg" />
    </div>
  </a>

  <a class="img-entry-vert sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=4">
    <div data-content="Folder 4" class="image pull-left">
      <img src="app/img/WEB/MEN/4/THI1.jpg" />
    </div>
  </a>

  <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=5">
    <div data-content="Folder 5" class="image pull-left">
      <img src="app/img/WEB/MEN/5/P1.jpg" />
    </div>
  </a>
</div>
<?php } ?>