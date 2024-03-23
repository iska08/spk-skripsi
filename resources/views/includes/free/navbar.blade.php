<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/spk">
        SPK WISATA
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>
    {{-- Jam --}}
    <div class="text-white" style="font-family:'Courier New', Courier, monospace">
        <?php
            date_default_timezone_set("Asia/Jakarta");
            $namaHari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
            $indeksHari = date('w'); // Mendapatkan indeks hari dalam seminggu
            $tanggal = date('d-m-Y');
            $jam = date('H:i:s');
        ?>
        {{ $namaHari[$indeksHari] }}, {{ $tanggal }} | <span id="jam" style="font-size:24"></span>
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
</nav>