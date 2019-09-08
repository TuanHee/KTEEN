<nav class="k-side-nav nav flex-column col-2 border-right bg-white p-0">
    <div class="logo">
        <h2>
            <a href="index.php" class="d-flex d-md-none">K</a>
            <a href="index.php" class="d-none d-md-flex">KTEEN</a>
        </h2>
    </div>
    <div class="k-nav-container h-75">
        <ul class="k-nav nav">
            <?php if ($site == 'index') { ?>
                <li class="nav-item w-100 mb-1">
                    <a href="index.php" class="nav-link w-100 active">
                        <i class="fas fa-bars d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Home</span>
                    </a>
                </li>
            <?php }else{ ?>
                <li class="nav-item w-100 mb-1">
                    <a href="index.php" class="nav-link w-100">
                        <i class="fas fa-arrow-left"></i>
                        <span class="d-none d-md-inline-flex ml-3">Cancel</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>