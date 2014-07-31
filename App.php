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

    public function getAppModel()
    {
        // get App model using current $this->_config
        $appModel = new $this->_config['model'];

        $cache = null;
//        $cache = $this->getCache();

        if (!$appModel instanceof \App\AppInterface) {
            throw new \Exception('You model must implement \App\AppInterface');
        }

        return new Model\AppModel($appModel, $cache, $this->_config);
    }

    public function getData($appId)
    {
        return $this->getAppModel()->getAppById($appId);
    }

}
