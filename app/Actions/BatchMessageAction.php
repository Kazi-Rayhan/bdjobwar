<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class BatchMessageAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Send SMS';
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
        return $this->dataType->slug == 'batches';
    }

    public function getDefaultRoute()
    {
        return route('voyager.messages.create', ['batch' => $this->data->id]);
    }

    public function shouldActionDisplayOnRow($row)
    {
        return  true;
    }
}
