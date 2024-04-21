<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo" style="display: flex; align-items: center;">
                    <img src=<?php echo e(asset("assets/image/logosma.png")); ?> style="width: 40px; height: 40px">
                    <a href="#" style="margin-left: 10px"><p style="font-size: 21px;margin-top: 25px">Admin</p></a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                         role="img" class="iconify iconify--system-uicons" width="20" height="20"
                         preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                           stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                         role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                         viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu" style="margin-top: -10px">
            <ul class="menu">
                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/admin') ? 'active' : ''); ?>">
                    <a href="/dashboard/admin" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Konten</li>

                <li
                    class="sidebar-item  has-sub <?php echo e(request()->is('dashboard/beranda*') ? 'active' : ''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Beranda</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item  <?php echo e(request()->is('dashboard/beranda/welcome*') ? 'active' : ''); ?>">
                            <a href="/dashboard/beranda/welcome" class="submenu-link">Welcome Popup</a>

                        </li>

                        <li class="submenu-item  <?php echo e(request()->is('dashboard/beranda/ekstrakurikuler*') ? 'active' : ''); ?>">
                            <a href="/dashboard/beranda/ekstrakurikuler" class="submenu-link">Ekstrakurikuler</a>

                        </li>

                        <li class="submenu-item  <?php echo e(request()->is('dashboard/beranda/prestasi*') ? 'active' : ''); ?>">
                            <a href="/dashboard/beranda/prestasi" class="submenu-link">Prestasi</a>

                        </li>

                        <li class="submenu-item  <?php echo e(request()->is('dashboard/beranda/pengumuman*') ? 'active' : ''); ?>">
                            <a href="/dashboard/beranda/pengumuman" class="submenu-link">Pengumuman</a>

                        </li>

                        <li class="submenu-item  <?php echo e(request()->is('dashboard/beranda/berita*') ? 'active' : ''); ?>">
                            <a href="/dashboard/beranda/berita" class="submenu-link">Berita</a>

                        </li>

                        <li class="submenu-item <?php echo e(request()->is('dashboard/beranda/blog*') ? 'active' : ''); ?> ">
                            <a href="/dashboard/beranda/blog" class="submenu-link">Blog</a>

                        </li>

                        <li class="submenu-item <?php echo e(request()->is('dashboard/beranda/kritik-saran*') ? 'active' : ''); ?> ">
                            <a href="/dashboard/beranda/kritik-saran" class="submenu-link">Kritik & Saran</a>

                        </li>

                    </ul>
                </li>

                <li
                    class="sidebar-item  has-sub <?php echo e(request()->is('dashboard/profil*') ? 'active' : ''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Profil</span>
                    </a>

                    <ul class="submenu ">

                        <li class="submenu-item <?php echo e(request()->is('dashboard/profil/fasilitas*') ? 'active' : ''); ?>">
                            <a href="/dashboard/profil/fasilitas" class="submenu-link">Fasilitas</a>

                        </li>

                        <li class="submenu-item  <?php echo e(request()->is('dashboard/profil/struktur-organisasi*') ? 'active' : ''); ?>">
                            <a href="/dashboard/profil/struktur-organisasi" class="submenu-link">Struktur Organisasi</a>

                        </li>

                    </ul>


                </li>

                <li
                    class="sidebar-item  has-sub <?php echo e(request()->is('dashboard/kategori*') ? 'active' : ''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-layers-half"></i>
                        <span>Kategori</span>
                    </a>

                    <ul class="submenu ">

                        <li class="submenu-item  <?php echo e(request()->is('dashboard/kategori/kategori-berita*') ? 'active' : ''); ?>">
                            <a href="/dashboard/kategori/kategori-berita" class="submenu-link">Kategori Berita</a>
                        </li>

                        <li class="submenu-item  <?php echo e(request()->is('dashboard/kategori/kategori-pengumuman*') ? 'active' : ''); ?>">
                            <a href="/dashboard/kategori/kategori-pengumuman" class="submenu-link">Kategori Pengumuman</a>

                        </li>

                    </ul>


                </li>

                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/galeri*') ? 'active' : ''); ?>">
                    <a href="/dashboard/galeri" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Galeri</span>
                    </a>
                </li>

                <li
                    class="sidebar-item  has-sub <?php echo e(request()->is('dashboard/riwayat*') ? 'active' : ''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hourglass-split"></i>
                        <span>Riwayat Konten</span>
                    </a>

                    <ul class="submenu ">

                        <li class="submenu-item <?php echo e(request()->is('dashboard/riwayat/berita*') ? 'active' : ''); ?> ">
                            <a href="/dashboard/riwayat/berita" class="submenu-link">Riwayat Berita</a>
                        </li>

                        <li class="submenu-item <?php echo e(request()->is('dashboard/riwayat/pengumuman*') ? 'active' : ''); ?> ">
                            <a href="/dashboard/riwayat/pengumuman" class="submenu-link">Riwayat Pengumuman</a>

                        </li>

                        <li class="submenu-item <?php echo e(request()->is('dashboard/riwayat/blog*') ? 'active' : ''); ?>">
                            <a href="/dashboard/riwayat/blog" class="submenu-link">Riwayat Blog</a>

                        </li>

                    </ul>


                </li>

                <li class="sidebar-title">Data Sekolah</li>

                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/siswa*') ? 'active' : ''); ?>">
                    <a href="/dashboard/siswa/kelas" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>

                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/guru*') ? 'active' : ''); ?>">
                    <a href="/dashboard/guru" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Data Guru</span>
                    </a>
                </li>

                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/staf*') ? 'active' : ''); ?>">
                    <a href="/dashboard/staf" class='sidebar-link'>
                        <i class="bi bi-journal-check"></i>
                        <span>Data Staf</span>
                    </a>
                </li>

                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/kelas*') ? 'active' : ''); ?>">
                    <a href="/dashboard/kelas" class='sidebar-link'>
                        <i class="bi bi-file-spreadsheet-fill"></i>
                        <span>Data Kelas</span>
                    </a>
                </li>

                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/mapel*') ? 'active' : ''); ?>">
                    <a href="/dashboard/mapel/kelas" class='sidebar-link'>
                        <i class="bi bi-book-half"></i>
                        <span>Data Mata Pelajaran</span>
                    </a>
                </li>

                <li class="sidebar-title">Perpustakaan</li>

                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/kunjungan*') ? 'active' : ''); ?>">
                    <a href="/dashboard/kunjungan" class='sidebar-link'>
                        <i class="bi bi-file-earmark-person-fill"></i>
                        <span>Data Kunjungan</span>
                    </a>
                </li>

                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/peminjaman*') ? 'active' : ''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-clipboard-fill"></i>
                        <span>Data Peminjaman</span>
                    </a>
                </li>

                <li class="sidebar-title">Penjadwalan</li>

                <li
                    class="sidebar-item <?php echo e(request()->is('dashboard/jadwal*') ? 'active' : ''); ?>">
                    <a href="/dashboard/jadwal" class='sidebar-link'>
                        <i class="bi bi-calendar2-week-fill"></i>
                        <span>Jadwal Pelajaran</span>
                    </a>
                </li>

                <li
                    class="sidebar-item">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-calendar-range-fill"></i>
                        <span>Jadwal Siswa</span>
                    </a>
                </li>

                <li
                    class="sidebar-item">

                </li>

                <li class="sidebar-title">
                    <form action="<?php echo e(route('logout-admin')); ?>" method="post" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                            <i class="bi bi-arrow-left-circle-fill"></i>
                            <span style="margin-left: 10px;">Logout</span>
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\cms-administration-smatjpriok-2\resources\views/back/admin/sidebar.blade.php ENDPATH**/ ?>