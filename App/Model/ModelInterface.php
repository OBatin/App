<?php

namespace App\Model;

interface ModelInterface
{

    public function getAppsByIds(array $ids);

    public function getAppById($id);
    
    public function saveData($appData);
}
