<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 21.02.2019
 * Time: 20:05
 */

?>

<h1>День</h1>
<h3><?= $day->date_title; ?></h3>
<p><?= $day->is_weekend; ?></p>
<?php if (isset($day -> activities[0])): ?>
    <h3>Активности</h3>
<?php else: ?>
    <h3>Нет запланированных активностей</h3>
<?php endif; ?>
<a href="\activity\create?date_start=<?= $day->date; ?>"><button>Создать активность</button></a>
<a href="/calender"><button>Календарь</button></a>
