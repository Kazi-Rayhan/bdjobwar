<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class DeclineOrderAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Decline';
    }

    public function getIcon()
    {
        return 'voyager-x';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-danger  ',
        ];
    }

    public function shouldActionDisplayOnDataType(){
        return $this->dataType->slug == 'orders' ;
    }

    public function getDefaultRoute()
    {
        return route('order.decline',$this->data);
    }

    public function shouldActionDisplayOnRow($row)
    {
        return $this->data->status == 2  ? true : false;
    }
}