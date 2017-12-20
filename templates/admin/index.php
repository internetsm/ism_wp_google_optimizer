<div class="wrap">
    <h1>Ism Google Optimizer</h1>

    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row"><label for="posts_per_page">Rigenera dipendenze</label></th>
            <td>
                <a href="<?php echo $generate_url; ?>"><button class="button">Rigenera</button> </a>
            </td>
        </tr>
        </tbody>
    </table>
    <form method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="posts_per_page">Lista CSS</label></th>
                <td>
                    <table class="scrollable-table">
                        <?php foreach ($ism_styles as $ism_style) : ?>
                            <tr>
                                <td><input type="checkbox" name="add_styles[]"
                                           value="<?php echo $ism_style; ?>"></td>
                                <td><?php echo $ism_style; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        <p>
            <button type="submit" class="button button-primary">Aggiungi selezionati</button>
        </p>
    </form>
    <?php if (count($ism_footer_styles)) : ?>
        <form method="post">
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="posts_per_page">Lista CSS in FOOTER</label></th>
                    <td>
                        <table>
                            <?php foreach ($ism_footer_styles as $ism_footer_style) : ?>
                                <tr>
                                    <td><input type="checkbox" name="drop_styles[]"
                                               value="<?php echo $ism_footer_style; ?>"></td>
                                    <td><?php echo $ism_footer_style; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <p>
                <button type="submit" class="button button-danger">Elimina selezionati <span
                            class="dashicons dashicons-trash"></span></button>
            </p>
        </form>
    <?php endif; ?>

</div>