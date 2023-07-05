<body>
    <div class="topnav">
        <div class="logo">
            <img src="http://localhost/taher/assets/imgs/logo.png">
        </div>
        <div class="menu">
            <a href="http://localhost/taher/app/Profile/info.php" class="icon-link">
                <i class="fas fa-user-circle icon"></i>
                <span class="link-text">Profile</span>
            </a>

            <a href="http://localhost/taher/app/Modules/listeM.php" class="icon-link">
                <i class="fas fa-book icon"></i>
                <span class="link-text">Modules</span>
            </a>

            <a href="http://localhost/taher/app/Seances/liste.php" class="icon-link">
                <i class="fas fa-chalkboard-teacher icon"></i>
                <span class="link-text">Séances</span>
            </a>

            <a onclick="return confirm('Vous-voulez déconnecter')" href="http://localhost/taher/configDB/deconexion.php" class="icon-link">
                <i class="fas fa-power-off"></i>
                <span class="link-text">Déconnexion</span>
            </a>
        </div>

    </div>
    <script>
        var currentUrl = window.location.href;
        var menuLinks = document.querySelectorAll(".menu a");
        for (var i = 0; i < menuLinks.length; i++) {
            var link = menuLinks[i];
            if (link.href === currentUrl) {
                link.classList.remove("active");
                link.classList.add("active");
            }
        }
    </script>