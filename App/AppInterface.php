<?php

namespace App;

interface AppInterface
{

    /**
     * Get app model
     * 
     * @return  object
     */
    public function getAppModel($model);

    /**
     * Get application data
     * 
     * @param application id
     * 
     * @return array data
     */
    public function getData($appId);
    


}
