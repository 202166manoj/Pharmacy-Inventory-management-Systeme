<?php
  function createHeader($icon, $heading, $sub_heading) {
    echo '
    <section class="row content-header">
      <div class="header-title col-md-11">
        <p class="h4 pt-2"><i class="fa fa-'.$icon.'"></i>&emsp;'.$heading.'</p>
        &emsp;&emsp;&emsp;<small class="font-weight-bold h6">'.$sub_heading.'</small>
      </div>
      <div class="col-md-1 user_options">
        <button class="col col-md-1 m-3" onclick="showOptions();">
          <i class="fa fa-gear"></i>
        </button>
        <div id="mark"><i class="fa fa-play fa-rotate-270"></i></div>
        <ul id="options" class="options list-unstyled" style="display: none;">
           
          <li>
            <a href="logout.php"><i class="fa fa-key"></i><span>Logout</span></a>
          </li>
        </ul>
      </div>
    </section>
    <hr style="border-top: 2px solid  #28a745;">
    ';
  }
?>
