<?php

namespace App;

class App implements AppInterface
{

    protected $_config;

    function __construct($config)
    {
        // check for config
        if (!isset($config)) {
            throw new \Exception('Config not set.');
        }

        // set config
        $this->_config = $config;
    }

    /**
     * Init new model
     * 
     * @param str model name
     * 
     * @return model object
     */
    public function getAppModel($model)
    {
        //init new model
        $appModel = new $model;

        // check instance
        if (!$appModel instanceof \App\AppInterface) {
            throw new \Exception('You model must implement \App\AppInterface');
        }

        return $appModel;
    }

    /**
     * Get application data
     * 
     * @param int application id
     * 
     * @return application data
     */
    public function getData($appId)
    {
        // get application data by id from EPF model
        $app = $this->getAppModel($this->_config['epfModel'])->getAppById($appId);

        // check for need getting app from STORAGE
        if (empty($app)) {
            $app = $this->getAppModel($this->_config['storageModel'])->getAppById($appId);
        }

        return $app;
    }

}
