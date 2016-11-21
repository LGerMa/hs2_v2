        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Sistema de Gesti&oacute;n de Calidad - Insafocoop</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php 
                            echo "<li>
                                <a href='perfil_usuario.php?email=".$_SESSION['usuario_sesion']->getCorreoUsuario()."'><i class='fa fa-user fa-fw'></i>".$_SESSION['usuario_sesion']->getNombreUsuario()."</a>
                            </li>";
                        ?>
                        <li class="divider"></li>
                        <li><a href="../php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        <?php if($_SESSION['usuario_sesion']->getIdTipoUsuario()=="1"){ ?>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./agregar_usuarios.php">Agregar</a>
                                </li>
                                <li>
                                    <a href="./usuarios.php">Ver</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php 
                            }
                            if($_SESSION['usuario_sesion']->getIdTipoUsuario()=="1" || $_SESSION['usuario_sesion']->getIdTipoUsuario()=="3"){
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Cooperativas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./agregar_cooperativa.php">Agregar</a>
                                </li>
                                <li>
                                    <a href="./cooperativas.php">Ver</a>
                                </li>
                            </ul>
                        </li> 
                        <?php 
                            }
                            if($_SESSION['usuario_sesion']->getIdTipoUsuario()=="2"){
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Proyectado <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <?php 
                               // if($_SESSION['usuario_sesion']->getIdTipoUsuario()=="2" && $_SESSION['usuario_sesion']->getIdPuesto() != "1"){
                                if($_SESSION['usuario_sesion']->getIdPuesto() != "1"){
                                    echo "
                                       <li>
                                            <a href='./proyectado.php'>Ver</a>
                                        </li>
                                        <li>
                                            <a href='./proyectado_historial.php'>Historial</a>
                                        </li> 
                                    "   ;
                                }
                            ?>
                            <?php 
                                //if($_SESSION['usuario_sesion']->getIdTipoUsuario()=="1" || $_SESSION['usuario_sesion']->getIdPuesto()=="1"){
                                if($_SESSION['usuario_sesion']->getIdPuesto()=="1"){
                                    echo "<li>
                                        <a href='./seguimientos.php'>Seguimiento</a>
                                    </li>";
                                }
                            }
                            ?>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>