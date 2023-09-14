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

    /**
     * NOTE: Obtaining a directory listing
     * @param string $dir
     * @param int $depth
     * @param int $max_depth
     */
    public static function getDirectories($dir, $depth = 0, $max_depth = 1)
    {
        $items = scandir($dir);

        $directories = [];

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $path = $dir . '/' . $item;

            if (is_dir($path)) {
                $directories[] = $path;

                if ($depth < $max_depth) {
                    $sub_directories = Common::getDirectories($path, $depth + 1, $max_depth);
                    $directories = array_merge($directories, $sub_directories);
                }
            }
        }

        return $directories;
    }

    /**
     * NOTE: Display Alert
     * @param string $message
     */
    public static function displayAlert($message)
    {
        echo <<<EOM
        <script type="text/javascript">
            window.alert('$message'); 
        </script>
        EOM;
    }
}

?>