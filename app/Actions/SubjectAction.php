<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class SubjectAction extends AbstractAction
{
    public function getTitle()
    {
        return  $this->data->questions()->count() . " Questions";
    }

    public function getIcon()
    {
        return 'voyager-question';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success   ',
        ];
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'categories';
    }

    public function getDefaultRoute()
    {
        return route('voyager.questions.index', ['key' => 'category_id', 'filter' => 'equals', 's' => $this->data->title]);
    }

    public function shouldActionDisplayOnRow($row)
    {
        return true;
    }
}
