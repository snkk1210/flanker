<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flanker</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <div>
            <h1 class="title"><a href="/" rel="home">Flanker</a></h1>
        </div>

        <?php
        require('../lib/JMeter.php');

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['scenario'])) {
            $scenario = "../upload/" . $_GET['scenario'];

            $instance = new JMeter($scenario, true);
            $s_object = $instance->getScenarioObject();
            $thread_groups = $s_object[0]->hashTree->hashTree->ThreadGroup;

            echo "<div class='scenariolist'>";
            
            $i = 0;
            foreach ($thread_groups as $key => $thread_group) {
                echo "<form action='' method='post' name=''>";
                echo "<strong>" . $thread_group->attributes()->testname . "</strong>";
                echo "<table border='1'>";
                echo "<tr><td>Name</td><td>" . $thread_group->attributes()->testname . "</td></tr>";
    
                echo "<tr><td>Enable</td><td>";
                if ($thread_group->attributes()->enabled == "true") {
                    echo "<input type='radio' name='enable' value='true' checked> true";
                    echo "<input type='radio' name='enable' value='false'> false";
                } else {
                    echo "<input type='radio' name='enable' value='true'> true";
                    echo "<input type='radio' name='enable' value='false' checked> false";
                }
                echo "</td></tr>";
    
                echo "<tr><td>Action to be taken after a Sampler error</td><td>" . $thread_group->stringProp[0] . "</td></tr>";
                echo "<tr><td>Number of Threads (users)</td><td>" . '<input type="text" name="number_of_threads" value=' . $thread_group->stringProp[1] . '>' . "</td></tr>";
                echo "<tr><td>Ramp-up period (seconds)</td><td>" . '<input type="text" name="rampup_period" value=' . $thread_group->stringProp[2] . '>' . "</td></tr>";
    
                echo "<tr><td>Loop Count</td><td>";
                if (isset($thread_group->elementProp->intProp)) {
                    echo "Infinite";
                    echo "<input type='hidden' name='loop_count' value=''>";
                } else {
                    echo '<input type="text" name="loop_count" value=' . $thread_group->elementProp->stringProp . '>';
                }
                echo "</td></tr>";
    
                echo "<tr><td>Same user on each iteration</td><td>";
                if ($thread_group->boolProp[1] == "true") {
                    echo "<input type='radio' name='each_iteration' value='true' checked> true";
                    echo "<input type='radio' name='each_iteration' value='false'> false";
                } else {
                    echo "<input type='radio' name='each_iteration' value='true'> true";
                    echo "<input type='radio' name='each_iteration' value='false' checked> false";
                }
                echo "</td></tr>";
    
                echo "<tr><td>Delay Thread creation until needed</td><td>";
                if ($thread_group->boolProp[2] == "true") {
                    echo "<input type='radio' name='until_needed' value='true' checked> true";
                    echo "<input type='radio' name='until_needed' value='false'> false";
                } else {
                    echo "<input type='radio' name='until_needed' value='true'> true";
                    echo "<input type='radio' name='until_needed' value='false' checked> false";
                }
                echo "</td></tr>";
    
                echo "<tr><td>Delay Thread creation until needed</td><td>";
                if ($thread_group->boolProp[0] == "true") {
                    echo "<input type='radio' name='thread_lifetime' value='true' checked> true";
                    echo "<input type='radio' name='thread_lifetime' value='false'> false";
                } else {
                    echo "<input type='radio' name='thread_lifetime' value='true'> true";
                    echo "<input type='radio' name='thread_lifetime' value='false' checked> false";
                }
                echo "</td></tr>";
    
                echo "<tr><td>Duration (seconds)</td><td>" . '<input type="text" name="duration" value=' . $thread_group->stringProp[3] . '>' . "</td></tr>";
                echo "<tr><td>Startup delay (seconds)</td><td>" . '<input type="text" name="startup_delay" value=' . $thread_group->stringProp[4] . '>' . "</td></tr>";
                echo "</table>";
                echo "<input type='hidden' name='scenario' value=" . $_GET['scenario'] . ">";
                echo "<input type='hidden' name='key' value=" . $i . ">";
                echo "<input type='submit' value='update' id='adjust' class='button' />";
                echo "<br>";
                echo "<br>";
                echo "</form>";
                $i++;
            }
    
            echo "</div>";
        }
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['scenario'])) {
            $scenario = "../upload/" . $_POST['scenario'];

            $instance = new JMeter($scenario, true);
            $opt = $instance->setScenarioObject($_POST['key'], $_POST['enable'], $_POST['number_of_threads'], $_POST['rampup_period'], $_POST['loop_count'], $_POST['each_iteration'], $_POST['until_needed'], $_POST['thread_lifetime'], $_POST['duration'], $_POST['startup_delay']);

            if ($opt) {
                header('Location: /adjust.php?scenario=' . $_POST['scenario']);
            }
        }
        ?>

    </body>
</html>