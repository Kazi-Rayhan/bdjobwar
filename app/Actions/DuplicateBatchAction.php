<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class DuplicateBatchAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Duplicate';
    }

    public function getIcon()
    {
        return 'voyager-copy';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-info   ',
        ];
    }

    public function shouldActionDisplayOnDataType(){
        return $this->dataType->slug == 'batches' ;
    }

    public function getDefaultRoute()
    {
        return route('batches.duplicate',$this->data);
    }

    public function shouldActionDisplayOnRow($row)
    {
        return true ;
    }
}