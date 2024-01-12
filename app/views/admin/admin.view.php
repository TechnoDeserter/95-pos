<?php require viewpath('partials/head');?>

<div class="dashboard-container">
  <div class="sidebar">
    
    <ul class="menu">
      <li>
        <a href="index.php?page=admin&tab=dashboard" class="menu-item <?=!$tab || $tab == 'dashboard'?'active':''?>">
        <i class="fa-solid fa-chart-line"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="index.php?page=admin&tab=products" class="menu-item <?=$tab=='products'?'active':''?>">
        <i class="fa-solid fa-cart-plus"></i> Products
        </a>
      </li>
      <li>
        <a href="index.php?page=admin&tab=sales" class="menu-item <?=$tab=='sales'?'active':''?>">
        <i class="fa-solid fa-file-circle-check"></i> Sales Reports
        </a>
      </li>
      <li>
        <a href="index.php?page=admin&tab=users" class="menu-item <?=$tab=='users'?'active':''?>">
        <i class="fa-solid fa-users"></i> Users/Roles
        </a>
      </li>
      <li>
        <a href="index.php?page=logout" class="menu-item">
        <i class="fa-solid fa-right-from-bracket"></i> Log Out
        </a>
      </li>      
    </ul>
  </div>
  
  <div class="content">
    <div class="content-header">
      <h2><?= strtoupper($tab) ?></h2>
    </div>
    
    <div class="content-body">
      <?php
        switch ($tab) {
          case 'products':
            require viewpath('admin/products');
            break;

          case 'users':
            require viewpath('admin/users');
            break;

          case 'sales':
            require viewpath('admin/sales');
            break;

          default:
            require viewpath('admin/dashboard');
            break;
        }
      ?>
    </div>
  </div>
</div>

<?php require viewpath('partials/foot'); ?>
