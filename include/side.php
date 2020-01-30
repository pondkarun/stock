<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="<?php echo $_GET['active'] == 'withdraw' ? 'active-menu' : '' ?>" href="withdraw.php?active=withdraw"><i class="fa fa-eject"></i> เบิกพัสดุ</a>
            </li>
            <li>
                <a class="<?php echo $_GET['active'] == 'supplies' ? 'active-menu' : '' ?>" href="supplies.php?active=supplies"><i class="fa fa-book"></i> จัดการพัสดุ</a>
            </li>
            <!-- <li>
                <a class="<?php echo $_GET['active'] == 'teacher' ? 'active-menu' : '' ?>" href="teacher.php?active=teacher"><i class="fa fa-user"></i> จัดการอาจารย์</a>
            </li> -->



        </ul>

    </div>

</nav>