<?php
    if (!$this->session->has_userdata('admin')) {
        redirect(site_url());
    }
    //echo "<pre>";
    //print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Dashboard</title>

         <!-- Bootstrap CSS CDN -->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          
       
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo site_url()?>css/style4.css">
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Tasky</h3>
                    <strong>TK</strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="<?php echo site_url()."home"?>">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-people-carry"></i>
                            Teams
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="<?php echo site_url()."teams"?>">Add Team</a></li>
                            <li><a href="<?php echo site_url()."teams/teams"?>">All Teams</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#membersb" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-users"></i>
                            Members
                        </a>
                        <ul class="collapse list-unstyled" id="membersb">
                            <li><a href="<?php echo site_url()."members"?>">Add Member</a></li>
                            <li><a href="<?php echo site_url()."members/members"?>">All Members</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#tasks" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-tasks"></i>
                            Tasks
                        </a>
                        <ul class="collapse list-unstyled" id="tasks">
                            <li><a href="<?php echo site_url()."tasks/index"?>">Assign Task</a></li>
                            <li><a href="<?php echo site_url()."tasks/tasks"?>">The Tasks</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#meetingssm" data-toggle="collapse" aria-expanded="false">
                            <i class="far fa-handshake"></i>
                            Meeting
                        </a>
                        <ul class="collapse list-unstyled" id="meetingssm">
                            <li><a href="<?php echo site_url()."meetings/index"?>">Add Meeting</a></li>
                            <li><a href="<?php echo site_url()."meetings/meetings"?>">The Meetings</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="<?php echo site_url()."home/settings"?>">
                            <i class="fas fa-user-edit"></i>
                            Settings
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()."home/logout"?>">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" style="width: 100%">
                <button type="button" id="sidebarCollapse" style="position: absolute;" class="btn btn-info navbar-btn">
                    <i class="glyphicon glyphicon-align-left"></i>
                </button>
                <!-- <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                        </div>
                    </div>
                </nav> -->
