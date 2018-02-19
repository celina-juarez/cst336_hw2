<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title id = "title"> Cowboy Game </title>
        <link href = "css/styles.css" rel = "stylesheet" type="text/css"/>
        
    </head>
    <body id = "first">
        <?php
            
            echo "<h1>Western Game </h1>";
            $player1 = array();
            $player2 = array();
            
            array_push($player1,"Player1");
            array_push($player2,"Player2");
            
            play($player1, $player2);
            
            
            echo "<h5>";
                
                $counter = -1;
                while($counter<= count($player1))
                {
                    echo array_shift($player1)."<br>";
                    $counter++;
                }
            echo "</h5>";
            echo "<h6>";
                
                $counter = -1;
                while($counter<= count($player2))
                {
                    echo array_shift($player2)."<br>";
                    $counter++;
                }
            echo "</h6>";
            function play(&$player1 = array(), &$player2 = array())
            {
                for($i = 1; $i < 3; $i++)
                {
                    ${"randomValue" . $i} = rand(0,2);
                    displaySymbol(${"randomValue". $i},$i, $player1, $player2);
                        
                }
                displayPoints($randomValue1, $randomValue2,$player1, $player2);
            }
            
            function displaySymbol($randomValue, $i,&$player1 = array(), &$player2=array())
            {
                switch ($randomValue) 
                {
                    case 0:
                         $symbol = "shoot";
                         array_push(${"player".$i},"shoot");
                         break;
                    case 1:
                        $symbol = "reload";
                        array_push(${"player".$i},"reload");
                        break;
                    case 2:
                        $symbol = "block";
                        array_push(${"player".$i},"block");
                        break;
                }
                echo "<img id = 'reel' src = 'img/$symbol.png' alt= '$symbol' title = '". ucfirst($symbol). "' width = '70' >";
            }
            function displayPoints($randomValue1, $randomValue2,&$player1 = array(), &$player2=array())
            {
                //echo "<div id = 'output'>";
                
                if($randomValue1 == $randomValue2)
                {
                    switch ($randomValue1) {
                        case 0:
                            array_push($player1,"Loser");
                            array_push($player2,"Loser");
                            echo "<h2> Both players got shot! You both lose! </h2>";
                            break;
                        case 1:
                            array_push($player1,"Tie");
                            array_push($player2,"Tie");
                            echo "<h3> Both players reloaded! Nothing happens! </h3>";
                            break;
                        case 2:
                            array_push($player1,"Tie");
                            array_push($player2,"Tie");
                            echo "<h4> Both players blocked! Nothing happens! </h4>";
                            break;
                    }
                }
                else if($randomValue1 == 0)
                {
                    switch ($randomValue2) 
                    {
                        case 1:
                            echo "<h2> Player 2 reloaded! Player 1 wins!</h2>";
                            array_push($player1,"Winner");
                            array_push($player2,"Loser");
                            
                            break;
                        case 2:
                            array_push($player1,"Tie");
                            array_push($player2,"Tie");
                            echo "<h3> Player 2 blocked the shot! Nothing happens! </h3>";
                            break;
                    }
                }
                else if($randomValue1 == 1)
                {
                    switch ($randomValue2) 
                    {
                        case 0:
                            echo "<h2> Player 1 reloaded! Player 2 wins!</h2>";
                            array_push($player1,"Loser");
                            array_push($player2,"Winner");
                            break;
                        case 2:
                            array_push($player1,"Tie");
                            array_push($player2,"Tie");
                            echo "<h3> Player 1 reloaded and Player 2 blocked the shot! Nothing happens! </h3>";
                            break;
                    }
                }
                else if($randomValue1 == 2)
                {
                    switch ($randomValue2) 
                    {
                        case 0:
                            array_push($player1,"Tie");
                            array_push($player2,"Tie");
                            echo "<h2> Player 1 blocked the shot! Nothing happens!</h2>";
                            break;
                        case 1:
                            array_push($player1,"Tie");
                            array_push($player2,"Tie");
                            echo "<h3> Player 1 blocked the shot and Player 1 reloaded! Nothing happens! </h3>";
                            break;
                    }
                }
                
                echo "</div>";
            }
            
            
        ?>
        <form id = "button">
                <input type = "submit" value = "Play Again?"/>
        </form>
    </body>
</html>