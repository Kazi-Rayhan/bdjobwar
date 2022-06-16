<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class AcceptOrderAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Accept';
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

    public function shouldActionDisplayOnDataType(){
        return $this->dataType->slug == 'orders' ;
    }

    public function getDefaultRoute()
    {
        return route('order.accept',$this->data);
    }

    public function shouldActionDisplayOnRow($row)
    {
        return $this->data->status == 2  ? true : false;
    }
}