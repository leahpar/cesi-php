<?php
if (isset($_SESSION['message'])) { ?>
    <p class="<?= $_SESSION['message-class']?>">
        <?= $_SESSION['message'] ?>
    </p>
    <?php
    unset($_SESSION['message']);


}
