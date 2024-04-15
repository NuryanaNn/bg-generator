<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BG Generator</title>
    <style id="theme_css">
        /* CSS default tanpa tema */
        body {
            background-color: #fff; /* Ganti dengan warna default yang diinginkan */
            color: #000; /* Ganti dengan warna default yang diinginkan */
        }
        h1 {
            color: #000; /* Ganti dengan warna default yang diinginkan */
            text-align: left; /* Atur posisi default yang diinginkan */
        }
        p {
            font-size: 14px; /* Atur ukuran default yang diinginkan */
        }
    </style>
</head>
<body>
    <header>
        <ul>
        <li>Theme : 
                <select name="selected_theme" id="selected_theme">
                    <option value="">-- Choose A Theme --</option>
                    <?php
                    // Menampilkan tema-tema yang disimpan dalam cookie dalam dropdown
                    if(isset($_COOKIE['themes'])) {
                        $themes = json_decode($_COOKIE['themes'], true);
                        foreach ($themes as $theme) {
                            echo "<option value=\"{$theme['theme_name']}\">{$theme['theme_name']}</option>";
                        }
                    }
                    ?>
                </select>
            </li>
            <li><a href="tambahTema.php">Add New Theme</a></li>
        </ul>
        <ul>
            <li><button onclick="chooseTheme()">Choose The Theme</button></li>
            <li><button><a id="edit_theme_link" href="#" class="edt">Edit The Theme</a></button></li>
        </ul>
        <hr>
    </header>
    <div class="container">
        <h1>Header 1</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis inventore enim laudantium libero sequi dicta aspernatur aperiam nulla non atque perferendis nisi at aliquid possimus quam aut suscipit, sunt neque laboriosam, cum sint deleniti! Illo laudantium, natus error aspernatur consequuntur, quibusdam blanditiis officia minus consectetur temporibus totam ipsum! Omnis porro facilis, temporibus accusamus necessitatibus voluptatem sed minima molestias tempora eaque? Illo rem officiis ab ad veritatis pariatur excepturi aliquam non libero, amet molestiae modi nobis deserunt sint nesciunt impedit cum, minus praesentium ea adipisci alias? Sunt a est, suscipit praesentium alias earum eaque excepturi aspernatur, vel in corrupti ut veniam quam nisi delectus sequi id error porro mollitia quia exercitationem ullam incidunt. A odio qui quis et fugit? Dolores, saepe aliquid! At iste animi, fugiat perferendis natus repellat officia distinctio, quidem aperiam ea quae omnis dignissimos, dolor eius sapiente? Vel exercitationem minima cumque asperiores repudiandae odit, numquam placeat sequi voluptatum porro, veniam repellendus! Magnam minima officiis deleniti iste aliquam expedita id, quasi eum consectetur eaque ea repellendus labore laudantium, nam aspernatur culpa error in quos autem pariatur vitae, officia dolores. Quisquam minima debitis quis aliquid nisi! Ex esse tempora eligendi assumenda modi fugit voluptatibus corporis, at dolor dolore quae in, sed ut neque dolores. Esse voluptatem, cumque ipsum impedit doloremque perferendis tenetur, animi sapiente reprehenderit minima deserunt ullam? A saepe, laudantium eaque incidunt iste consequuntur officia sint? Molestias, assumenda enim eius accusamus, error eveniet et quibusdam inventore voluptate architecto, exercitationem dolores iste nulla. Repellat ducimus maiores, inventore, harum consequuntur incidunt saepe qui aperiam ipsa labore esse beatae minus iure quibusdam accusamus provident deleniti expedita! Sint hic molestias similique dolor in autem blanditiis corporis explicabo tenetur at laborum repellendus facere facilis beatae animi vel cupiditate, error a, fugiat aut voluptates esse! Dolor ad quasi reprehenderit, consectetur vel libero minus, in nihil dicta quibusdam ratione voluptatum nemo? In itaque recusandae blanditiis repellendus, deleniti incidunt nostrum soluta nam doloribus quo, vero perspiciatis autem unde quisquam voluptatem tenetur non et rem placeat suscipit id. Magni quos ullam in a id commodi dolorum repellat voluptates, illum odio tenetur tempora modi consectetur maiores architecto possimus qui accusantium, culpa facere, molestias earum ea exercitationem. Eius eveniet aperiam voluptates nihil, atque labore quasi. Eveniet quaerat dignissimos nesciunt quis, velit porro at vitae iste veritatis repudiandae deserunt facere. Nulla incidunt saepe nisi magnam ex explicabo eius nostrum dolore rem, tenetur tempora asperiores reiciendis ea rerum officia, quod nemo dolor, eum quisquam officiis ipsum error exercitationem. Aperiam beatae reiciendis eligendi, laboriosam blanditiis magni sequi tempore aliquam explicabo ipsa doloremque quam eius debitis dignissimos ratione, inventore quas cum assumenda officiis autem dicta! Veniam esse adipisci, non ab iusto nemo molestiae nesciunt porro dolorum doloremque? Corrupti minus similique nemo eum ab ea fugiat illum architecto unde non vitae, sed alias mollitia ex rem dolorem rerum modi nisi delectus quibusdam nulla totam! Quod officia consequatur fugit deserunt obcaecati consequuntur quia unde alias placeat, molestiae dolor nulla aut fuga sequi praesentium! Mollitia hic porro minima rerum voluptatum quo, rem ut ab repudiandae ullam maiores.</p>
    </div>

    <script>
        function chooseTheme() {
            var selectedTheme = document.getElementById("selected_theme").value;
            if(selectedTheme) {
                // Mendapatkan CSS yang sesuai dengan tema yang dipilih
                var css = getThemeCss(selectedTheme);
                // Menyetel CSS sesuai dengan tema yang dipilih
                document.getElementById("theme_css").innerHTML = css;
            } else {
                alert("Please choose a theme.");
            }
        }

        function getThemeCss(theme) {
            // Mendapatkan data tema dari cookie
            var themes = <?php echo isset($_COOKIE['themes']) ? $_COOKIE['themes'] : "[]"; ?>;
            // Mencari tema yang sesuai dengan tema yang dipilih
            var selectedThemeData = themes.find(function(item) {
                return item.theme_name === theme;
            });
            // Mengembalikan CSS yang sesuai dengan tema yang dipilih
            return `
                body {
                    background-color: ${selectedThemeData.page_color || "#fff"};
                    color: ${selectedThemeData.paragraph_color || "#000"};
                }
                h1 {
                    color: ${selectedThemeData.heading_color || "#000"};
                    text-align: ${selectedThemeData.heading_alignment || "left"};
                }
                p {
                    font-size: ${selectedThemeData.paragraph_font_size || "14"}px;
                }
            `;
        }

        document.getElementById("edit_theme_link").addEventListener("click", function(event) {
    // Mendapatkan nilai tema yang dipilih dari dropdown
    var selectedTheme = document.getElementById("selected_theme").value;
    if(selectedTheme) {
        // Mengatur URL untuk halaman temaedit.php dengan tema yang dipilih
        this.href = "editTema.php?theme_name=" + encodeURIComponent(selectedTheme);
    } else {
        // Menampilkan pesan jika tema tidak dipilih
        alert("Please choose a theme.");
        // Mencegah navigasi jika tema tidak dipilih
        event.preventDefault();
    }
});

    </script>
</body>
</html>
