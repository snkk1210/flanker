<?php

class Logger
{
    /**
     * NOTE: Output error log
     * @param string $message
     */
    public static function error($message)
    {
        error_log("[Error]: " . $message);
        return 0;
    }

    /**
     * NOTE: Output warn log
     * @param string $message
     */
    public static function warn($message)
    {
        error_log("[Warn]: " . $message);
        return 0;
    } 

    /**
     * NOTE: Output info log
     * @param string $message
     */
    public static function info($message)
    {
        error_log("[Info]: " . $message);
        return 0;
    }

    /**
     * NOTE: Output debug log
     * @param string $message
     */
    public static function debug($message)
    {
        error_log("[Debug]: " . $message);
        return 0;
    }
}

?>