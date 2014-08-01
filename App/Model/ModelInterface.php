<?php

namespace App\Model;

interface ModelInterface
{

    /**
     * Get application by ids(array)
     * 
     * @param array $ids
     * 
     * @return array Apps
     */
    public function getAppsByIds(array $ids);

    /**
     * Get unique application by Aplle id
     * 
     * @param int $id Application id
     * 
     * @return activeRecord object with data
     */
    public function getAppById($id);

    /**
     *  Save application info to STORAGE
     * 
     * @param array $appData Application data
     * 
     * @return bolean Success
     */
    public function saveData($appData);
}
