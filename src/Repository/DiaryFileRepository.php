<?php

namespace Repository;

class DiaryFileRepository
{

    protected $filePath;

    protected $idFilePath;

    /**
     * DiaryFileRepository constructor.
     * @param $filePath
     * @param $idFilePath
     */
    public function __construct($filePath, $idFilePath)
    {
        $this->filePath = $filePath;
        $this->idFilePath = $idFilePath;
    }
    
    private function getNextId()
    {
        if(!file_exists($this->idFilePath)) {
            file_put_contents($this->idFilePath, 0);
        }

        $currentId = file_get_contents($this->idFilePath);

        $nextId = $currentId + 1;
        file_put_contents($this->idFilePath, $nextId);

        return $nextId;
    }

}