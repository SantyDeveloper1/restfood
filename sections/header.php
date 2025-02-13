
	<!-- Header -->
	<header class="header full-box" style="background-color: #6281F7;">
	    <div class="header-brand text-center full-box">
	        <a href="index.php">
	            <img src="assets/img/logo.png" alt="logo" class="img-fluid">
	        </a>
	    </div>
	    <div class="header-options full-box">
	        <nav class="header-navbar full-box poppins-regular font-weight-bold" >
	            <ul class="list-unstyled full-box">
	                <li>
	                    <a href="index.php" >Inicio<span class="full-box" ></span></a>
	                </li>
	                <li>
	                    <a href="menu.php" >Menú<span class="full-box" ></span></a>
	                </li>
	            </ul>
	        </nav>
	        <div class="header-button full-box text-center btn-login-menu" >
	            <i class="fas fa-user-alt" onclick="show_popup_login()" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="Login" ></i>
	            <div class="div-bordered popup-login" style="background-color: #77E377;">
	                <!-- Inicio de sesion -->
	                <span class="text-center poppins-regular font-weight-bold">Inicio de sesión</span>
	                <form class="full-box" action="" >
	                    <p class="text-center">
						<style>
                        .btn a {
                        font-size: 18px; /* Ajusta el tamaño de la fuente según tus preferencias */
                        font-weight: bold;
                        }
                        </style>
                        <button class="btn btn-info btn-sm w-100">
                            <a href="login.php">Iniciar sesión</a>
                        </button>
	                    </p>
	                </form>
	                <hr>
	                <p class="text-center full-box">¿No tienes cuenta? <a href="registrar.php">Regístrate aquí</a></p>      
	            </div>
	        </div>
	        <a href="bag.php" class="header-button full-box text-center" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="Carrito" >
	            <i class="fas fa-shopping-bag"></i>
	            <span class="badge bg-warning rounded-pill bag-count" >0</span>
	        </a>
	    </div>
	</header>