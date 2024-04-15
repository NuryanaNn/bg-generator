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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Theme</title>
</head>
<body>
    <div class="container">
        <h2>Add New Theme</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <th>Name Of Your Theme</th>
                    <td><input type="text" name="theme_name"></td>
                </tr>
                <tr>
                    <th>Color Of Page Color</th>
                    <td><input type="color" name="page_color"></td>
                </tr>
                <tr>
                    <th>Color Of Heading</th>
                    <td><input type="color" name="heading_color"></td>
                </tr>
                <tr>
                    <th>Align Of Heading 1</th>
                    <td>
                        <select name="heading_alignment">
                            <option value="left">Left</option>
                            <option value="center">Center</option>
                            <option value="right">Right</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Color Of Paragraph</th>
                    <td><input type="color" name="paragraph_color"></td>
                </tr>
                <tr>
                    <th>Font Size Of Paragraph</th>
                    <td><input type="number" name="paragraph_font_size">px</td>
                </tr>
            </table>
            <button type="submit">Add Theme</button>
        </form>
        <br>
        <!-- Tambahkan teks atau tautan ke halaman tambah tema di bawah formulir -->
        <!-- <p>Fill out the form above to add another theme.</p> -->
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
