<!--
    Este é um arquivo responsável por armazenar itens relacionados ao js da
    sua aplicação, seja ele links de frameworks e muito mais.
-->
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="./../../View/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="View/js/DataTables/datatables.min.js"></script>
<script src="View/js/jquery.global.js"></script>
<script src="View/js/plugin/jquery.maskedinput.js"></script>
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