<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

use humhub\modules\tasks\helpers\TaskListUrl;
use humhub\modules\tasks\models\lists\TaskList;
use humhub\modules\tasks\widgets\lists\TaskListItem;
use humhub\widgets\Button;
use yii\helpers\Html;

/* @var $this \humhub\modules\ui\view\components\View */
/* @var $list \humhub\modules\tasks\models\lists\TaskListInterface */
/* @var $title string */
/* @var $color string */
/* @var $listId int|null */
/* @var $options array */
/* @var $tasks \humhub\modules\tasks\models\Task[] */
/* @var $completedTasks \humhub\modules\tasks\models\Task[] */
/* @var $completedTasksCount int */
/* @var $contentContainer \humhub\modules\content\components\ContentContainerActiveRecord */
/* @var $editListUrl string|null */
/* @var $addTaskUrl string */
/* @var $showMoreCompletedUrl string */
/* @var $canManage boolean */
/* @var $canCreate boolean */
/* @var $canSort boolean */

?>

<?= Html::beginTag('div', $options) ?>
<div class="task-list-container collapsable" style="border-color:<?= Html::encode($color) ?>">
    <div class="task-list-title-bar task-toggled-color clearfix">
        <div>

        <?php if ($canSort) : ?>
            <i class="fa fa-arrows task-moving-handler"></i>
        <?php else: ?>
            <i class="fa fa-tasks"></i>
        <?php endif ?>

        <span class="task-list-title-text">
            <?= Html::encode($title) ?> <small><?= !empty($tasks) ? '('.count($tasks).')' : '' ?></small>
        </span>

        <?php if ($list instanceof TaskList) : ?>
            <?= Button::asLink()->icon('fa-pencil')->xs()
                ->action('task.list.edit', TaskListUrl::editTaskList($list))
                ->loader(false)
                ->cssClass('task-list-edit tt task-toggled-color')->options(['title' => Yii::t('TasksModule.base', 'Edit list')])->visible($canManage) ?>
            <?= Button::asLink()->icon('fa-trash')->xs()
                ->action('deleteList', TaskListUrl::deleteTaskList($list))->loader(false)
                ->cssClass('task-list-edit tt task-toggled-color')
                ->options(['title' => Yii::t('TasksModule.base', 'Delete list')])->visible($canManage)->confirm() ?>

        <?php endif; ?>

        <i class="fa fa-caret-up toggleItems pull-right"></i>

        <?= Button::success()->icon('fa-plus')->sm()->right()->style('margin-top:-3px')
            ->action('ui.modal.load', TaskListUrl::addTaskListTask($list))
            ->loader(false)->visible($canCreate)->cssClass('tt')->options(['title' => Yii::t('TasksModule.base', 'Add task')]) ?>
        </div>
    </div>

    <div class="task-list-items">
        <?php foreach ($tasks as $task) : ?>
            <?= TaskListItem::widget(['task' => $task]) ?>
        <?php endforeach; ?>
    </div>

    <div class="task-list-items tasks-completed" style="<?= (!$completedTasksCount) ? 'display:none' : '' ?>">

        <?php foreach ($completedTasks as $task) : ?>
            <?= TaskListItem::widget(['task' => $task]) ?>
        <?php endforeach; ?>

        <?php if ($completedTasksCount > count($completedTasks)) : ?>
            <?php $remainingCount = $completedTasksCount - count($completedTasks); ?>
            <div class="task-list-task-completed-show-more">
                <?= Button::asLink('<i class="fa fa-chevron-down"></i> ' . Yii::t('TasksModule.base', 'Show {count} more completed {countTasks,plural,=1{task} other{tasks}}', ['count' => $remainingCount, 'countTasks' => $remainingCount]))
                    ->action('showMoreCompleted', TaskListUrl::showMore($list))->cssClass('showMoreCompleted')->loader(true) ?>
            </div>
        <?php endif; ?>

    </div>
</div>
<?= Html::endTag('div') ?>
