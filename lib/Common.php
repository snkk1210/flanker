<?php

class Common
{
    /**
     * NOTE: Function to ZIP ($zip) the directory ($dir)
     * @param string $dir
     * @param string $zip
     */
    public static function archiveDir(string $dir, string $zip)
    {
        // NOTE: check directory traversal
        $flag = preg_match('/(\.\.\/)/', $dir) ? 1 : 0;
        if ($flag) { 
            error_log("Error: Directory Traversal measures");
            exit;
        }

        $cmd = "cd $dir && zip -r $zip ./*";
        exec($cmd, $opt);
        return $opt;
    }
}

?>