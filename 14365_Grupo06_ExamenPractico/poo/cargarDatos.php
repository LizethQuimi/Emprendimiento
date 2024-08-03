<?php
require_once 'class.pais.php';
require_once 'class.provincia.php';
require_once 'class.ciudad.php';

class CargadorDatosJSON {
    public static function cargarDatos($archivo) {
        $jsonString = file_get_contents($archivo);
        $data = json_decode($jsonString, true);
        $paises = array();

        foreach ($data as $nombre => $pais) {
            $platosTipicos = isset($pais['plato_tipico']) ? $pais['plato_tipico'] : array();
            $moneda = isset($pais['moneda']) ? $pais['moneda'] : null;
            $bandera = isset($pais['bandera']) ? $pais['bandera'] : null;

            $provincias = array();
            if (isset($pais['provincias'])) {
                foreach ($pais['provincias'] as $nombreProv => $provincia) {
                    $numCiudades = isset($provincia['numCiudades']) ? $provincia['numCiudades'] : 0;

                    $ciudades = array();
                    if (isset($provincia['ciudades'])) {
                        foreach ($provincia['ciudades'] as $ciudad) {
                            $nombreCiudad = isset($ciudad['nombre']) ? $ciudad['nombre'] : null;
                            $codigoPostal = isset($ciudad['CodigoPostal']) ? $ciudad['CodigoPostal'] : null;
                            if ($nombreCiudad !== null && $codigoPostal !== null) {
                                $ciudades[] = new Ciudad($nombreCiudad, $codigoPostal);
                            }
                        }
                    }

                    $provincias[] = new Provincia($nombreProv, $numCiudades, $ciudades);
                }
            }

            $paises[] = new Pais($nombre, $platosTipicos, $moneda, $provincias);
        }

        return $paises;
    }
}
?>
