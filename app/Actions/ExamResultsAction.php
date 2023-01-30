<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ExamResultsAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Results';
    }

    public function getIcon()
    {
        return 'voyager-data';
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
        return route('exam.results', $this->data);
    }

    public function shouldActionDisplayOnRow($row)
    {
        return true;
    }
}
