<?php if (empty($dati)) { ?>
    <section class="mt-5 jumbotron text-center ">
        <div class="container">
            <h1 class="jumbotron-heading">Invia il riepilogo dei post per utente </h1>

            <?php echo $this->Form->create(); ?>
            <div class="form-group">
                <label for="nPosts">N. di post per utente</label>
                <?php echo $this->Form->control('nPosts', [
                    'label' => false,
                    'class' => 'form-control',
                    'value' => '3'
                ]);
                ?>
                <small id="nPostsHelp" class="form-text text-muted">Il numero di post per utente che ti verrà inviato.</small>
            </div>
            <button type="submit" class="btn btn-primary">Invia Email</button>
            </form>
        </div>

    <?php } else { ?>
        <section class="mt-5 jumbotron">
            <div class="container">
            <?php
            echo "<p>Ecco il riepilogo degli ultimi " . $n_posts . " post per utente</p>\n";


            foreach ($dati as $el) {

                echo '<p> ' . $el["name"] . " has written</p>\n";
                echo "<ul>";
                foreach ($el["posts"] as $post) {
                    echo '<li> ' . $post["title"] . "</li>\n";
                }
                echo "</ul>";
            }
        }
            ?>
        </section>