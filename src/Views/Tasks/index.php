<h1>Tasks</h1>
<a href="/tasks/add/">Добавить задачу</a>
<style>

 H1 {
     padding: 20px 0;
 }
 .list-grid {
     display: grid;
     grid-template-columns: 50px 200px 200px 200px 1fr;
     text-align: left;
 }
 .list-grid.head {
     font-weight: bold;
 }
 .list-grid__item {
     border-bottom: 1px solid #fafafa;
     padding: 4px 6px;
 }

 .pagination span {
     padding-left : 10px;
 }
</style>


<?php
$sortLink = '/tasks/index/?';
if(isset($_GET['page'])) $sortLink .= 'page=' . $_GET['page'] . '&';
?>

<div class="list-grid head">
    <span class="list-grid__item"></span>
    <span class="list-grid__item"><a href="<?=$sortLink?>order=user_name">Имя пользователя</a></span>
    <span class="list-grid__item"><a href="<?=$sortLink?>order=user_email">E-mail</a></span>
    <span class="list-grid__item"><a href="<?=$sortLink?>order=completed">Статус</a></span>
    <span class="list-grid__item">Задача</span>

</div>


<?php foreach($this->data['tasks'] as $task): ?>

    <div class="list-grid">
        <span class="list-grid__item">
            <?=(!isset($_SESSION['username'])) ? $task['id'] : '<a href="/tasks/edit/?id=' . $task['id'] . '">' . $task['id'] . '</a>' ?>
        </span>
        <span class="list-grid__item"><?=$task['user_name']?></span>
        <span class="list-grid__item"><?=$task['user_email']?></span>
        <span class="list-grid__item"><?=($task['completed']) ? 'Выполнено' : 'В работе' ?></span>
        <span class="list-grid__item"><?=$task['task_body']?></span>
    </div>

<?php endforeach; ?>

<div class="pagination">
    Страницы:
    <?php
    foreach($this->data['pages'] as $page) {
        if($page['current']) {
            echo '<span>' . $page['number'] . '</span>';
        } else {
            echo '<span><a href="' . $page['url'] . '">' . $page['number'] . '</a></span>';
        }
    }
    ?>
</div>
