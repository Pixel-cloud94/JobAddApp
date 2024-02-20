<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GetHeroed</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?php echo request()->is('login*') ? 'active' : ''; ?>" href="/login" aria-current="<?php echo request()->is('login*') ? 'page' : ''; ?>">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo request()->is('register*') ? 'active' : ''; ?>" href="/register" aria-current="<?php echo request()->is('register*') ? 'page' : ''; ?>">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo request()->is('about*') ? 'active' : ''; ?>" href="/about" aria-current="<?php echo request()->is('about*') ? 'page' : ''; ?>">About</a>
        </li>       
    </ul>
</div>

  </div>
</nav>