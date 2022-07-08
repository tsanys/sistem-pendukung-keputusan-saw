<footer class="bg-white rounded shadow p-5 mb-4 mt-4">
    <div class="row">
        <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
            <p class="mb-0 text-center text-lg-start" id="year">© 2019-<span class="current-year"></span> <a class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a></p>
        </div>
    </div>
</footer>

<script>
    const date = new Date();
    let year = date.getFullYear();
    document.getElementById("year").innerHTML = '© ' + year + ' Sistem Pendukung Keputusan';
</script>
