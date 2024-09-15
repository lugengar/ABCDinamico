<?php
include "../codigophp/conexionbs.php";

if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
    $id = $_GET['id'];

    if ($tipo == "establecimiento") {
        // Obtener los datos del establecimiento
        $query = "SELECT * FROM establecimiento WHERE id_establecimiento = ?";
    } elseif ($tipo == "planestudio") {
        // Obtener los datos del plan de estudio
        $query = "SELECT * FROM planestudio WHERE id_plan = ?";
    } elseif ($tipo == "carrera") {
        // Obtener los datos de la carrera
        $query = "SELECT * FROM carrera WHERE id_carrera = ?";
    } else {
        echo 'Tipo no válido.';
        exit;
    }

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        if ($tipo == "establecimiento") {
                include "../codigophp/construccion.php";

            echo '
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="' . htmlspecialchars($data['nombre']) . '" required>
                <label for="ubicacion">Ubicación:</label>
                <input type="text" id="ubicacion" name="ubicacion" value="' . htmlspecialchars($data['ubicacion']) . '" required>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="' . htmlspecialchars($data['descripcion']) . '" required>
                <label for="tipo_establecimiento">tipo_establecimiento:</label>
                <select name="tipo_establecimiento" id="tipo_establecimiento" required>';
                $query2 = " SELECT DISTINCT tipo_establecimiento
                    FROM establecimiento
                    ORDER BY
                        CASE
                            WHEN id_establecimiento = ? AND id_establecimiento != 0 THEN 0
                            ELSE 1
                        END, tipo_establecimiento
                ";
                $stmt = $conn->prepare($query2);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result2 = $stmt->get_result();
                establecimientolista($result2);
            echo'
                </select>
                <label for="servicios">Servicios:</label>
                <input type="text" id="servicios" name="servicios" value="' . htmlspecialchars($data['servicios']) . '" required>
                <label for="fk_distrito">fk_distrito:</label>
                <select name="fk_distrito" id="fk_distrito" required>';
                $query2 = " SELECT DISTINCT *
                    FROM distrito
                    ORDER BY
                        CASE
                            WHEN id_distrito = ? THEN 0
                            ELSE 1
                        END, nombre
                ";
                $stmt = $conn->prepare($query2);
                $stmt->bind_param("i", $data["fk_distrito"]);
                $stmt->execute();
                $result2 = $stmt->get_result();
                distritolista($result2);
            echo'
            </select>
                <label for="habilitado">¿Quiere que el establecimiento sea publico? (todos podran verlo):</label>
                <input type="checkbox" id="habilitado" name="habilitado" value='.htmlspecialchars($data['habilitado']) .'>
            ';
        } elseif ($tipo == "planestudio") {
            echo '
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="' . htmlspecialchars($data['nombre']) . '" required>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="' . htmlspecialchars($data['descripcion']) . '" required>
                <!-- Otros campos aquí... -->
            ';
        } elseif ($tipo == "carrera") {
            include "../codigophp/construccion.php";

            echo '
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="' . htmlspecialchars($data['nombre']) . '" required>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="' . htmlspecialchars($data['descripcion']) . '" required>
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" value="' . htmlspecialchars($data['titulo']) . '" required>
                <select name="tipo_carrera" id="tipo_carrera" required>';
                $query2 = " SELECT DISTINCT tipo_carrera
                    FROM carrera
                    ORDER BY
                        CASE
                            WHEN id_carrera = ? THEN 0
                            ELSE 1
                        END, tipo_carrera
                ";
                $stmt = $conn->prepare($query2);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result2 = $stmt->get_result();
                carreratipolista($result2);
            echo'
            </select>
                <!-- Otros campos aquí... -->
            ';
        }
    } else {
        echo ucfirst($tipo) . ' no encontrado.';
    }
} else {
    echo 'ID o tipo no proporcionado.';
}
?>
