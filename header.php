<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if(isset($_SESSION['login_type']) && $_SESSION['login_type']=='admin'){?>
            <a class="navbar-brand" href="admin.php">MyHealthTalk</a>
            <?php }else{ ?>
            <a class="navbar-brand" href="index.php">MyHealthTalk</a>
            <?php } ?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['login_id'])) {
                ?>
                <li><a href="appointment_details.php"> Appointments</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-comment"></span> Chats</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php
                } else {
                ?>
                <li><a href="aboutus.php"><span class="glyphicon glyphicon-tasks"></span> About Us</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-phone"></span> Contact Us</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>