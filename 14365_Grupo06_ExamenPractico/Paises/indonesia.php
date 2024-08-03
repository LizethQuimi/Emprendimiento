<!DOCTYPE html>
<html lang="es">

<head>
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ASIA</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <style>
            .bg-static {
                background-image: url('../img/fondo3.jpg');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
            .btn-animated {
            transition: opacity 0.5s ease-in-out;
            }

            .btn-animated:hover {
                opacity: 0.7;
                transform: translateX(10px);
            }
            .custom-select {
                border-radius: 10px;
                padding: 8px 16px;
                font-size: 16px;
                color: #333;
                background-color: #fff;
                border: 1px solid #ccc;
            }

            .custom-select:focus {
                border-color: #66afe9;
                outline: 0;
                box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            }
        </style>
    </head>
</head>

        <body class="bg-static">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-9">
                <a class="navbar-brand" href="#!">FIFA</a>
                <!-- <a class="navbar-brand" href="#!">AFC</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="china.php">China</a></li>
                        <li class="nav-item"><a class="nav-link" href="coreaDelSur.php">Corea del Sur</a></li>
                        <li class="nav-item"><a class="nav-link" href="india.php">India</a></li>
                        <li class="nav-item"><a class="nav-link" href="indonesia.php">Indonesia</a></li>
                        <li class="nav-item"><a class="nav-link" href="japon.php">Japon</a></li>
                        <li class="nav-item"><a class="nav-link" href="rusia.php">Rusia</a></li>
                        <li class="nav-item"><a class="nav-link" href="singapur.php">Singapur</a></li>
                        <li class="nav-item"><a class="nav-link" href="Tailandia.php">Tailandia</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card border-primary shadow bg-" style="background-color: #f8f9fa;">
                    <div class="card-body">
                        <?php
                        require_once "../poo/LectorJson.php";
                        require_once "../poo/class.pais.php";
                        require_once "../poo/class.ciudad.php";

                        $reader = new LectorJSON("../json/paises.json");
                        $countryName = 'Indonesia';
                        $country = $reader->getCountry($countryName);
                        $platosTipicos = $country['plato_tipico'];
                        $moneda = $country['moneda'];
                        $imagen = $country['bandera'];
                        $provincias = array_keys($country['provincias']);
                        ?>
                        <h1 class="mb-4"><?php echo "Información del País"; ?></h1>

                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="mb-5 mt-3"><?php echo $countryName; ?></h2>
                                <p><strong>Plato Típico:</strong> <?php echo implode(", ", $platosTipicos); ?></p>
                                <p><strong>Moneda:</strong> <?php echo $moneda; ?></p>
                                <p><strong>Provincias:</strong> <?php echo implode(", ", $provincias); ?></p>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="<?php echo $imagen; ?>" alt="<?php echo $countryName; ?>" class="img-fluid">
                            </div>
                        </div>

                        <form method="post" class="province-info mt-4">
                            <label for="provincia" class="form-label">Selecciona una provincia:</label>
                            <select id="provincia" name="provincia" class="form-select custom-select">
                                <?php
                                foreach ($provincias as $provincia) {
                                    echo "<option value='$provincia'>$provincia</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" name="submit" class="custom-btn mt-3 btn btn-primary btn-animated text-center">Más info provincia</button>
                        </form>

                        <?php
                        if (isset($_POST["submit"])) {
                            $provinciaSeleccionada = $_POST["provincia"];
                            if (isset($country['provincias'][$provinciaSeleccionada])) {
                                $provincia = $country['provincias'][$provinciaSeleccionada];
                                $ciudades = $provincia['ciudades']['ciudad']; // Acceso a la lista de ciudades
                                $numCiudades = count($ciudades);
                                ?>
                                <div class="province-info mt-4">
                                    <h2><?php echo $provinciaSeleccionada; ?></h2>
                                    <p><strong>Número de ciudades:</strong> <?php echo $numCiudades; ?></p>
                                    <ul>
                                        <?php
                                        foreach ($ciudades as $ciudad) {
                                            echo "<li>{$ciudad['nombre']} - Código Postal: {$ciudad['CodigoPostal']}</li>"; // Acceso a nombre y código postal
                                        }
                                        ?>
                                    </ul>
                                </div>
                        <?php
                            } else {
                                echo "<p class='mt-4'>No se encontró información para la provincia seleccionada.</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
    <!-- Contenido HTML -->
    <div class="container mt-5">
        <div class="country-card">
            
        </div>
    </div>

    <!-- Scripts JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
