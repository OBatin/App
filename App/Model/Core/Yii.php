<?php

namespace App\Model\Core;

trait Yii
{

    public function getAppById($id)
    {

        $data = $this->_modelEpf->findByPk($id);
        if (empty($data)) {
            $data = $this->_modelStorage->findByPk($id);
        }
        return $data;
    }

}
