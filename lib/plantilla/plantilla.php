<?php


    class Plantilla
    {


        static function header($titulo,$opciones = array())
        {

            $menu = '';
            if (!$opciones['ocultar_menu'])
            {
                $menu = self::menu();
            }

            return "
                    <!DOCTYPE html>
                    <html lang=\"es-ES\" dir=\"ltr\">

                    <head>
                        <meta charset=\"utf-8\">
                        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">


                        <!-- ===============================================-->
                        <!--    Document Title-->
                        <!-- ===============================================-->
                        <title>{$titulo}</title>


                        <!-- ===============================================-->
                        <!--    Favicons-->
                        <!-- ===============================================-->
                        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/assets/img/favicons/apple-touch-icon.png\">
                        <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/assets/img/favicons/favicon-32x32.png\">
                        <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"/assets/img/favicons/favicon-16x16.png\">
                        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"/assets/img/favicons/favicon.ico\">
                        <link rel=\"manifest\" href=\"/assets/img/favicons/manifest.json\">
                        <meta name=\"msapplication-TileImage\" content=\"/assets/img/favicons/mstile-150x150.png\">
                        <meta name=\"theme-color\" content=\"#ffffff\">


                        <!-- ===============================================-->
                        <!--    Stylesheets-->
                        <!-- ===============================================-->
                        <link href=\"/assets/css/theme.css\" rel=\"stylesheet\" />
                        <link href=\"/css/styles.css\" rel=\"stylesheet\" />

                    </head>


                    <body>

                        <!-- ===============================================-->
                        <!--    Main Content-->
                        <!-- ===============================================-->
                        <main class=\"main\" id=\"top\">
                                
            
            " . $menu;

        }


        static function menu()
        {

            return "
                <!-- ============================================-->
                <!-- <section> begin ============================-->
                <section class=\"bg-primary py-2 d-none d-sm-block\">

                    <div class=\"container\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-auto d-none d-lg-block\">
                        <p class=\"my-2 fs--1\"><i class=\"fas fa-map-marker-alt me-3\"></i><span>Calle Dr. Barraquer, 6, 35500 Arrecife, Las Palmas </span></p>
                        </div>
                        <div class=\"col-auto ms-md-auto order-md-2 d-none d-sm-block\">
                        <ul class=\"list-unstyled list-inline my-2\">
                            <li class=\"list-inline-item\"><a class=\"text-decoration-none\" href=\"https://www.facebook.com/cifp.zonzamas.3/?locale=es_ES\"><i class=\"fab fa-facebook-f text-900\"></i></a></li>
                            <!--<li class=\"list-inline-item\"><a class=\"text-decoration-none\" href=\"#!\"><i class=\"fab fa-pinterest text-900\"></i></a></li>-->
                            <!--<li class=\"list-inline-item\"><a class=\"text-decoration-none\" href=\"#!\"><i class=\"fab fa-twitter text-900\"></i></a></li>-->
                            <li class=\"list-inline-item\"><a class=\"text-decoration-none\" href=\"https://www.instagram.com/cifp_zonzamas/?hl=es\"><i class=\"fab fa-instagram text-900\"> </i></a></li>
                        </ul>
                        </div>
                        <div class=\"col-auto\">
                        <p class=\"my-2 fs--1\"><i class=\"fas fa-envelope me-3\"></i><a class=\"text-900\" href=\"mailto:35015531@gobiernodecanarias.org\">35015531@gobiernodecanarias.org </a></p>
                        </div>
                    </div>
                    </div>
                    <!-- end of .container-->

                </section>
                <!-- <section> close ============================-->
                <!-- ============================================-->


                <nav class=\"navbar navbar-expand-lg navbar-light sticky-top py-3 d-block\" data-navbar-on-scroll=\"data-navbar-on-scroll\">
                    <div class=\"container\">
                    <h1><span>CIFP Zonzamas</span></h1>  
                    <!--<a class=\"navbar-brand\" href=\"/\"><img src=\"/img/logo.png\" height=\"45\" alt=\"logo\" /></a>-->
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"> </span></button>
                    <div class=\"collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0\" id=\"navbarSupportedContent\">
                        <ul class=\"navbar-nav ms-auto pt-2 pt-lg-0 font-base\">
                        <li class=\"nav-item px-2\"><a class=\"nav-link active\" aria-current=\"page\" href=\"/\">Home</a></li>
                        <li class=\"nav-item px-2\"><a class=\"nav-link\" aria-current=\"page\" href=\"/biblioteca/\">Biblioteca</a></li>
                        </ul><a class=\"btn btn-primary order-1 order-lg-0\" href=\"#!\">Login</a>
                        <form class=\"d-flex my-3 d-block d-lg-none\">
                        <input class=\"form-control me-2\" type=\"search\" placeholder=\"Buscar\" aria-label=\"Buscar\" />
                        <button class=\"btn btn-outline-primary\" type=\"submit\">Buscar</button>
                        </form>
                        <div class=\"dropdown d-none d-lg-block\">
                        <button class=\"btn btn-outline-light ms-2\" id=\"dropdownMenuButton1\" type=\"submit\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fas fa-search text-800\"></i></button>
                        <ul class=\"dropdown-menu dropdown-menu-lg-end\" aria-labelledby=\"dropdownMenuButton1\" style=\"top:55px\">
                            <form>
                            <input class=\"form-control\" type=\"search\" placeholder=\"Buscar\" aria-label=\"Buscar\" />
                            </form>
                        </ul>
                        </div>
                    </div>
                    </div>
                </nav>
            ";


        }


        static function footer()
        {
            return "
                <!-- ============================================-->
                <!-- <section> begin ============================-->
                <section class=\"bg-secondary\">

                    <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-12 col-sm-12 col-lg-6 mb-4 order-0 order-sm-0\"><a class=\"text-decoration-none\" href=\"#\"><img src=\"/img/footer-logo.png\"  alt=\"\" /></a>
                        <p class=\"text-light my-4\"> <i class=\"fas fa-map-marker-alt me-3\"></i><span class=\"text-light\">Calle Dr. Barraquer, 6</span><a class=\"text-light\" href=\"tel:+928-81-31-14\">+928-81-31-14</a><br />35500 Arrecife, Las Palmas</p>
                        <p class=\"text-light\"> <i class=\"fas fa-envelope me-3\"> </i><a class=\"text-light\" href=\"mailto:35015531@gobiernodecanarias.org\">35015531@gobiernodecanarias.org</a></p>
                        </div>
                        <div class=\"col-6 col-sm-4 col-lg-2 mb-3 order-2 order-sm-1\">
                        <h5 class=\"lh-lg fw-bold mb-4 text-light font-sans-serif\">Community </h5>
                        <ul class=\"list-unstyled mb-md-4 mb-lg-0\">
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Learners</a></li>

                        </ul>
                        </div>
                        <div class=\"col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2\">
                        <h5 class=\"lh-lg fw-bold text-light mb-4 font-sans-serif\">Informations</h5>
                        <ul class=\"list-unstyled mb-md-4 mb-lg-0\">
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">About</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Pricing</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Blog</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Careers</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Contact</a></li>
                        </ul>
                        </div>
                        <div class=\"col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2\">
                        <h5 class=\"lh-lg fw-bold text-light mb-4 font-sans-serif\"> More</h5>
                        <ul class=\"list-unstyled mb-md-4 mb-lg-0\">
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Press</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Investors</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Terms</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Privacy</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Help</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Accessibility</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Contact</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Articles</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Directory</a></li>
                            <li class=\"lh-lg\"><a class=\"text-200\" href=\"#!\">Affiliates</a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <!-- end of .container-->

                </section>
                <!-- <section> close ============================-->
                <!-- ============================================-->


                <section class=\"py-0\" style=\"margin-top: -5.8rem;\">
                    <div class=\"container bg-primary\">
                    <div class=\"row justify-content-md-between justify-content-evenly py-4\">
                        <div class=\"col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start\">
                        <p class=\"fs--1 my-2 fw-bold\">Todos los derechos reservados &copy; CIFP Zonzamas, 2024</p>
                        </div>
                        <div class=\"col-12 col-sm-8 col-md-6\">
                        <p class=\"fs--1 my-2 text-center text-md-end\"> Made with&nbsp;
                            <svg class=\"bi bi-suit-heart-fill\" xmlns=\"http://www.w3.org/2000/svg\" width=\"12\" height=\"12\" fill=\"#EB6453\" viewBox=\"0 0 16 16\">
                            <path d=\"M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z\"></path>
                            </svg>&nbsp;by&nbsp;<a class=\"fw-bold text-900\" href=\"https://themewagon.com/\" target=\"_blank\">ThemeWagon </a>
                        </p>
                        </div>
                    </div>
                    </div>
                </section>
                </main>
                <!-- ===============================================-->
                <!--    End of Main Content-->
                <!-- ===============================================-->




                <!-- ===============================================-->
                <!--    JavaScripts-->
                <!-- ===============================================-->
                <script src=\"/vendors/@popperjs/popper.min.js\"></script>
                <script src=\"/vendors/bootstrap/bootstrap.min.js\"></script>
                <script src=\"/vendors/is/is.min.js\"></script>
                <script src=\"https://polyfill.io/v3/polyfill.min.js?features=window.scroll\"></script>
                <script src=\"/vendors/fontawesome/all.min.js\"></script>
                <script src=\"/assets/js/theme.js\"></script>
                <script src=\"/js/efects.js\"></script>

                <link href=\"https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap\" rel=\"stylesheet\">
            </body>

            </html>
            
            
            ";
        }


        static function cargarSeccion($seccion)
        {
            $titulo = 'CIFP Zonzamas';
            if (!empty($seccion))
                $titulo .= ' - '.ucfirst($seccion);

            $salida = Plantilla::header($titulo);
            

            switch($seccion)
            {
                case 'biblioteca':
                    $objeto_crud = new BibliotecaCRUD();
                break;

                default:
                    $objeto_crud = new IndexCRUD();                    
                break;
            }

            $salida .= $objeto_crud->main();

            $salida .= Plantilla::footer();

            return $salida;

        }

    }