
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/bapenda.png') ?>">
  <title>
    Arsip Penomoran Surat Keluar
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.1.0') ?>" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



</head>


<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://9a06-114-10-45-240.ngrok-free.app/arsip/index.php/Guest/beranda_admin" target="_blank">
        <img src="<?= base_url('assets/img/bapenda.png') ?>" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Bapenda Jabar</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('/index.php/Guest/beranda_admin') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <!-- Digital Numbering (Dropdown) -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#submenu-digital-numbering" role="button" aria-expanded="false" aria-controls="submenu-digital-numbering">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Digital Numbering</span>
          </a>
          <div class="collapse" id="submenu-digital-numbering">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/index.php/penomoran/Penomoran/data_slot') ?>">
                  <span class="sidenav-mini-icon">A</span>
                  <span class="sidenav-normal">Data Slot Nomor</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/index.php/penomoran/Penomoran/add_penomoran') ?>">
                  <span class="sidenav-mini-icon">B</span>
                  <span class="sidenav-normal">Data Penomoran</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/Guest/Penomoran/Specimen/data_specimen') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Specimen</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/Guest/') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Barcode</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-in.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-up.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="p-2 w-100 mx-auto" src="<?= base_url('assets/img/illustrations/logobapen.png') ?>" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <img class=" w-100 mx-auto" src="<?= base_url('assets/img/gemahripah.png') ?>" alt="sidebar_illustration">
          <!-- <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div> -->
        </div>
      </div>
      <!-- <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a> -->
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tables</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">History Tables</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="<?= base_url('assets/img/team-2.jpg') ?>" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="<?= base_url('assets/img/small-logos/logo-spotify.svg') ?>" class="avatar avatar-sm bg-gradient-dark me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <?php if (isset($_GET['success'])): ?>
        <div id="successAlert" class="alert alert-success">
          Data slot berhasil ditambahkan!
        </div>
        <script>
          setTimeout(function() {
            const alert = document.getElementById('successAlert');
            if (alert) {
              alert.style.display = 'none';
            }
          }, 1000);
        
          if (window.location.search.includes('success=1')) {
            const url = new URL(window.location.href);
            url.searchParams.delete('success');
            window.history.replaceState({}, document.title, url.pathname);
          }
        </script>
      <?php endif; ?>
        
        <div class="row">
            <div class="col-12">
              
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>History's Table of Slot</h6>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addSlotModal">
                            Tambah Slot
                        </button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                          
                        <table class="table table-bordered table-striped align-items-center mb-0">
    <thead class="thead-dark">
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th> 
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Surat</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Booking Slot</th>
            <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th> -->
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>                                      
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data_slot)): ?>
            <?php foreach ($data_slot as $row): ?>
                <tr>
                <td><?= date('d F Y', strtotime($row['tanggal'])); ?></td>
                <td class="text-center"><?= htmlspecialchars($row['nama_jenis']); ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['slot']); ?></td>
                    <!-- <td class="text-center"><?= htmlspecialchars($row['created_at']); ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['updated_at'] ?? '-'); ?></td> -->
                    <td class="text-center">
                      <button class="btn btn-sm btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#editSlotModal"
                      data-id="<?= $row['id']; ?>"
                      data-jenis="<?= $row['jenis_surat_id']; ?>"
                      data-slot="<?= $row['slot']; ?>"
                      data-tanggal="<?= $row['tanggal']; ?>"
                    >
                      <i class="fa fa-pencil fixed-plugin-button-nav cursor-pointer"></i>
                    </button>

                    <button class="btn btn-sm btn-danger delete-slot"
  data-id="<?= $row['id']; ?>">
  Hapus
</button>


                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada histori slot.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Modal Tambah Slot -->
<div class="modal fade" id="addSlotModal" tabindex="-1" aria-labelledby="addSlotModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= base_url("index.php/penomoran/Penomoran/do_input_slot") ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="addSlotModalLabel">Tambah Slot</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Jenis Surat -->
          <div class="mb-3">
            <label class="form-label">Pilih Jenis Surat</label>
            <div id="jenisSuratContainer"></div>
          </div>

          <!-- Input jumlah slot per jenis -->
          <div id="slotInputsContainer"></div>

          <!-- Tanggal -->
          <div class="mb-3 mt-3">
            <label for="tanggalSlot" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggalSlot" name="tanggal" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="submitSlotBtn">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

                    <!-- END Modal -->
                    <div class="modal fade" id="editSlotModal" tabindex="-1" aria-labelledby="editSlotModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" action="<?= base_url("index.php/penomoran/Penomoran/do_edit_slot") ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editSlotModalLabel">Edit Slot</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                          </div>

                          <div class="modal-body">
                            <!-- Hidden ID -->
                            <input type="hidden" name="id_slot" id="editIdSlot">

                            <?php 
               $jenisSurat = $this->db->get('jenis_surat')->result_array();
               ?>

                            <!-- Jenis Surat -->
                            <div class="mb-3">
                              <label for="editJenisSurat" class="form-label">Jenis Surat</label>
                              <select class="form-select" name="jenis_surat_id" id="editJenisSurat" required>
                                <?php foreach ($jenisSurat as $jenis): ?>
                                  <option value="<?= $jenis['id'] ?>"><?= $jenis['nama_jenis'] ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>

                            <!-- Slot -->
                            <div class="mb-3">
                              <label for="editSlotJumlah" class="form-label">Jumlah Slot</label>
                              <input type="number" class="form-control" name="slot" id="editSlotJumlah" min="1" required>
                            </div>

                            <!-- Tanggal -->
                            <div class="mb-3">
                              <label for="editTanggalSlot" class="form-label">Tanggal</label>
                              <input type="date" class="form-control" name="tanggal" id="editTanggalSlot" required>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                          </div>
                        </form>
                      </div>
                    </div>
</div>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
                <!-- made with <i class="fa fa-heart"></i> by -->
                <!-- <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a> -->
                <!-- Arsiparis Badan Pendapatan Daerah. -->
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://twitter.com/bapenda_jabar" class="fab fa-twitter-square me-2" target="_blank" style="font-size: 24px; color: #1da1f2;"></a>
                </li>
                <li class="nav-item">
                  <a href="https://www.facebook.com/bapenda.jabar/?locale=id_ID" class="fab fa-facebook-square me-2" target="_blank" style="font-size: 24px; color: #3b5998;"></a>
                </li>
                <li class="nav-item">
                  <a href="https://www.instagram.com/bapenda.jabar" class="fab fa-instagram-square me-2" target="_blank" style="font-size: 24px; color: #c13584;"></a>
                </li>
                <li class="nav-item">
                  <a href="https://bapenda.jabarprov.go.id/" class="fas fa-globe me-2" target="_blank" style="font-size: 24px; color: #4CAF50;" title="Website Bapenda Jabar"></a>
                </li>
                  <li class="nav-item">
                  <a href="https://www.youtube.com/channel/@BapendaJabar" class="fab fa-youtube-square me-2" target="_blank" style="font-size: 24px; color: #ff0000;"></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Setting</h5>
          <!-- <p>See our dashboard options.</p> -->
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <!-- <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div> -->
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>

  <?php if ($this->session->flashdata('success_slot')): ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '<?= $this->session->flashdata("success_slot") ?>',
  timer: 2000,
  showConfirmButton: false
});
</script>
<?php endif; ?>


<?php if ($this->session->flashdata('success_edit')): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '<?= $this->session->flashdata('success_edit'); ?>',
      showConfirmButton: false,
      timer: 2000
    });
  </script>
<?php endif; ?>

<!-- SweetAlert2 CDN (jika belum ada) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).on('click', '.delete-slot', function () {
    const slotId = $(this).data('id');

    Swal.fire({
      title: 'Yakin ingin menghapus slot ini?',
      text: "Data yang dihapus tidak bisa dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Kirim ke backend
        $.ajax({
          url: '<?= base_url("index.php/penomoran/Penomoran/delete_slot") ?>',
          method: 'POST',
          data: { id_slot: slotId },
          success: function (response) {
            // Tampilkan notifikasi sukses
            Swal.fire({
              title: 'Berhasil!',
              text: 'Slot berhasil dihapus.',
              icon: 'success',
              timer: 2000,
              showConfirmButton: false
            }).then(() => {
              location.reload(); // refresh halaman
            });
          },
          error: function () {
            Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus slot.', 'error');
          }
        });
      }
    });
  });
</script>




  <script>
let jenisSuratLoaded = false;

$(document).ready(function () {
  const $modal = $('#addSlotModal');

  $modal.on('show.bs.modal', function () {
    console.trace("🔥 Modal show triggered");

    const jenisSuratContainer = document.getElementById('jenisSuratContainer');
    const slotInputsContainer = document.getElementById('slotInputsContainer');

    // Kosongkan container
    jenisSuratContainer.innerHTML = '';
    slotInputsContainer.innerHTML = '';

    if (jenisSuratLoaded) {
      console.log("⏩ Jenis surat sudah diload, skip fetch");
      return;
    }

    // Langsung set flag agar fetch tidak dobel jika event show dipicu 2x
    jenisSuratLoaded = true;

    console.trace("📡 Fetching jenis_surat...");

    fetch('<?= base_url("index.php/penomoran/Penomoran/get_jenis_surat") ?>')
      .then(response => response.json())
      .then(data => {
        console.log("✅ Data jenis_surat loaded:", data);

        data.forEach(jenis => {
          const { id, nama_jenis: nama } = jenis;

          const checkboxWrapper = document.createElement('div');
          checkboxWrapper.className = 'form-check';

          const input = document.createElement('input');
          input.className = 'form-check-input jenis-checkbox';
          input.type = 'checkbox';
          input.value = id;
          input.dataset.nama = nama;
          input.id = `jenisSurat${id}`;

          const label = document.createElement('label');
          label.className = 'form-check-label';
          label.htmlFor = `jenisSurat${id}`;
          label.innerText = nama;

          checkboxWrapper.appendChild(input);
          checkboxWrapper.appendChild(label);
          jenisSuratContainer.appendChild(checkboxWrapper);

          input.addEventListener('change', function () {
            const inputId = 'slotInput' + id;
            if (this.checked) {
              const div = document.createElement('div');
              div.className = 'mb-3';
              div.id = inputId;
              div.innerHTML = `
                <label class="form-label">Jumlah Slot untuk <strong>${nama}</strong></label>
                <input type="number" name="slot[${id}]" class="form-control" min="1" required>
                <input type="hidden" name="jenis_surat_id[]" value="${id}">
              `;
              slotInputsContainer.appendChild(div);
            } else {
              const inputDiv = document.getElementById(inputId);
              if (inputDiv) inputDiv.remove();
            }
          });
        });
      })
      .catch(error => {
        console.error("❌ AJAX Error:", error);
        jenisSuratContainer.innerHTML = "<div class='text-danger'>Gagal memuat data jenis surat</div>";
        jenisSuratLoaded = false; // reset flag supaya bisa coba lagi
      });
  });

  // Reset saat modal ditutup
  $modal.on('hidden.bs.modal', function () {
    console.log("🔁 Reset state modal");
    jenisSuratLoaded = false;
    document.getElementById('jenisSuratContainer').innerHTML = '';
    document.getElementById('slotInputsContainer').innerHTML = '';
  });
});
</script>

<script>
  $('#editSlotModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    // Ambil data dari button
    var id = button.data('id');
    var jenis = button.data('jenis'); // contoh: 2
    var slot = button.data('slot');
    var tanggal = button.data('tanggal'); // format: yyyy-mm-dd

    // Referensi ke modal
    var modal = $(this);
    modal.find('#editIdSlot').val(id);

    // Atur value select (pastikan valuenya sesuai dengan <option>)
    modal.find('#editJenisSurat').val(jenis).trigger('change');

    // Isi input slot & tanggal
    modal.find('#editSlotJumlah').val(slot);
    modal.find('#editTanggalSlot').val(tanggal);
  });
</script>






  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.1.0') ?>"></script>



<!-- Script Modal (jQuery) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const editModal = document.getElementById('editSlotModal');
  editModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const slot = button.getAttribute('data-slot');
    const tanggal = button.getAttribute('data-tanggal');
    const jenisId = button.getAttribute('data-jenis');

    document.getElementById('editId').value = id;
    document.getElementById('prevJumlahSlot').value = slot;
    document.getElementById('editJumlahSlot').value = slot;
    document.getElementById('editTanggalSlot').value = tanggal;
    document.getElementById('editJenisSurat').value = jenisId;
    
  });
});

</script>


</body>

</html>