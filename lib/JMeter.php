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
    public function __construct(string $scenario, bool $worker_flag) 
    {
        $this->scenario = $scenario;
        $this->worker_flag = $worker_flag;
    }

    /**
     *
     */
    public function run()
    {
        $command = "/usr/local/jmeter/bin/jmeter -Dsun.net.inetaddr.ttl=0 -n -t $this->scenario -j ${logdir}/${optime}.log -l ${logdir}/${optime}.jtl -e -o ${logdir}/${optime}/ -r";
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