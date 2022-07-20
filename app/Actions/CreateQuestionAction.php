<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class CreateQuestionAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Create Question';
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
            'class' => 'btn btn-sm btn-primary pull-right ',
        ];
    }

    public function shouldActionDisplayOnDataType(){
        return $this->dataType->slug == 'exams';
    }

    public function getDefaultRoute()
    {
        return route('voyager.questions.create',['exam'=>$this->data->id]);
    }   
}