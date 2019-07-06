<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Countries</h1>
<ul>
<?php foreach ($posts as $post): ?>
    <li>
        <?= Html::encode("{$post->title}") ?>:
    </li>
<?php endforeach; ?>
</ul>
 