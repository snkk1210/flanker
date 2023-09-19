<?php

class Logger
{
    /**
     * NOTE: 
     */
    public static function error($message)
    {
        error_log("Error: " . $message);
        return 0;
    }

    /**
     * NOTE: 
     */
    public static function warn($message)
    {
        error_log("Warn: " . $message);
        return 0;
    } 

    /**
     * NOTE: 
     */
    public static function info($message)
    {
        error_log("Info: " . $message);
        return 0;
    }

    /**
     * NOTE: 
     */
    public static function debug($message)
    {
        error_log("Debug: " . $message);
        return 0;
    }
}

?>