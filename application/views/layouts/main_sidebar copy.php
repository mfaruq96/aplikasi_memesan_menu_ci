
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center py-5" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Soto Mie Bogor Boga Rasa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

			<!--  -->

			<!-- Query Menu -->
			<?php
			$id_role = $this->session->userdata('id_role');
			$queryMenu = "SELECT `menus` . `id_menu` , `menu`
							FROM `menus` JOIN `access_menus`
							ON `menus` . `id_menu` = `access_menus` . `id_menu`
							WHERE `access_menus` . `id_role` = $id_role
							ORDER BY `menus` . `number` ASC
						";
			$menu = $this->db->query($queryMenu)->result_array();
			?>

			<!-- Looping Menu -->
			<?php foreach ($menu as $m) : ?>

				<!-- Heading -->
				<div class="sidebar-heading">
					<?= $m['menu']; ?>
				</div>

				<!-- Siapkan Sub Menu Sesuai Menu -->
				<?php
				$menuId = $m['id_menu'];
				$querySubMenu = "SELECT *
							FROM `sub_menus` JOIN `menus`
							ON `sub_menus` . `id_menu` = `menus` . `id_menu`
							WHERE `sub_menus` . `id_menu` = $menuId
							AND `sub_menus` . `is_active` = 1
						";
				$subMenu = $this->db->query($querySubMenu)->result_array();
				?>

				<?php foreach ($subMenu as $sm) : ?>
					<!-- Nav Item -->
					<?php if( $active == $sm['title'] ) : ?>
						<li class="nav-item active">
					<?php else : ?>
						<li class="nav-item">
					<?php endif; ?>
						<a class="nav-link" href="<?= base_url($sm['url']); ?>">
							<i class="<?= $sm['icon']; ?>"></i>
							<span><?= $sm['title']; ?></span>
						</a>
					</li>
				<?php endforeach ?>
				<!-- End Siapkan Sub Menu Sesuai Menu -->

				<!-- Divider -->
				<hr class="sidebar-divider">

			<?php endforeach; ?>
			<!-- End Query Menu -->

			<!--  -->

			<!-- Heading -->
            <div class="sidebar-heading">
                Home
            </div>

            <!-- Nav Item - Home -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Heading -->
            <div class="sidebar-heading">
                Orders Management
            </div>

            <!-- Nav Item - Order Verification -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Order Verification</span></a>
            </li>
            
			<!-- Nav Item - Order Process -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Order Process</span></a>
            </li>

			<!-- Nav Item - All Orders -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>All Orders</span></a>
            </li>

			<!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Heading -->
            <div class="sidebar-heading">
                Products Management
            </div>

            <!-- Nav Item - Categories -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Categories</span></a>
            </li>
            
			<!-- Nav Item - Products -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Products</span></a>
            </li>

			<!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Heading -->
            <div class="sidebar-heading">
                Users Management
            </div>

            <!-- Nav Item - All Users -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-users"></i>
                    <span>All Users</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Heading -->
            <div class="sidebar-heading">
                Profile
            </div>

            <!-- Nav Item - All Users -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('profile'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
