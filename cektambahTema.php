<?php
// Memeriksa apakah ada data yang dikirimkan dari formulir
if(isset($_POST['theme_name'])) {
    // Mengambil data tema dari formulir
    $theme_name = $_POST['theme_name'];
    $page_color = $_POST['page_color'];
    $heading_color = $_POST['heading_color'];
    $heading_alignment = $_POST['heading_alignment'];
    $paragraph_color = $_POST['paragraph_color'];
    $paragraph_font_size = $_POST['paragraph_font_size'];

    // Menyimpan data tema dalam cookie
    $theme_data = array(
        'theme_name' => $theme_name,
        'page_color' => $page_color,
        'heading_color' => $heading_color,
        'heading_alignment' => $heading_alignment,
        'paragraph_color' => $paragraph_color,
        'paragraph_font_size' => $paragraph_font_size
    );

    // Mengambil data tema yang ada dari cookie
    $themes = isset($_COOKIE['themes']) ? json_decode($_COOKIE['themes'], true) : array();

    // Menambahkan data tema baru ke dalam array tema
    $themes[] = $theme_data;

    // Mengonversi array tema ke dalam bentuk string JSON
    $themes_json = json_encode($themes);
    
    // Menyimpan data tema dalam cookie
    setcookie('themes', $themes_json, time() + 3600, '/');
}
?>