

<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>


    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php foreach ($list_category as $category) :?>
                <!-- <li class="main-navigation__list-item main-navigation__list-item--active"> -->
                <li class="main-navigation__list-item <?= ($choosen_project === $category['alias']) ? 'main-navigation__list-item--active' : ''?>">
                    <a class="main-navigation__list-item-link" href="index.php?category=<?= $category['alias']; ?>"><?= $category['name']; ?> </a>
                    <span class="main-navigation__list-item-count"><?= count_title($all_business, $category) ?></span>
                </li>
            <?php endforeach;?>
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button"
       href="pages/form-project.html" target="project_add">Добавить проект</a>
</section>

<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox"  >

            <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
            <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if($show_complete_tasks===1):?>checked<?php endif; ?>>
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">

        <?php while ($j < $num_items_business): ?>
            <?php $del = $business[$j]; ?>

            <?php if(($del['status']) && ($show_complete_tasks)): ?>
                <tr class="tasks__item task task--completed">
                    <td class="task__select">
                        <label class="checkbox task__checkbox">
                            <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" checked>
                            <span class="checkbox__text"><?=htmlspecialchars($del['title']);?></span>
                        </label>
                    </td>
                    <td class="task__date"><?=htmlspecialchars($del['deadline']); ?></td>
                </tr>
            <?php elseif(($del['status']) && !($show_complete_tasks)):?>
            <?php elseif (date('d-m-Y', time()) === date('d-m-Y', strtotime($del['deadline']))) : ?>
                <tr class="tasks__item task task--important">
                    <td class="task__select">
                        <label class="checkbox task__checkbox">
                            <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                            <span class="checkbox__text"><?=htmlspecialchars($del['title']);?></span>
                        </label>
                    </td>
                    <td class="task__date"><?=htmlspecialchars($del['deadline']); ?></td>
                </tr>
            <?php else:?>
                <tr class="tasks__item task">
                    <td class="task__select">
                        <label class="checkbox task__checkbox">
                            <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                            <span class="checkbox__text"><?=htmlspecialchars($del['title']);?></span>
                        </label>
                    </td>
                    <td class="task__date"><?=htmlspecialchars($del['deadline']); ?></td>
                </tr>
            <?php endif?>
            <?php $j++; ?>
        <?php endwhile; ?>
    </table>
</main>
