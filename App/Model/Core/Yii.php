<?php

namespace App\Model\Core;

trait Yii
{

    /**
     * Get application data from AR model
     * 
     * @param int $id Application id
     * 
     * @return object AR Application Data
     */
    public function getAppById($id)
    {
        return $this->findByPk($id);
    }

}
