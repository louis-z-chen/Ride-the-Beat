<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top" style="background-color: #212121 !important">

  <div class = "container-fluid">

    <a class="navbar-brand" href="home.php">
      <img src="images/Logo3.png" height="80" class="d-inline-block pull-left" alt="">
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
        <li class="nav-item"><a class="nav-link" href="">About</a></li>
        <li class="nav-item"><a class="nav-link" href="">Discover</a></li>
        <li class="nav-item"><a class="nav-link" href="">Playlists</a></li>
        <li class="nav-item"><a class="nav-link" href="">Profile</a></li>
        <li class="nav-item"><a class="nav-link btn btn-success navbar-btn green-button" href="logout.php" style="color: white !important">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
