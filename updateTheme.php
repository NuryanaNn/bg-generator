<?php
// Memeriksa apakah data tema yang dikirimkan dari formulir
if(isset($_POST['theme_name']) && isset($_POST['new_theme_name'])) {
    // Mendapatkan data tema yang dikirimkan dari formulir
    $theme_name = $_POST['theme_name'];
    $new_theme_name = $_POST['new_theme_name'];
    $new_page_color = $_POST['new_page_color'];
    $new_heading_color = $_POST['new_heading_color'];
    $new_heading_alignment = $_POST['new_heading_alignment'];
    $new_paragraph_color = $_POST['new_paragraph_color'];
    $new_paragraph_font_size = $_POST['new_paragraph_font_size'];

    // Mengambil data tema yang ada dari cookie
    $themes = isset($_COOKIE['themes']) ? json_decode($_COOKIE['themes'], true) : array();

    // Mencari indeks tema yang akan diperbarui
    $index = array_search($theme_name, array_column($themes, 'theme_name'));

    // Jika tema ditemukan, lakukan pembaruan
    if($index !== false) {
        $themes[$index]['theme_name'] = $new_theme_name;
        $themes[$index]['page_color'] = $new_page_color;
        $themes[$index]['heading_color'] = $new_heading_color;
        $themes[$index]['heading_alignment'] = $new_heading_alignment;
        $themes[$index]['paragraph_color'] = $new_paragraph_color;
        $themes[$index]['paragraph_font_size'] = $new_paragraph_font_size;

        // Mengonversi array tema ke dalam bentuk string JSON
        $themes_json = json_encode($themes);

        // Menyimpan data tema dalam cookie
        setcookie('themes', $themes_json, time() + 3600, '/');
        
        // Redirect kembali ke halaman utama setelah pembaruan tema
        header("Location: index.php");
        exit();
    } else {
        // Jika tema tidak ditemukan, tampilkan pesan kesalahan
        echo "Error: Theme not found.";
    }
} else {
    // Jika tidak ada data tema yang dikirimkan, tampilkan pesan kesalahan
    echo "Error: No theme data submitted.";
}
?>
