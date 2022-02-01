<?php
// $id

require_once "_listeFilms.php";

if (isset($films[$id])) {

    $film = $films[$id];
    ?>

    <h1><?= $film['titre'] ?></h1>

    <p>Sortie : <?= $film['annee']?></p>
    <p>Durée : <?= $film['duree'] ?> min</p>

    <div>
        <p>auctor elit tempor vitae. Nam molestie facilisis sem, eu posuere leo ultrices a. Fusce sit amet arcu vitae neque pretium vulputate. Vivamus ac tortor id urna volutpat lobortis et quis massa. Duis maximus nunc ac libero suscipit hendrerit. Sed interdum massa sit amet lacus suscipit rutrum. Nam elementum leo ut porttitor vehicula. Nulla lacinia elit dapibus dolor vestibulum, ut pharetra ante ultrices. Pellentesque suscipit sem eget eros condimentum vulputate. Duis aliquam sapien ipsum, a ultricies magna condimentum id. Nullam vitae dui suscipit, egestas nisl sed, aliquam risus.</p>
        <p>Nulla ac hendrerit arcu, gravida rhoncus purus. In sit amet faucibus ante. Nullam massa sapien, rhoncus condimentum bibendum at, luctus vel quam. Aliquam fringilla nibh tortor, non fringilla turpis suscipit quis. Mauris nec nulla elementum, condimentum ex vitae, tempus orci. Nulla a orci pulvinar, sagittis leo nec, pellentesque mauris. Praesent porttitor odio et est pharetra, nec cursus neque ultrices. Vivamus mattis nibh quis nibh venenatis accumsan. In lobortis enim at neque hendrerit, quis dapibus tortor facilisis. Cras lectus odio, luctus at nisi nec, fringilla finibus purus. Donec dignissim est nec diam varius accumsan. Nullam tristique, ante tincidunt cursus scelerisque, ipsum elit aliquam felis, sed consectetur sapien orci sit amet erat. Proin facilisis eros nibh, elementum ultrices nibh efficitur in.</p>
        <p>Duis ultrices mauris eget imperdiet eleifend. Cras laoreet nunc luctus velit placerat, et dictum libero ultrices. Nulla interdum ac nisi vel placerat. Fusce vitae tempor ipsum. Pellentesque ac dictum ipsum. Vivamus luctus ligula a quam pulvinar, auctor tincidunt sem scelerisque. Mauris magna est, pulvinar eget neque sed, blandit lacinia libero. Phasellus dapibus felis at enim eleifend, id sollicitudin est ultricies. Duis lobortis diam sem, ut condimentum sem aliquet vitae.</p>
        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce pretium mollis viverra. Cras orci nunc, tristique non ex quis, bibendum auctor dui. Nullam efficitur aliquet nisi. Etiam ac nisi enim. Sed volutpat lorem magna, at accumsan lorem convallis sit amet. Quisque ut tempus velit, a volutpat libero. Morbi sit amet malesuada massa. Pellentesque et purus interdum, iaculis mi eget, mattis magna. Aenean elementum mauris leo, id aliquet sapien accumsan eu. Vestibulum sed interdum orci. Praesent vel enim dignissim dui aliquet porttitor. Integer faucibus magna a risus tincidunt scelerisque.</p>
    </div>

<?php } else { ?>
    Film <?= $id ?> inexistant
<?php } ?>
