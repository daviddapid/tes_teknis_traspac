<!DOCTYPE html>
<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="/assets/"
   data-template="vertical-menu-template-free" lang="en" dir="ltr">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

   <title>Tes Teknis Backend | David Bontha</title>

   <meta name="description" content="" />

   <!-- Favicon -->
   <link type="image/x-icon" href="/assets/img/favicon/favicon.ico" rel="icon" />

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com" rel="preconnect" />
   <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
   <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

   <!-- Icons. Uncomment required icon fonts -->
   <link href="/assets/vendor/fonts/boxicons.css" rel="stylesheet" />

   <!-- Core CSS -->
   <link class="template-customizer-core-css" href="/assets/vendor/css/core.css" rel="stylesheet" />
   <link class="template-customizer-theme-css" href="/assets/vendor/css/theme-default.css" rel="stylesheet" />
   <link href="/assets/css/demo.css" rel="stylesheet" />

   <!-- Vendors CSS -->
   <link href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />
   <link href="/assets/vendor/libs/apex-charts/apex-charts.css" rel="stylesheet" />
   <link href="/assets/vendor/libs/select2/css/select2.min.css" rel="stylesheet" />
   <link href="/assets/vendor/libs/select2/theme/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
   <link href="/assets/vendor/libs/dropify-master/dist/css/dropify.min.css" rel="stylesheet" />
   <link href="/assets/vendor/css/tree-view.css" rel="stylesheet" />

   {{-- custom css utils --}}
   <style>
      .w-fit {
         width: fit-content !important;
      }
   </style>

   {{-- override --}}
   <link href="/assets/css/override.css" rel="stylesheet" />
   <style>
      .swal2-container {
         z-index: 99999;
      }

      .select2-selection.select2-selection--single {
         padding-right: 50px !important;
      }

      .select2-results__group {
         color: black !important;
      }

      .nav-tabs .nav-link {
         background-color: transparent !important;
      }

      .nav-tabs .nav-link.active {
         background-color: transparent;
         border-bottom: 1px solid var(--bs-primary) !important;
      }

      /* bootstrap sneat */
      .menu-sub {
         margin-left: 25px;
         border-left: 1px solid rgb(149, 149, 149);
      }

      .menu-link {
         margin-inline: 0 !important;
         padding-left: 10px !important;
      }

      .menu-item.open.active .menu-link {
         color: var(--bs-primary) !important;
      }

      .menu-link,
      .menu-link.menu-toggle {
         padding-left: 50px !important;
      }

      .menu-toggle::after {
         left: 23px !important;
      }

      .menu-link::before {
         content: none !important;
      }
   </style>

   <!-- Page CSS -->
   <style>
      .w-fit {
         width: fit-content;
      }

      .fit-center {
         width: 9px;
         text-align: center;
         white-space: nowrap
      }
   </style>
   @stack('heads')

   <!-- Helpers -->
   <script src="/assets/vendor/js/helpers.js"></script>

   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="/assets/js/config.js"></script>
</head>

<body>
   @include('sweetalert::alert')

   <!-- Layout wrapper -->
   <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
         <!-- Menu -->

         <aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
            <div class="app-brand demo">
               <a class="app-brand-link" href="index.html">
                  <span class="app-brand-logo demo">
                     <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                           <path id="path-1"
                              d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z">
                           </path>
                           <path id="path-3"
                              d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z">
                           </path>
                           <path id="path-4"
                              d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z">
                           </path>
                           <path id="path-5"
                              d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z">
                           </path>
                        </defs>
                        <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                              <g id="Icon" transform="translate(27.000000, 15.000000)">
                                 <g id="Mask" transform="translate(0.000000, 8.000000)">
                                    <mask id="mask-2" fill="white">
                                       <use xlink:href="#path-1"></use>
                                    </mask>
                                    <use fill="#696cff" xlink:href="#path-1"></use>
                                    <g id="Path-3" mask="url(#mask-2)">
                                       <use fill="#696cff" xlink:href="#path-3"></use>
                                       <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                    </g>
                                    <g id="Path-4" mask="url(#mask-2)">
                                       <use fill="#696cff" xlink:href="#path-4"></use>
                                       <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                    </g>
                                 </g>
                                 <g id="Triangle"
                                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                    <use fill="#696cff" xlink:href="#path-5"></use>
                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                 </g>
                              </g>
                           </g>
                        </g>
                     </svg>
                  </span>
                  <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
               </a>

               <a class="layout-menu-toggle menu-link text-large d-block d-xl-none ms-auto" href="javascript:void(0);">
                  <i class="bx bx-chevron-left bx-sm align-middle"></i>
               </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
               <!-- pegawai data -->
               <li class="menu-item @yield('nav-pegawai')">
                  <a class="menu-link menu-toggle" href="javascript:void(0);">
                     <div data-i18n="Layouts">Pegawai</div>
                  </a>

                  <ul class="menu-sub">
                     <li class="menu-item @yield('nav-pegawai-index')">
                        <a class="menu-link" href="{{ route('pegawai.index') }}">
                           <div data-i18n="Without menu">Lihat Data</div>
                        </a>
                     </li>
                     <li class="menu-item @yield('nav-pegawai-create')">
                        <a class="menu-link" href="{{ route('pegawai.create') }}">
                           <div data-i18n="Without navbar">Tambah Data</div>
                        </a>
                     </li>

                  </ul>
               </li>

               <!-- master data -->
               <li class="menu-item @yield('nav-master')">
                  <a class="menu-link menu-toggle" href="javascript:void(0);">
                     <div data-i18n="Layouts">Master Data</div>
                  </a>

                  <ul class="menu-sub">
                     <li class="menu-item @yield('nav-master-agama')">
                        <a class="menu-link menu-toggle">
                           <div data-i18n="Without menu">Agama</div>
                        </a>
                        <ul class="menu-sub">
                           <li class="menu-item">
                              <a class="menu-link" href="{{ route('agama.index') }}">
                                 <div data-i18n="Without menu">Lihat Data</div>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="menu-item @yield('nav-master-eselon')">
                        <a class="menu-link menu-toggle" href="layouts-without-menu.html">
                           <div data-i18n="Without menu">Eselon</div>
                        </a>
                        <ul class="menu-sub">
                           <li class="menu-item">
                              <a class="menu-link" href="{{ route('eselon.index') }}">
                                 <div data-i18n="Without menu">Lihat Data</div>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="menu-item @yield('nav-master-golongan')">
                        <a class="menu-link menu-toggle" href="layouts-without-menu.html">
                           <div data-i18n="Without menu">Golongan</div>
                        </a>
                        <ul class="menu-sub">
                           <li class="menu-item">
                              <a class="menu-link" href="{{ route('golongan.index') }}">
                                 <div data-i18n="Without menu">Lihat Data</div>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="menu-item @yield('nav-master-jabatan')">
                        <a class="menu-link menu-toggle" href="layouts-without-menu.html">
                           <div data-i18n="Without menu">Jabatan</div>
                        </a>
                        <ul class="menu-sub">
                           <li class="menu-item">
                              <a class="menu-link" href="{{ route('jabatan.index') }}">
                                 <div data-i18n="Without menu">Lihat Data</div>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="menu-item @yield('nav-master-jenis-kelamin')">
                        <a class="menu-link menu-toggle" href="layouts-without-menu.html">
                           <div data-i18n="Without menu">Jenis Kelamin</div>
                        </a>
                        <ul class="menu-sub">
                           <li class="menu-item">
                              <a class="menu-link" href="{{ route('jenis-kelamin.index') }}">
                                 <div data-i18n="Without menu">Lihat Data</div>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="menu-item @yield('nav-master-unit-kerja')">
                        <a class="menu-link menu-toggle">
                           <div data-i18n="Without menu">Unit Kerja</div>
                        </a>
                        <ul class="menu-sub">
                           <li class="menu-item">
                              <a class="menu-link" href="{{ route('unit-kerja.index') }}">
                                 <div data-i18n="Without menu">Lihat Data</div>
                              </a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </li>
            </ul>
         </aside>
         <!-- / Menu -->

         <!-- Layout container -->
         <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
               id="layout-navbar">
               <div class="layout-menu-toggle navbar-nav align-items-xl-center me-xl-0 d-xl-none me-3">
                  <a class="nav-item nav-link me-xl-4 px-0" href="javascript:void(0)">
                     <i class="bx bx-menu bx-sm"></i>
                  </a>
               </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
               <!-- Content -->

               <div class="container-xxl flex-grow-1 container-p-y">
                  @yield('content')
               </div>
               <!-- / Content -->

               <!-- Footer -->
               <footer class="content-footer footer bg-footer-theme">
                  <div class="container-xxl d-flex justify-content-between flex-md-row flex-column flex-wrap py-2">
                     <div class="mb-md-0 mb-2">
                        ©
                        <script>
                           document.write(new Date().getFullYear());
                        </script>
                        , made with ❤️ by
                        <a class="footer-link fw-bolder" href="https://daviddapid.github.io"
                           target="_blank">daviddapid.github.io</a>
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
   </div>
   <!-- / Layout wrapper -->


   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="/assets/vendor/libs/jquery/jquery.js"></script>
   <script src="/assets/vendor/libs/popper/popper.js"></script>
   <script src="/assets/vendor/js/bootstrap.js"></script>
   <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

   <script src="/assets/vendor/js/menu.js"></script>
   <!-- endbuild -->

   <!-- Vendors JS -->
   <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>
   <script src="/assets/vendor/libs/select2/js/select2.min.js"></script>
   <script src="/assets/vendor/libs/dropify-master/dist/js/dropify.min.js"></script>
   <script src="/assets/vendor/js/tree-view.js"></script>

   <!-- Main JS -->
   <script src="/assets/js/main.js"></script>

   {{-- setup js vendors --}}
   <script>
      $(document).ready(function() {
         $('.select2').select2({
            theme: 'bootstrap-5',
            allowClear: true,
            placeholder: ' ',
         });
         $('.dropify').dropify({
            tpl: {
               message: '<div class="dropify-message"><span class="file-icon" /></div>',
            }
         });
      });
   </script>

   <!-- Page JS -->
   <script src="/assets/js/dashboards-analytics.js"></script>
   @stack('scripts')

   <!-- Place this tag in your head or just before your close body tag. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>