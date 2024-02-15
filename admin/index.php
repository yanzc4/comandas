<?php
$nombreCliente = "Administrador";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
            <img src="../assets/img/comanda.png" alt="logo">
            </span>

            <div class="text logo-text">
                <span class="name">Comandas</span>
                <span class="profession"><?php echo $nombreCliente ?></span>
            </div>
        </div>

        <!-- cambia el icono segun el dispositivo -->
        <?php
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
            echo "<i class='bi bi-list toggle'></i>";
        } else {
            echo "<i class='bi bi-chevron-right toggle'></i>";
        }
        ?>


    </header>

    <div class="menu-bar">
        <div class="menu">

            <li class="search-box">
                <i class='bi bi-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="home" class="seleccionado" target="myFrame">
                        <i class='bi bi-house-fill icon'></i>
                        <span class="text nav-text">Inicio</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="comandas.php" target="myFrame">
                        <i class='bi bi-clipboard-minus-fill icon'></i>
                        <span class="text nav-text">Comandas</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="platos.php" target="myFrame">
                    <i class='bi bi-boxes icon'></i>
                        <span class="text nav-text">Platos</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="reportes.php" target="myFrame">
                        <i class='bi bi-pie-chart-fill icon'></i>
                        <span class="text nav-text">Reportes</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="#">
                    <i class='bi bi-box-arrow-right icon'></i>
                    <span class="text nav-text">Salir</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='bi bi-moon-stars-fill icon moon'></i>
                    <i class='bi bi-brightness-high-fill icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>

</nav>

<section class="home">
        <iframe src="home" name='myFrame' style="height: 100%; width: 100%; border: none;"></iframe>

        <!--<div class="text">Dashboard Sidebar</div>-->
    </section>

<script>
    const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

//funcion para cambiar el color a cada a 
const links = document.querySelectorAll("a");

links.forEach(link => {
    link.addEventListener("click" , () =>{
        //manter el hover en el link seleccionado
        links.forEach(link => link.classList.remove("seleccionado"));
        link.classList.add("seleccionado");


        
        //cerrar el sidebar solo en dispositivos pequeños con un delay
        if(window.innerWidth <= 720){
            setTimeout(() =>{
                sidebar.classList.add("close");
            },300)
        }
    })
});

/*
modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }

    window.frames['myFrame'].document.querySelector('body').classList.toggle('dark');
    
    //creamos una variable para guardar el modo actual
    if (document.body.classList.contains('dark')) {
        localStorage.setItem('dark-mode', 'true');
    }else{
        localStorage.setItem('dark-mode', 'false');
    }
        
});

//obtenemos el modo actual
if (localStorage.getItem('dark-mode') === 'true') {
    body.classList.add('dark');
    modeText.innerText = "Light mode";
}else{
    body.classList.remove('dark');
    modeText.innerText = "Dark mode";
}
*/
</script>
</body>
</html>