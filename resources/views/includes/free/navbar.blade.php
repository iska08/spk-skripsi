<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <div>
        <a class="navbar-brand ps-3" href="/spk" style="padding: 0px 0px 0px">
            SPK WISATA
        </a>
        <div class="text-white ps-3" style="font-family: 'Times New Roman', Times, serif; font-size:14px; width:max-content">
            <?php
                date_default_timezone_set("Asia/Jakarta");
                $namaHari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
                $indeksHari = date('w');
                $tanggal = date('d/m/y');
                $jam = date('H:i:s');
            ?>
            {{ $tanggal }} &bull; <span id="jam"></span>
            <script type="text/javascript">
                window.onload = function () {
                    jam();
                }
                function jam() {
                    var e = document.getElementById('jam'),
                        d = new Date(),
                        h, m, s;
                    h = d.getHours();
                    m = set(d.getMinutes());
                    s = set(d.getSeconds());
                    e.innerHTML = h + ':' + m + ':' + s;
                    setTimeout('jam()', 1000);
                }
                function set(e) {
                    e = e < 10 ? '0' + e : e;
                    return e;
                }
            </script>
        </div>
    </div>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>
    <div style="width: 23%"></div>
</nav>