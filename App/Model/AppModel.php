<?php

namespace App\Model;

class AppModel implements ModelInterface
{

    protected $_model;
    protected $_cache;

    public function __construct($model, $cache = null, $config)
    {

        if (!isset($model)) {
            throw new \Exception('Model not set.');
        }
        // Set model
        $this->_model = $model;

        if (!isset($config)) {
            throw new \Exception('Config not set.');
        }
        // Set config
        $this->_config = $config;
    }

    /**
     * Get application by ids(array)
     * 
     * @param array $ids
     * 
     * @return array Apps
     */
    public function getAppsByIds(array $ids)
    {
        $apps = array();
        if ($this->_cache) {
            foreach ($ids as $id) {
                $key = $this->_cache->getKey($id);
                if ($this->_cache->exists($key)) {
                    $data = $this->_cache->get($key);
                } else {
                    $data = $this->getAppById($id);
                    $this->_cache->set($key, $data);
                }
                $apps[] = $data;
            }
            return $data;
        }

        foreach ($ids as $id) {
            $data = $this->getAppById($id);
            $apps[] = $data;
        }
        return $apps;
    }

    /**
     * Get unique application by Aplle id
     * 
     * @param int $id Application id
     * 
     * @return EPF/STORAGE model object with data
     */
    public function getAppById($id)
    {
        // Get application data
        $app = $this->_model->getAppById($id);
        return $app;
    }

    /**
     * Save Application data to tables
     * 
     * @param array $appData
     * @return bolean true
     */
    public function saveData($appData)
    {
        $app = $this->_model->saveData($appData);
        return $app;
    }
   
    private function _saveAppImage($appData)
    {
        // check if different image available
        // upload image to folder
        // saved returned path
        // return bolean
    }

    private function _checkAppImage($param)
    {
        // get size of current uploaded image
        // compare to available image
        // upload new image if need
        // return bolean
    }

    private function _uploadAppImage($param)
    {
        // check/create app folder
        // upload app image to APP STORAGE folder
        // return new name
    }

}
