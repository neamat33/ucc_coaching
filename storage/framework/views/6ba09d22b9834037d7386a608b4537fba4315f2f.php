<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo e(asset('admin')); ?>/assets/" data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $__env->yieldContent('page-title','Dashboard'); ?> | <?php echo e(config('app.name')); ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('admin')); ?>/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/assets/vendor/css/pages/cards-advance.css" />

    <!-- Helpers -->
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('admin')); ?>/assets/js/config.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php echo $__env->make('admin.layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <?php echo $__env->yieldContent('content'); ?>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-medium">Pixinvent</a>
                  </div>
                  
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/swiper/swiper.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->
    <script src="<?php echo e(asset('admin')); ?>/assets/js/main.js"></script>

    <!-- Page JS -->
        <!-- Page JS -->
    <script src="<?php echo e(asset('admin')); ?>/assets/js/tables-datatables-basic.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/js/dashboards-analytics.js"></script>
  </body>
</html>
<?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>