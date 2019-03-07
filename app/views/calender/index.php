<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 22.02.2019
 * Time: 23:40
 */


?>
<h1><?= $model -> getToday()['year'] ?></h1>

<?php $month = 1; ?>
<?php foreach($model -> getMonths() as $item): ?>

<div class="month">
    <h3><?= $model -> monthsNames[$month - 1] ?></h3>
<?php for($i = 1; $i <= $item; $i++): ?>
    <a href="day/show?day=<?= $i ?>&month=<?= $month ?>&year=<?= $model -> getToday()['year'] ?>">
        <button type="submit"><?= $i ?></button>
    </a>
<?php endfor; ?>
</div>
<?php $month += 1; ?>
<?php endforeach; ?>
