<?php

namespace App;

class App implements AppInterface
{

    protected $_config;

    function __construct($config)
    {
        if (!isset($config)) {
            throw new \Exception('Config not set.');
        }
        $this->_config = $config;
    }

    public function getAppModel($model)
    {
        $appModel = new $model;
        $cache = null;
//        $cache = $this->getCache();

        if (!$appModel instanceof \App\AppInterface) {
            throw new \Exception('You model must implement \App\AppInterface');
        }
        return $appModel;
    }

    public function getData($appId)
    {
        $app = $this->getAppModel($this->_config['epfModel'])->getAppById($appId);
        if(empty($app)){
            $app = $this->getAppModel($this->_config['storageModel'])->getAppById($appId);
        };
        return $app;
    }

}
