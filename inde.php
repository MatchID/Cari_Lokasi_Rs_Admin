<?php
session_start();
//error_reporting(0);
include_once "dwo.lib.php";
include_once "db.mysql.php";
include_once "connectdb.php";
include_once "ClassRC.php";
require_once "lib.session.php";
if (!login_check()){
  echo "<script>window.location = '../login/'</script>";
  exit(0);
}
if (isset($_GET[keluar])){	
  session_destroy();
  echo "<script>window.location = '../login/'</script>";  
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>BPBD - Sumatera Selatan</title>
  <link rel="stylesheet" type="text/css" href="Beagle/perfect-scrollbar.css">
  <link rel="stylesheet" type="text/css" href="Beagle/material-design-iconic-font.css">
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" type="text/css" href="Beagle/jquery-jvectormap-1.css">
  <link rel="stylesheet" type="text/css" href="Beagle/jqvmap.css">
  <link rel="stylesheet" type="text/css" href="Beagle/bootstrap-datetimepicker.css">
  <link rel="stylesheet" href="Beagle/style.css" type="text/css">
  <script type="text/javascript" async="" src="Beagle/request.htm"></script>
  <style type="text/css">
  .jqstooltip {
    position: absolute;
    left: 0px;
    top: 0px;
    visibility: hidden;
    background: rgb(0, 0, 0) transparent;
    background-color: rgba(0, 0, 0, 0.6);
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
    color: white;
    font: 10px arial, san serif;
    text-align: left;
    white-space: nowrap;
    padding: 5px;
    border: 1px solid white;
    box-sizing: content-box;
    z-index: 10000;
  }
  .jqsfield {
    color: white;
    font: 10px arial, san serif;
    text-align: left;
  }
  .rc
	  table td{
		padding:5px; margin-top:6px;  
	  
  }

  </style>
</head>

<body onload="utama()">
  <div class="be-wrapper be-fixed-sidebar">
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
      <div class="container-fluid">
        <div class="navbar-header">
          <img src="" class="navbar-brand" ></a>
        </div>
        <div class="be-right-navbar">
          <ul class="nav navbar-nav navbar-right be-user-nav">
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="Beagle/avatar.png" alt="Avatar"><span class="user-name">Túpac Amaru</span>
              </a>
              <ul role="menu" class="dropdown-menu">
              </ul>
            </li>
          </ul>
          <div class="page-title"><span>Dashboard</span>
          </div>
    </nav>
    <div class="be-left-sidebar">
      <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Dashboard</a>
        <div class="left-sidebar-spacer">
          <div class="left-sidebar-scroll ps-container ps-theme-default ps-active-y" data-ps-id="0fceaca0-4dc2-95c3-996f-5bc8535a1c3d">
            <div class="left-sidebar-content">
              <ul class="sidebar-elements">
                <li class="divider">Menu</li>
                <li class="active">
                  <a href="inde.php"><i class="icon mdi mdi-home"></i><span>Home</span>
                  </a>
                </li>
				<?php include 'menu.php' ; ?>
				<li class="divider">Setting</li>
                <li><a href="?keluar"><i class="icon mdi mdi-inbox"></i><span>Log Out</span></a>
                </li>

              </ul>
            </div>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
              <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 473px; right: 0px;">
              <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 458px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php
		 
								  $wuser=cari("SELECT count( * ) AS j, count( * )  * 10  /100 AS j2 from user ");

								  
								  $wlokasi=cari("SELECT count( * ) AS j, count( * )  * 10  /100 AS j2 from rsakit ");

								  
								  $wbencana=cari("SELECT count( * ) AS j, count( * )  * 10  /100 AS j2 from kelurahan ");

								  
								  $wgambar=cari("SELECT count( * ) AS j, count( * )  * 10  /100 AS j2 from kecamatan ");

	
	?>
	
	
    <div class="be-content">
      <div class="main-content container-fluid">
        <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="widget widget-tile">
              <div id="spark1" class="chart sparkline">
                <canvas style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"
                width="85" height="35"></canvas>
              </div>
              <div class="data-info">
                <div class="desc">Jumlah User  </div>
                <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span>
                  <span data-toggle="counter" data-end="<?php echo $wuser[j]; ?>" class="number"><?php echo $wuser[j]; ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="widget widget-tile">
              <div id="spark2" class="chart sparkline">
                <canvas style="display: inline-block; width: 81px; height: 35px; vertical-align: top;"
                width="81" height="35"></canvas>
              </div>
              <div class="data-info">
                <div class="desc">Jumlah Rumah Sakit  </div>
                <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span>
                  <span data-toggle="counter" data-end="<?php echo $wlokasi[j]; ?>" class="number"><?php echo $wlokasi[j]; ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="widget widget-tile">
              <div id="spark3" class="chart sparkline">
                <canvas style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"
                width="85" height="35"></canvas>
              </div>
              <div class="data-info">
                <div class="desc">Jumlah Kecamatan</div>
                <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span>
                  <span data-toggle="counter" data-end="<?php echo $wbencana[j]; ?>" class="number"><?php echo $wbencana[j]; ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="widget widget-tile">
              <div id="spark4" class="chart sparkline">
                <canvas style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"
                width="85" height="35"></canvas>
              </div>
              <div class="data-info">
                <div class="desc">Jumlah Kelurahan</div>
                <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span>
                  <span data-toggle="counter" data-end="<?php echo $wgambar[j]; ?>" class="number"><?php echo $wgambar[j]; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
		if (empty($_GET[menu])){
			include "tenga.php";
		}else{
			include "modul/$_GET[menu].php";
		}		
		?>
<!--
        <div class="row">
          <div class="col-xs-12 col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider xs-pb-15">  Progress Input Data</div>
              <div class="panel-body xs-pt-25">
                <div class="row user-progress user-progress-small">
                  <div class="col-md-5"><span class="title">  Banjir</span>
                  </div>
                  <div class="col-md-7">
                    <div class="progress">
                      <div style="width: <?php echo $wlokasi[j]; ?>%" class="progress-bar progress-bar-success"></div>
                    </div>
                  </div>
                </div>
                <div class="row user-progress user-progress-small">
                  <div class="col-md-5"><span class="title">Lokasi Sering Bencana  </span>
                  </div>
                  <div class="col-md-7">
                    <div class="progress">
                      <div style="width: <?php echo $wbencana[j]; ?>%" class="progress-bar progress-bar-success"></div>
                    </div>
                  </div>
                </div>
                
            
               
              </div>
            </div>
          </div>

        </div>
-->
      </div>
    </div>
    <nav class="be-right-sidebar">
      <div class="sb-content">
        <div class="tab-navigation">
          <ul role="tablist" class="nav nav-tabs nav-justified">
            <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Chat</a>
            </li>
            <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Todo</a>
            </li>
            <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Settings</a>
            </li>
          </ul>
        </div>
        <div class="tab-panel">
          <div class="tab-content">
            <div id="tab1" role="tabpanel" class="tab-pane tab-chat active">
              <div class="chat-contacts">
                <div class="chat-sections">
                  <div class="be-scroller ps-container ps-theme-default ps-active-y" data-ps-id="1ffdd224-c04b-41cf-6786-8d382c8f6dc6">
                    <div class="content">
                      <h2>Recent</h2>
                      <div class="contact-list contact-list-recent">
                        <div class="user">
                          <a href="#"><img src="Beagle/avatar1.png" alt="Avatar">
                            <div class="user-data"><span class="status away"></span>
                              <span class="name">Claire Sassu</span>
                              <span class="message">Can you share
                                  the...</span>
                            </div>
                          </a>
                        </div>
                        <div class="user">
                          <a href="#"><img src="Beagle/avatar2.png" alt="Avatar">
                            <div class="user-data"><span class="status"></span>
                              <span class="name">Maggie jackson</span>
                              <span class="message">I confirmed
                                  the info.</span>
                            </div>
                          </a>
                        </div>
                        <div class="user">
                          <a href="#"><img src="Beagle/avatar3.png" alt="Avatar">
                            <div class="user-data"><span class="status offline"></span>
                              <span class="name">Joel King </span>
                              <span class="message">Ready for
                                  the meeti...</span>
                            </div>
                          </a>
                        </div>
                      </div>
                      <h2>Contacts</h2>
                      <div class="contact-list">
                        <div class="user">
                          <a href="#"><img src="Beagle/avatar4.png" alt="Avatar">
                            <div class="user-data2"><span class="status"></span>
                              <span class="name">Mike Bolthort</span>
                            </div>
                          </a>
                        </div>
                        <div class="user">
                          <a href="#"><img src="Beagle/avatar5.png" alt="Avatar">
                            <div class="user-data2"><span class="status"></span>
                              <span class="name">Maggie jackson</span>
                            </div>
                          </a>
                        </div>
                        <div class="user">
                          <a href="#"><img src="Beagle/avatar6.png" alt="Avatar">
                            <div class="user-data2"><span class="status offline"></span>
                              <span class="name">Jhon Voltemar</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                      <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 452px; right: 0px;">
                      <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 431px;"></div>
                    </div>
                  </div>
                </div>
                <div class="bottom-input">
                  <input placeholder="Search..." name="q" type="text"><span class="mdi mdi-search"></span>
                </div>
              </div>
              <div class="chat-window">
                <div class="title">
                  <div class="user"><img src="Beagle/avatar2.png" alt="Avatar">
                    <h2>Maggie jackson</h2><span>Active 1h ago</span>
                  </div><span class="icon return mdi mdi-chevron-left"></span>
                </div>
                <div class="chat-messages">
                  <div class="be-scroller ps-container ps-theme-default" data-ps-id="376057a9-f6ea-e29c-c968-9d7124e62e91">
                    <div class="content">
                      <ul>
                        <li class="friend">
                          <div class="msg">Hello</div>
                        </li>
                        <li class="self">
                          <div class="msg">Hi, how are you?</div>
                        </li>
                        <li class="friend">
                          <div class="msg">Good, I'll need support with my pc</div>
                        </li>
                        <li class="self">
                          <div class="msg">Sure, just tell me what is going on with your computer?
                          </div>
                        </li>
                        <li class="friend">
                          <div class="msg">I don't know it just turns off suddenly
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                      <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                      <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                  </div>
                </div>
                <div class="chat-input">
                  <div class="input-wrapper"><span class="photo mdi mdi-camera"></span>
                    <input placeholder="Message..." name="q" autocomplete="off" type="text"><span class="send-msg mdi mdi-mail-send"></span>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab2" role="tabpanel" class="tab-pane tab-todo">
              <div class="todo-container">
                <div class="todo-wrapper">
                  <div class="be-scroller ps-container ps-theme-default" data-ps-id="65c6ddc8-b157-f90c-5096-2e545a7b040f">
                    <div class="todo-content"><span class="category-title">Today</span>
                      <ul class="todo-list">
                        <li>
                          <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                            <input id="todo1" checked="checked" type="checkbox">
                            <label for="todo1">Initialize the project
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                            <input id="todo2" type="checkbox">
                            <label for="todo2">Create the main structure
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                            <input id="todo3" type="checkbox">
                            <label for="todo3">Updates changes to GitHub</label>
                          </div>
                        </li>
                      </ul><span class="category-title">Tomorrow</span>
                      <ul class="todo-list">
                        <li>
                          <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                            <input id="todo4" type="checkbox">
                            <label for="todo4">Initialize the project
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                            <input id="todo5" type="checkbox">
                            <label for="todo5">Create the main structure
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                            <input id="todo6" type="checkbox">
                            <label for="todo6">Updates changes to GitHub</label>
                          </div>
                        </li>
                        <li>
                          <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                            <input id="todo7" type="checkbox">
                            <label for="todo7" title="This task is too long to be displayed in a normal space!">This task is too long to be displayed in a normal space!
                            </label>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                      <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                      <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                  </div>
                </div>
                <div class="bottom-input">
                  <input placeholder="Create new task..." name="q" type="text"><span class="mdi mdi-plus"></span>
                </div>
              </div>
            </div>
            <div id="tab3" role="tabpanel" class="tab-pane tab-settings">
              <div class="settings-wrapper">
                <div class="be-scroller ps-container ps-theme-default" data-ps-id="7e75f382-3da0-ad90-08d1-c83dbaa90a16"><span class="category-title">General</span>
                  <ul class="settings-list">
                    <li>
                      <div class="switch-button switch-button-sm">
                        <input checked="checked" name="st1" id="st1" type="checkbox"><span>
                            <label for="st1"></label></span>
                      </div><span class="name">Available</span>
                    </li>
                    <li>
                      <div class="switch-button switch-button-sm">
                        <input checked="checked" name="st2" id="st2" type="checkbox"><span>
                            <label for="st2"></label></span>
                      </div><span class="name">Enable notifications</span>
                    </li>
                    <li>
                      <div class="switch-button switch-button-sm">
                        <input checked="checked" name="st3" id="st3" type="checkbox"><span>
                            <label for="st3"></label></span>
                      </div><span class="name">Login with Facebook</span>
                    </li>
                  </ul><span class="category-title">Notifications</span>
                  <ul class="settings-list">
                    <li>
                      <div class="switch-button switch-button-sm">
                        <input name="st4" id="st4" type="checkbox"><span>
                            <label for="st4"></label></span>
                      </div><span class="name">Email notifications</span>
                    </li>
                    <li>
                      <div class="switch-button switch-button-sm">
                        <input checked="checked" name="st5" id="st5" type="checkbox"><span>
                            <label for="st5"></label></span>
                      </div><span class="name">Project updates</span>
                    </li>
                    <li>
                      <div class="switch-button switch-button-sm">
                        <input checked="checked" name="st6" id="st6" type="checkbox"><span>
                            <label for="st6"></label></span>
                      </div><span class="name">New comments</span>
                    </li>
                    <li>
                      <div class="switch-button switch-button-sm">
                        <input name="st7" id="st7" type="checkbox"><span>
                            <label for="st7"></label></span>
                      </div><span class="name">Chat messages</span>
                    </li>
                  </ul><span class="category-title">Workflow</span>
                  <ul class="settings-list">
                    <li>
                      <div class="switch-button switch-button-sm">
                        <input name="st8" id="st8" type="checkbox"><span>
                            <label for="st8"></label></span>
                      </div><span class="name">Deploy on commit</span>
                    </li>
                  </ul>
                  <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                    <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                  </div>
                  <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                    <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <script src="Beagle/jquery_007.js" type="text/javascript"></script>
  <script src="Beagle/perfect-scrollbar.js" type="text/javascript"></script>
  <script src="Beagle/main.js" type="text/javascript"></script>
  <script src="Beagle/bootstrap.js" type="text/javascript"></script>
  <script src="Beagle/jquery_006.js" type="text/javascript"></script>
  <script src="Beagle/jquery_003.js" type="text/javascript"></script>
  <script src="Beagle/jquery_005.js" type="text/javascript"></script>
  <script src="Beagle/jquery_008.js" type="text/javascript"></script>
  <script src="Beagle/curvedLines.js" type="text/javascript"></script>
  <script src="Beagle/jquery.js" type="text/javascript"></script>
  <script src="Beagle/countUp.js" type="text/javascript"></script>
  <script src="Beagle/jquery-ui.js" type="text/javascript"></script>
  <script src="Beagle/jquery_002.js" type="text/javascript"></script>
  <script src="Beagle/jquery_004.js" type="text/javascript"></script>

  <script src="grafik_files/Chart.js" type="text/javascript"></script>
	
  <script type="text/javascript">
  $(document).ready(function() {
    //initialize the javascript
     App.init();
     App.dashboard();
  //  App.charts();
  });
	function utama(){
		 App.charts();
	}
  </script>

  <div class="be-scroll-top" style="display: none;"></div>
  <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>
  <div class="jqvmap-label" style="display: none;"></div>
</body>

</html>
