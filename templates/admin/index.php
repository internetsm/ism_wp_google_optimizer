<div class="wrap">
    <h1>Ism Google Optimizer</h1>
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
    <form method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="posts_per_page">Lista CSS in FOOTER</label></th>
                <td>
                    <ul>
                        <?php foreach ($ism_footer_styles as $ism_footer_style) : ?>
                            <li>
                                <?php echo $ism_footer_style; ?>
                                <button class="button"><span class="dashicons dashicons-trash"></span></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </form>

</div>