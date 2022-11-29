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
    public function run(string $today, string $optime, string $logdir)
    { 
        $cmd = "/usr/local/jmeter/bin/jmeter -Dsun.net.inetaddr.ttl=0 -n -t $this->scenario -j ${logdir}/${optime}.log -l ${logdir}/${optime}.jtl -e -o ${logdir}/${optime}/ -r";
        exec($cmd, $opt);
        return $opt;
    }

    public function delete()
    { 
        if(!unlink($this->scenario)){
            error_log("Scenario delete has failed ");
        }
        return $opt;
    }

    /**
     * NOTE: upload 配下のシナリオを取得
     */
    public static function getScenarioFileList()
    {
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

    /**
     * NOTE: 画面のリロードを禁止する
     */
    public static function prohibitReload()
    {
        session_start();
        if($_SESSION['loadflag'] == "true"){
            header('Location: /');
            session_destroy();
            exit;
          }else{
            $_SESSION['loadflag'] = "true";
          }
        return 0;
    }

    /**
     * 
     */
    public static function getRemoteHost()
    {
        $properties_file = "../../../../../usr/local/jmeter/bin/jmeter.properties";
        $cmd = "grep ^remote_hosts= $properties_file";
        exec($cmd, $opt);
        $remote_hosts_csv = str_replace('remote_hosts=', '', $opt);
        $remote_hosts = explode(",", $remote_hosts_csv[0]);

        return $remote_hosts;
    }

    /**
     * 
     */
    public static function getRemoteHostRaw()
    {
        $properties_file = "../../../../../usr/local/jmeter/bin/jmeter.properties";
        $cmd = "grep ^remote_hosts= $properties_file";
        exec($cmd, $opt);
        $remote_hosts_csv = str_replace('remote_hosts=', '', $opt);

        return $remote_hosts_csv[0];
    }

    /**
     * 
     */
    public static function setRemoteHostRaw(string $remote_hosts_csv)
    {
        $properties_file = "../../../../../usr/local/jmeter/bin/jmeter.properties";
        $cmd = "sed -i -e 's/^remote_hosts\(.*\)/remote_hosts=$remote_hosts_csv/g' $properties_file";
        exec($cmd, $opt, $result_code);

        return $result_code;
    }


    /**
     * 
     */
    public function getScenarioObject()
    { 
        $s_object = simplexml_load_file("$this->scenario");
        return $s_object;
    }

    /**
     * 
     */
    public function setScenarioObject(int $key, string $number_of_threads, string $rampup_period)
    { 
        $s_object = simplexml_load_file("$this->scenario");

        $s_object[0]->hashTree->hashTree->ThreadGroup[$key]->stringProp[1] = "$number_of_threads";
        $s_object[0]->hashTree->hashTree->ThreadGroup[$key]->stringProp[2] = "$rampup_period";

        $opt = $s_object->asXML("$this->scenario");

        if(!$opt){ error_log("Scenario update has failed "); }

        return $opt;
    }

}

?>