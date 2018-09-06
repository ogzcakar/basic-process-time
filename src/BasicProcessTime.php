<?php
/**
 * Basic Process Time
 *
 * Oğuzhan ÇAKAR <ogzcakar@gmail.com>
 */

namespace BasicProcessTime;

class BasicProcessTime
{
    private static $times = [];

    private $key;

    private $file;

    /**
     * @param $key
     * @param null $file
     */
    public function __construct($key, $file = null)
    {
        $this->key  = $key;
        $this->file = $file;
    }

    /**
     * @return int | boolean
     */
    public function time()
    {
        if ( $this->check() ){
            return $this->getTime();
        }

        $this->setTime();

        return true;
    }

    private function setTime()
    {
        self::$times[$this->key] = microtime(true);
    }

    /**
     * @return int
     */
    private function getTime()
    {
        $diff = $this->diff();
        $this->fileCheck($diff);
        $this->unsetKey();

        return $diff;
    }

    /**
     * @return string
     */
    private function diff()
    {
        $diff = microtime(true) - self::$times[$this->key];
        $diff = round($diff, 2);

        return sprintf('%s => %s Seconds', $this->key, $diff);
    }

    /**
     * @return boolean
     */
    private function check()
    {
        if (isset( self::$times[$this->key] )){
            return true;
        }

        return false;
    }

    private function unsetKey()
    {
        unset( self::$times[$this->key] );
    }

    /**
     * @param $diff
     */
    private function fileCheck($diff)
    {
        if (!$this->file){
            return;
        }

        $file = fopen($this->rootPath(). $this->file, 'a');
        fwrite($file, $diff);
        fwrite($file,"\r\n");
        fclose($file);
    }

    /**
     * @return string
     */
    private function rootPath()
    {
        return dirname('');
    }
}