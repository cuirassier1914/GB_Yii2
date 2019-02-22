<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 21.02.2019
 * Time: 20:05
 */

?>

<h1>День</h1>
<h3><?= $day->date; ?></h3>
<p><?= $day->is_weekend; ?></p>
<?php if (isset($day -> activities[0])): ?>
    <h3>Активности</h3>
<?php else: ?>
    <h3>Нет запланированных активностей</h3>
<?php endif; ?>
