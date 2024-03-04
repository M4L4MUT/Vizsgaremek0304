<nav>

    <img src="./images/red.png" style="height: auto; width: 10vw;">

    </div>
    <ul>
        <li>
            <a class="nav-link" href="index.php?menu=fooldal">Kezdőlap</a>
        </li>
        <li>
            <a class="nav-link" href="index.php?menu=bejelentkezes">Belépés</a>
        </li>
        <li>
            <a class="nav-link" href="index.php?menu=szerzodes">Bérlés menete</a>
        </li>
        <li>
            <a class="nav-link" href="index.php?menu=kapcsolat">Kapcsolat</a>
        </li>
        <li>
            <a class="nav-link" href="index.php?menu=rolunk">Rólunk</a>
        </li>
    </ul>
    <div class="hamburger">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </div>
</nav>
<div class="menubar">
    <ul>
        <li>
            <a class="nav-link" href="index.php?menu=fooldal">Kezdőlap</a>
        </li>
        <li>
            <a class="nav-link" href="index.php?menu=bejelentkezes">Belépés</a>
        </li>
        <li>
            <a class="nav-link" href="index.php?menu=szerzodes">Bérlés menete</a>
        </li>
        <li>
            <a class="nav-link" href="index.php?menu=kapcsolat">Kapcsolat</a>
        </li>
        <li>
            <a class="nav-link" href="index.php?menu=rolunk">Rólunk</a>
        </li>
    </ul>
</div>

<script>
    const mobileNav = document.querySelector(".hamburger");
    const navbar = document.querySelector(".menubar");

    const toggleNav = () => {
        navbar.classList.toggle("active");
        mobileNav.classList.toggle("hamburger-active");
    };
    mobileNav.addEventListener("click", () => toggleNav());

</script>

<?= $auto = filter_input(INPUT_GET, "auto"); ?>