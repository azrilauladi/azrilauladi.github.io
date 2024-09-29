<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cek apakah data diterima
    $location = isset($_POST['location']) ? $_POST['location'] : 'No location';
    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : 'No start date';
    $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : 'No end date';

    // Buat array untuk dikirim ke AJAX sebagai response
    $response = array(
        'location' => $location,
        'start_date' => $start_date,
        'end_date' => $end_date
    );

    // Kirim response dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
