<div class="wrap">
    <h1>Ism Google Optimizer</h1>
    <p>Se non vengono mostrati stili, aprire questa <a href="<?php echo $generate_url; ?>">url</a></p>
    <form method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="posts_per_page">Lista CSS</label></th>
                <td>
                    <select name="style">
                        <?php foreach ($ism_styles as $ism_style) : ?>
                            <option value="<?php echo $ism_style; ?>"><?php echo $ism_style; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="button">Aggiungi al footer</button>
                </td>
            </tr>
            </tbody>
        </table>
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