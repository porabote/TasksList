<h1>Tasks</h1>
<a href="/tasks/add/">Добавить задачу</a>
<style>

     H1 {
         padding: 20px 0;
     }
     .list-grid {
         display: grid;
         grid-template-columns: 50px 200px 200px 400px 200px;
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
    .list-grid__item .small_text {
        font-size: 11px;
    }
</style>


<?php
$sortLink = (isset($_GET['sort']) && $_GET['sort'] == 'ASC') ? '/tasks/index/?sort=DESC&' : '/tasks/index/?sort=ASC&';
if(isset($_GET['page'])) $sortLink .= 'page=' . $_GET['page'] . '&';

?>

<div class="list-grid head">
    <span class="list-grid__item"></span>
    <span class="list-grid__item"><a href="<?=$sortLink?>order=user_name">имя пользователя</a></span>
    <span class="list-grid__item"><a href="<?=$sortLink?>order=user_email">email</a></span>
    <span class="list-grid__item">Текст задачи</span>
    <span class="list-grid__item"><a href="<?=$sortLink?>order=completed">статус</a></span>
</div>


<?php foreach($this->data['tasks'] as $task): ?>

    <div class="list-grid">
        <span class="list-grid__item">
            <?=(!isset($_SESSION['username'])) ? $task['id'] : '<a href="/tasks/edit/?id=' . $task['id'] . '">' . $task['id'] . '</a>' ?>
        </span>
        <span class="list-grid__item"><?=$task['user_name']?></span>
        <span class="list-grid__item"><?=$task['user_email']?></span>
        <span class="list-grid__item"><?=htmlspecialchars($task['task_body'])?></span>
        <span class="list-grid__item">
            <?=($task['completed']) ? 'Выполнено' : 'В работе' ?>
            <?=($task['modified_admin']) ? '<p class="small_text">отредактировано администратором</p>' : '' ?></snap>
        </span>
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
