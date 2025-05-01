@extends('layouts.sidebar')

@include('layouts.be-navbar')


        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="dashboard" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>
                
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="ticket-list.html" aria-expanded="false">
                                <i data-feather="bar-chart" class="feather-icon"></i>
                                <span class="hide-menu">Reservasi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="paket_wisata" aria-expanded="false">
                                <i data-feather="box" class="feather-icon"></i>
                                <span class="hide-menu">Paket Wisata</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="obyek_wisata" aria-expanded="false">
                                <i data-feather="map-pin" class="feather-icon"></i> <!-- Ganti icon Obyek Wisata -->
                                <span class="hide-menu">Obyek Wisata</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="backendrita" aria-expanded="false">
                                <i data-feather="book-open" class="feather-icon"></i> <!-- Ganti icon backendrita -->
                                <span class="hide-menu">backendrita</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="user" aria-expanded="false">
                                <i data-feather="grid" class="feather-icon"></i> <!-- Ganti icon Obyek Wisata -->
                                <span class="hide-menu">User</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="container-fluid mt-5 pt-5" style="padding-left: 250px; padding-right: 20px;"> 
            <h2 class="text-center mb-4">Paket Wisata Staydesa</h2>
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Wisata</button>
            </div>
        
            <table class="table table-bordered" id="wisataTable">
                <!-- Pastikan sudah ada Bootstrap untuk dropdown ya -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Deskripsi</th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                        <th>Foto 1</th>
                        <th>Foto 2</th>
                        <th>Foto 3</th>
                        <th>Foto 4</th>
                        <th>Foto 5</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Paket A</td>
                        <td>Deskripsi Paket A</td>
                        <td>Fasilitas A</td>
                        <td>Rp 500.000</td>
                        <td><img src="foto1.jpg" width="50"></td>
                        <td><img src="foto2.jpg" width="50"></td>
                        <td><img src="foto3.jpg" width="50"></td>
                        <td><img src="foto4.jpg" width="50"></td>
                        <td><img src="foto5.jpg" width="50"></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="aksiDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu" aria-labackendlledby="aksiDropdown">
                                    <li><a class="dropdown-item" href="#" onclick="editPaket(1)">Edit</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="hapusPaket(1)">Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="modal fade" id="addModal" tabindex="-1" aria-labackendlledby="addModalLabackendl" aria-hidden="true">
            <div class="modal-dialog">
                <form id="wisataForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Paket</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labackendl="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="editIndex">
                            <div class="mb-3">
                                <labackendl>Nama Paket</labackendl>
                                <input type="text" class="form-control" id="nama" required>
                            </div>
                            <div class="mb-3">
                                <labackendl>Deskripsi</labackendl>
                                <input type="text" class="form-control" id="deskripsi" required>
                            </div>
                            <div class="mb-3">
                                <labackendl>Fasilitas</labackendl>
                                <input type="text" class="form-control" id="harga" required>
                            </div>
                            <div class="mb-3">
                                <labackendl>Harga</labackendl>
                                <input type="numbackendr" class="form-control" id="harga" required>
                            </div><div class="mb-3">
                                <labackendl>Foto 1</labackendl>
                                <input type="image" class="form-control" id="harga" required>
                            </div><div class="mb-3">
                                <labackendl>Foto 2</labackendl>
                                <input type="image" class="form-control" id="harga" required>
                            </div><div class="mb-3">
                                <labackendl>Foto 3</labackendl>
                                <input type="image" class="form-control" id="harga" required>
                            </div>
                            <div class="mb-3">
                                <labackendl>Foto 4</labackendl>
                                <input type="image" class="form-control" id="harga" required>
                            </div><div class="mb-3">
                                <labackendl>Foto 5</labackendl>
                                <input type="image" class="form-control" id="harga" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>




        {{-- <div class="container-fluid mt-5 pt-5" style="padding-left: 250px; padding-right: 20px;"> 
            <h2 class="text-center mb-4">Paket Wisata Staydesa</h2>
        
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Wisata</button>
            </div>
        
            <div style="overflow-x: auto;">
                <table class="table table-bordered align-middle text-center" id="wisataTable" style="min-width: 1000px;">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th style="min-width: 200px;">Nama Paket</th> 
                            <th style="min-width: 150px;">Deskripsi</th>
                            <th style="min-width: 100px;">Fasilitas</th>
                            <th style="min-width: 250px;">Harga Per Pack</th>
                            <th style="min-width: 100px;">Foto 1</th>
                            <th style="min-width: 100px;">Foto 2</th>
                            <th style="min-width: 100px;">Foto 3</th>
                            <th style="min-width: 100px;">Foto 4</th>
                            <th style="min-width: 100px;">Foto 5</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data diisi Javascript -->
                    </tbody>
                </table>
            </div>
        </div>

                <!-- Tombol Tambah Wisata -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" style="margin-bottom: 20px;">
            Tambah Wisata
        </button>

        <!-- Modal Tambah Wisata -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labackendlledby="addModalLabackendl" aria-hidden="true">
            <div class="modal-dialog">
                <form id="wisataForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabackendl">Tambah Wisata</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labackendl="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="editIndex">
                            <div class="mb-3">
                                <labackendl class="form-labackendl">Nama Wisata</labackendl>
                                <input type="text" class="form-control" id="nama" required>
                            </div>
                            <div class="mb-3">
                                <labackendl class="form-labackendl">Lokasi</labackendl>
                                <input type="text" class="form-control" id="lokasi" required>
                            </div>
                            <div class="mb-3">
                                <labackendl class="form-labackendl">Harga Tiket</labackendl>
                                <input type="numbackendr" class="form-control" id="harga" required>
                            </div>
                            <div class="mb-3">
                                <labackendl class="form-labackendl">Deskripsi</labackendl>
                                <textarea class="form-control" id="deskripsi" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
        
                {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            let wisataList = [];

            function renderTable() {
                const tableBody = document.querySelector("#wisataTable tbody");
                tableBody.innerHTML = "";
                wisataList.forEach((item, index) => {
                    tableBody.innerHTML += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.nama}</td>
                            <td>${item.lokasi}</td>
                            <td>${item.harga}</td>
                            <td>${item.deskripsi}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editWisata(${index})">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteWisata(${index})">Hapus</button>
                            </td>
                        </tr>
                    `;
                });
            }

            document.getElementById("wisataForm").addEventListener("submit", function(e) {
                e.preventDefault();
                const nama = document.getElementById("nama").value;
                const lokasi = document.getElementById("lokasi").value;
                const harga = document.getElementById("harga").value;
                const deskripsi = document.getElementById("deskripsi").value;
                const editIndex = document.getElementById("editIndex").value;

                if (editIndex === "") {
                    wisataList.push({ nama, lokasi, harga, deskripsi });
                } else {
                    wisataList[editIndex] = { nama, lokasi, harga, deskripsi };
                }

                this.reset();
                document.getElementById("editIndex").value = "";
                var addModal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
                addModal.hide();
                renderTable();
            });

            function editWisata(index) {
                const wisata = wisataList[index];
                document.getElementById("nama").value = wisata.nama;
                document.getElementById("lokasi").value = wisata.lokasi;
                document.getElementById("harga").value = wisata.harga;
                document.getElementById("deskripsi").value = wisata.deskripsi;
                document.getElementById("editIndex").value = index;
                var addModal = new bootstrap.Modal(document.getElementById('addModal'));
                addModal.show();
            }

            function deleteWisata(index) {
                if (confirm("Yakin ingin menghapus wisata ini?")) {
                    wisataList.splice(index, 1);
                    renderTable();
                }
            }

            renderTable();
        </script> --}}

        </body>
        </html>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="backend/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="backend/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="backend/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="backend/dist/js/app-style-switcher.js"></script>
    <script src="backend/dist/js/feather.min.js"></script>
    <script src="backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="backend/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="backend/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="backend/assets/extra-libs/c3/d3.min.js"></script>
    <script src="backend/assets/extra-libs/c3/c3.min.js"></script>
    <script src="backend/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="backend/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="backend/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="backend/dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>

</html>

