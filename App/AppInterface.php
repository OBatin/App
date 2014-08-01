<?php

namespace App;

interface AppInterface
{

    /**
     * Init new model
     * 
     * @param str model name
     * 
     * @return model object
     */
    public function getAppModel($model);

    /**
     * Get application data
     * 
     * @param int application id
     * 
     * @return application data
     */
    public function getData($appId);
}
