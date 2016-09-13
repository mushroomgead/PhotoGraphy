<?php
switch (isset($_GET['subpage']) ? $_GET['subpage'] : '') {
    case 'page_men_1':
        require_once 'page_men_1.php';
        break;

    case 'page_men_2':
        require_once 'page_men_2.php';
        break;

    case 'page_men_3':
        require_once 'page_men_3.php';
        break;

    case 'page_men_4':
        require_once 'page_men_4.php';
        break;

    case 'page_men_5':
        require_once 'page_men_5.php';
        break;

    default: ?>
      <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_men_1">
        <div data-content="Folder 1" class="image pull-left">
          <img src="app/img/WEB/MEN/1/Chris1.jpg" />
        </div>
      </a>

      <a class="img-entry-vert sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_men_2">
        <div data-content="Folder 2" class="image pull-left">
          <img src="app/img/WEB/MEN/2/_N4A1421.jpg" />
        </div>
      </a>

      <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_men_3">
        <div data-content="Folder 3" class="image pull-left">
          <img src="app/img/WEB/MEN/3/_MG_5694.jpg" />
        </div>
      </a>

      <a class="img-entry-vert sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_men_4">
        <div data-content="Folder 4" class="image pull-left">
          <img src="app/img/WEB/MEN/4/THI1.jpg" />
        </div>
      </a>

      <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_men_5">
        <div data-content="Folder 5" class="image pull-left">
          <img src="app/img/WEB/MEN/5/P1.jpg" />
        </div>
      </a>

<?php
  return false;
  break;
}
?>
