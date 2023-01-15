<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class RevaluateAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Recheck';
    }

    public function getIcon()
    {
        return 'voyager-check-circle';
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
        return $this->dataType->slug == 'exams';
    }

    public function getDefaultRoute()
    {
        return route('exam.recheck', $this->data);
    }

    public function shouldActionDisplayOnRow($row)
    {
        return true;
    }
}
