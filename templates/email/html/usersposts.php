<?php

echo "<p>Ecco il riepilogo degli ultimi " . $n_posts . " post per utente</p>\n";


foreach ($usersPosts as $user) {

    echo '<p> ' . $user["name"] . " has written</p>\n";
    echo "<ul>";
    foreach ($user["posts"] as $post) {
        echo '<li> ' . $post["title"] . "</li>\n";
    }
    echo "</ul>";
}
