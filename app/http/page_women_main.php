<?php 
  switch (isset($_GET['subpage']) ? $_GET['subpage'] : '') {

    case 'page_women_1':
      require_once('page_women_1.php');
      break;
    
    case 'page_women_2':
      require_once('page_women_2.php');
      break;   

    case 'page_women_3':
      require_once('page_women_3.php');
      break;    

    case 'page_women_4':
      require_once('page_women_4.php');
      break; 

    case 'page_women_5':
      require_once('page_women_5.php');
      break; 

    case 'page_women_6':
      require_once('page_women_6.php');
      break; 

    case 'page_women_7':
      require_once('page_women_7.php');
      break; 

    case 'page_women_8':
      require_once('page_women_8.php');
      break;  

    case 'page_women_9':
      require_once('page_women_9.php');
      break;

    case 'page_women_10':
      require_once('page_women_10.php');
      break;

    default: ?>
      <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_women_1">
        <div data-content="Folder 1" class="image pull-left">
          <img src="app/img/WEB/WOMEN/1/_MG_5259.jpg" />
        </div>
      </a>

      <a class="img-entry-horiz sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_women_2">
        <div data-content="Folder 2" class="image pull-left">
          <img src="app/img/WEB/WOMEN/2/_MG_3791.jpg" />
        </div>  
      </a>

     <!-- <a class="img-entry-horiz  sub-img-folder" href="?page= --> <?php //echo $_GET['page'] ?><!--&subpage=page_women_3">
        <div data-content="Folder 3" class="image pull-left">
          <img src="app/img/WEB/WOMEN/3/_MG_2946.jpg" />
        </div>
      </a>-->

      <a class="img-entry-horiz sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_women_4">
        <div data-content="Folder 4" class="image pull-left">
          <img src="app/img/WEB/WOMEN/4/_MG_2540.jpg" />
        </div>
      </a>

      <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_women_5">
        <div data-content="Folder 5" class="image pull-left">
          <img src="app/img/WEB/WOMEN/5/_MG_5017.jpg" />
        </div>
      </a>

      <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_women_6">
        <div data-content="Folder 6" class="image pull-left">
          <img src="app/img/WEB/WOMEN/6/_MG_2815.jpg" />
        </div>
      </a>

      <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_women_7">
        <div data-content="Folder 7" class="image pull-left">
          <img src="app/img/WEB/WOMEN/7/Duo1.jpg" />
        </div>
      </a>

      <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_women_8">
        <div data-content="Folder 8" class="image pull-left">
          <img src="app/img/WEB/WOMEN/8/NS1.jpg" />
        </div>
      </a>

      <a class="img-entry-vert  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_women_9">
        <div data-content="Folder 9" class="image pull-left">
          <img src="app/img/WEB/WOMEN/9/Joy1.jpg" />
        </div>
      </a>

      <a class="img-entry-horiz  sub-img-folder" href="?page=<?php echo $_GET['page'] ?>&subpage=page_women_10">
        <div data-content="Folder 10" class="image pull-left">
          <img src="app/img/WEB/WOMEN/10/_MG_2645.jpg" />
        </div>
      </a>
  <?php
      return false;
      break;
  }
?>
