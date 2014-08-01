<?php

namespace App\Model\Core;

trait Yii
{

    public function getAppById($id)
    {
        return $this->findByPk($id);
    }

}
