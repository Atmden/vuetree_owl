<?php

namespace App\Admin\Sections;

use App\Models\User;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;


use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
/**
 * Class UsersTree
 *
 * @property \App\Models\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class UsersTree extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Дерево';
    protected $icon = 'fa fa-tree';
    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::vuetree()
            ->setValue('fio')
            ->setEditText('Перейти в карточку пользователя')
            ->setEditUrl('/admin/users/')
            ->setReorderable(false);

        return $display;
    }



    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation();
    }

    //Права на доступ по ролям пользователя
    public function isDisplayable()
    {
        if(auth('admin')->user()->can('display-trees')) {
            return true;
        }
        return false;
    }
}
