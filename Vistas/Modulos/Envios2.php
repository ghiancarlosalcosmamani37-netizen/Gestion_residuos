<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Crear una nueva conexión a la base de datos
    $conn = new mysqli('localhost','root','','Apurimeño');

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Preparar la consulta SQL
    $stmt = $conn->prepare("SELECT * FROM encomiendas WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();

    // Verificar si se encontró una encomienda con el ID proporcionado
    if ($result->num_rows > 0) {
        // Obtener los detalles de la encomienda
        $detalles_encomienda = $result->fetch_assoc();

        // Devolver los detalles de la encomienda como un objeto JSON
        echo json_encode($detalles_encomienda);
    } else {
        // Si no se encontró una encomienda con el ID proporcionado, devolver un mensaje de error
        echo json_encode(['error' => 'No se encontraron detalles de la encomienda.']);
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se proporcionó un ID válido, devolver un mensaje de error
    echo json_encode(['error' => 'No se proporcionó un ID válido.']);
}
?>