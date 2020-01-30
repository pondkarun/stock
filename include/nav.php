<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <!-- <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> -->
        </button>
        <a class="navbar-brand" href="index.php"><strong><i class="fa fa-home"></i>
                CRU MSCI</strong></a>

        <div id="sideNav" href="">
            <!-- <i class="fa fa-bars icon"></i> -->
        </div>
    </div>

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> <span style="color: #F36A5A;"><?php echo $fullname; ?></span> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <!-- <li><a href="edit-profile.php"><i class="fa fa-user-edit fa-fw"></i> แก้ไขข้อมมูลส่วนตัว</a>
                </li> -->

                <li class="divider"></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</nav>