<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">

  <div class = "container-fluid">

    <a class="navbar-brand" href="../pages/home.php">
      <img src="../images/Logo3.png" height="80" class="d-inline-block pull-left" alt="">
      <span class="name pull-left"><strong>Ride the Beat</strong></span>

    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <div class="navbar-nav mr-auto">
        <form class="navbar-form navbar-left" action="results.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
              <button class="btn btn-success" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <ul class="navbar-nav ml-auto">
        <?php
        if($curr_security_level > 1){
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="admin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../pages/admin_user.php">Edit User Accounts</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../pages/admin_playlist.php">Edit User Playlists</a>
                <div class="dropdown-divider"></div>
<<<<<<< HEAD
                
=======
                <a class="dropdown-item" href="../pages/admin_rating.php">Edit User Ratings</a>
>>>>>>> a14f45a6ade333769a1482c849166afdde180e51
            </div>
          </li>
        <?php
        }
        ?>
        <li class="nav-item"><a class="nav-link" href="../pages/about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/discover.php">Discover</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/user_playlist.php">Playlists</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Settings
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../pages/profile.php">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../backend/logout.php">Log Out</a>
          </div>
        </li>
        <input id="lightmode" type="checkbox" <?php if($_SESSION["lightmode"] == false){ echo "checked";}?> data-toggle="toggle"data-height="35" data-width="145" data-on="<i class='fas fa-moon'></i> Dark Mode" data-off="<i class='fas fa-sun'></i> Light Mode" data-onstyle="success" data-offstyle="dark">
        <!--<button class="nav-link btn btn-success navbar-btn ml-2 green-btn" id="lightmode">Light Mode</button>-->
      </ul>
    </div>
  </div>
</nav>
