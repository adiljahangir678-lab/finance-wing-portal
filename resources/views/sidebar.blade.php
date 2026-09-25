<!-- HTML + CSS Combined Code -->
<style>
  /* Sidebar Container Fit Styling */
  .custom-sidebar-wrapper {
    width: 100% !important;
    padding: 10px 8px !important;
    box-sizing: border-box !important;
  }

  /* Section Titles */
  .custom-sidebar-wrapper .menu-title {
    font-size: 0.7rem !important;
    font-weight: 700 !important;
    color: #8a96a3 !important;
    letter-spacing: 0.8px !important;
    margin: 14px 0 6px 4px !important;
    text-transform: uppercase !important;
  }

  /* Big & Clean Buttons (Fits Exactly Inside Sidebar) */
  .custom-sidebar-wrapper .sidebar-btn {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    width: 100% !important;
    padding: 10px 12px !important;
    margin-bottom: 6px !important;
    background: #f8f9fa !important;
    border: 1px solid #e2e5e9 !important;
    border-radius: 6px !important;
    color: #2c3947 !important;
    text-decoration: none !important;
    font-weight: 600 !important;
    font-size: 0.85rem !important;
    box-sizing: border-box !important;
    transition: all 0.2s ease-in-out !important;
  }

  .custom-sidebar-wrapper .sidebar-btn .btn-content {
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    overflow: hidden !important;
    white-space: nowrap !important;
    text-overflow: ellipsis !important;
  }

  .custom-sidebar-wrapper .sidebar-btn .btn-icon {
    font-size: 1rem !important;
    min-width: 18px !important;
    text-align: center !important;
  }

  .custom-sidebar-wrapper .sidebar-btn .arrow-icon {
    font-size: 0.7rem !important;
    color: #a9b1bb !important;
    transition: transform 0.2s ease !important;
  }

  /* Hover Effects */
  .custom-sidebar-wrapper .sidebar-btn:hover {
    background: #3f7edb !important;
    color: #ffffff !important;
    border-color: #3f7edb !important;
    box-shadow: 0 3px 6px rgba(63, 126, 219, 0.2) !important;
  }

  .custom-sidebar-wrapper .sidebar-btn:hover .btn-icon,
  .custom-sidebar-wrapper .sidebar-btn:hover .arrow-icon {
    color: #ffffff !important;
  }

  .custom-sidebar-wrapper .sidebar-btn:hover .arrow-icon {
    transform: translateX(3px) !important;
  }
</style>

<div class="custom-sidebar-wrapper">

  @canany(['isB1', 'isB2', 'isB3', 'isB4', 'isB5', 'isB6'])
      
 
  <!-- BUDGET BRANCHES SECTION -->
  <div class="menu-title text-uppercase small text-muted fw-bold px-3 my-2">Budget Branches</div>

  @can('isB1')
  <a href="{{route('budget1.dashboard')}}" class="sidebar-btn">
    <div class="btn-content">
      <i class="fa-solid fa-wallet btn-icon text-primary"></i>
      <span>Budget Branch-I</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
  </a> 
  @endcan

  @can('isB2')
  <a href="#" class="sidebar-btn">
    <div class="btn-content">
      <i class="fa-solid fa-wallet btn-icon text-primary"></i>
      <span>Budget Branch-II</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
  </a>
  @endcan

  @can('isB3')
  <a href="#" class="sidebar-btn">
    <div class="btn-content">
      <i class="fa-solid fa-wallet btn-icon text-primary"></i>
      <span>Budget Branch-III</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
  </a>
  @endcan

  @can('isB4')
  <a href="#" class="sidebar-btn">
    <div class="btn-content">
      <i class="fa-solid fa-wallet btn-icon text-primary"></i>
      <span>Budget Branch-IV</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
  </a>
  @endcan

  @can('isB5')
  <a href="#" class="sidebar-btn">
    <div class="btn-content">
      <i class="fa-solid fa-wallet btn-icon text-primary"></i>
      <span>Budget Branch-V</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
  </a>
  @endcan


  @can('isB6')
  <a href="#" class="sidebar-btn">
    <div class="btn-content">
      <i class="fa-solid fa-wallet btn-icon text-primary"></i>
      <span>Budget Branch-VI</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
  </a>
  @endcan

@endcanany <!-- end budget section... -->

@canany(['isA1', 'isA2', 'isA3'])
  <!-- AUDIT BRANCHES SECTION -->
  <div class="menu-title">AUDIT BRANCHES</div>

  @can('isA1')
  <a href="#" class="sidebar-btn">
    <div class="btn-content">
      <i class="fa-solid fa-file-invoice-dollar btn-icon text-success"></i>
      <span>Audit Branch-I</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
  </a>
  @endcan

  @can('isA2')
  <a href="#" class="sidebar-btn">
    <div class="btn-content">
      <i class="fa-solid fa-file-invoice-dollar btn-icon text-success"></i>
      <span>Audit Branch-II</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
  </a>
  @endcan

  @can('isA3')
  <a href="#" class="sidebar-btn">
    <div class="btn-content">
      <i class="fa-solid fa-file-invoice-dollar btn-icon text-success"></i>
      <span>Audit Branch-III</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
  </a>
  @endcan
@endcanany
</div>