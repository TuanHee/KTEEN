<nav class="k-side-nav nav flex-column col-2 border-right bg-white p-0">
	<div class="logo">
		<h2>
		    <a href="index.php" class="d-flex d-md-none">K</a>
		    <a href="index.php" class="d-none d-md-flex">KTEEN</a>
		</h2>
	</div>
	<div class="k-nav-container h-75">
        <ul class="k-nav nav">
            <li class="nav-item w-100 mb-1">
                <a href="index.php" class="nav-link w-100 <?php if($site == 'Home'){ echo 'active'; } ?>">
                    <i class="fas fa-home d-inline-flex px-auto"></i>
                    <span class="d-none d-lg-inline-flex ml-3">Home</span>
                </a>
            </li>
            <li class="nav-item w-100 mb-1">
                <a href="view_order.php" class="nav-link w-100 <?php if($site == 'Order'){ echo 'active'; } ?>">
                    <i class="fas fa-clipboard-list"></i>
                    <span class="d-none d-lg-inline-flex ml-3">Order List</span>
                </a>
            </li>
            <li class="nav-item w-100 mb-1">
                <a href="menu.php" class="nav-link w-100 <?php if($site == 'Menu'){ echo 'active'; } ?>">
                    <i class="fas fa-bars d-inline-flex"></i>
                    <span class="d-none d-lg-inline-flex ml-3">Menu</span>
                </a>
            </li>
        </ul>
    </div>
</nav>