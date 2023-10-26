<!--
    Este é um arquivo responsável por armazenar itens relacionados ao js da
    sua aplicação, seja ele links de frameworks e muito mais.
-->

<script src="View/js/jquery.config.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="./../../View/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="View/js/DataTables/datatables.min.js"></script>
<script src="View/js/jquery.global.js"></script>
<script src="View/js/plugin/jquery.maskedinput.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Bootstrap Select -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>


<!--  JS da Navbar -->
<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");
    mainContainer = body.querySelector(".main-container");
    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
       
    })
    searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
    })
    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Light mode";
        } else {
            modeText.innerText = "Dark mode";

        }
    });
</script>