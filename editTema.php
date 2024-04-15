<?php
// Memeriksa apakah ada tema yang dipilih dari URL
if(isset($_GET['theme_name'])) {
    // Mendapatkan nama tema dari URL
    $theme_name = $_GET['theme_name'];

    // Menampilkan informasi tema yang dipilih
    echo "<h2>Edit Theme: $theme_name</h2>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Theme</title>
</head>
<body>
    <div class="container">
        <form action="updateTheme.php" method="post">
            <input type="hidden" name="theme_name" value="<?php echo $theme_name; ?>">
            <table>
                <tr>
                    <th>Name Of Your Theme</th>
                    <td><input type="text" name="new_theme_name"></td>
                </tr>
                <tr>
                    <th>Color Of Page Color</th>
                    <td><input type="color" name="new_page_color"></td>
                </tr>
                <tr>
                    <th>Color Of Heading</th>
                    <td><input type="color" name="new_heading_color"></td>
                </tr>
                <tr>
                    <th>Align Of Heading 1</th>
                    <td>
                        <select name="new_heading_alignment">
                            <option value="left">Left</option>
                            <option value="center">Center</option>
                            <option value="right">Right</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Color Of Paragraph</th>
                    <td><input type="color" name="new_paragraph_color"></td>
                </tr>
                <tr>
                    <th>Font Size Of Paragraph</th>
                    <td><input type="number" name="new_paragraph_font_size">px</td>
                </tr>
            </table>
            <button type="submit">Update Theme</button>
        </form>
        <br>
        <!-- Tambahkan teks atau tautan untuk kembali ke halaman utama -->
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>

<?php
} else {
    // Jika tidak ada tema yang dipilih dari URL, tampilkan pesan kesalahan
    echo "<p>Error: No theme selected.</p>";
}
?>
