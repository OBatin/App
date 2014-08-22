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
        $cache = NULL;
        // check instance
        if (!$appModel instanceof \App\AppInterface) {
            throw new \Exception('You model must implement \App\AppInterface');
        }

        return new Model\AppModel($appModel, $cache, $this->_config);
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
            $app = $this->getAppModel($this->_config['storageModels']['application'])->getAppById($appId);
        }

        return $app;
    }

    
    /**
     * Save application data to storage tables
     * 
     * @param array application data
     * 
     * @return bulean Success
     */
    public function saveApp($data)
    {
        $app = FALSE;

        // set and save application data
        if (!empty($data)) {
            foreach ($this->_config['storageModels'] as $model) {
                 $app = $this->getAppModel($model)->saveData($data);
            }
        }

        return $app;
    }
}
