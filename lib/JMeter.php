<?php

class JMeter
{
    public $scenario;
    public $worker_flag;

    /**
     * NOTE: コンストラクタ
     * @param string $scenario
     * @param bool   $worker_flag
     */
    public function __construct(string $scenario, bool $worker_flag, string $optime) 
    {
        $this->scenario = $scenario;
        $this->worker_flag = $worker_flag;
        $this->optime = $optime;
    }

    /**
     *
     */
    public function run()
    {
        $today = date('Ymd');
        $logdir = "/var/www/html/$today";

        if (!is_dir($logdir)){mkdir("$logdir", 0700);};
        $cmd = "/usr/local/jmeter/bin/jmeter -Dsun.net.inetaddr.ttl=0 -n -t $this->scenario -j ${logdir}/$this->optime.log -l ${logdir}/$this->optime.jtl -e -o ${logdir}/$this->optime/ -r";
        exec($cmd, $opt);
        return $opt;
    }

    /**
     * NOTE: upload 配下のシナリオを取得
     */
    public static function getScenarioFileList(){
        $list = array();
        $curdir = getcwd();
        $uploaddir = $curdir . "/../upload";
        $dhandle = opendir($uploaddir);
        if ($dhandle){
            while (false !== ($fname = readdir($dhandle))){
                if ($fname != '.' && $fname != '..' && $fname != '.gitkeep' && $fname != '.gitignore'){
                    $list[] = $fname;
                }
            }
            closedir($dhandle);
        }
        return $list;
    }

}

?>