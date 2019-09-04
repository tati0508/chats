<?php
  
  $cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
  $countMiss = 0;
  $countNull = 0;
  $countRight = 0;
  $ary = array();

  for($i=0;$i<10;$i++){
    $first = $cards[$i];
    for($j=0;$j<10;$j++){
      $second = $cards[$j];
      for($k=0;$k<10;$k++){
        $third = $cards[$k];
        for($m=0;$m<10;$m++){
          $fourth = $cards[$m];
          if($first == $second || $first == $third || $first == $fourth ||
              $second == $third || $second == $fourth ||
              $third == $fourth){
                $countNull ++;
                echo "null<br/>";
                echo "(" . $first . "+" . $second . ") * (" . $third . "+" . $fourth . ")<br/>"; 
                continue;
              }
          $sum = ($first + $second) * ($third + $fourth);
          if($sum == 100){
            $countRight ++;
            echo "hit<br/>";
            echo "(" . $first . "+" . $second . ") * (" . $third . "+" . $fourth . ")<br/>"; 
          } else {
            $countMiss ++;
            echo "miss<br/>";
            echo "(" . $first . "+" . $second . ") * (" . $third . "+" . $fourth . ")<br/>"; 
          }
        }
      }
    }
  }

  echo "不可能な組み合わせ回数　： " . $countNull . "<br/>";
  echo "不正解な組み合わせ回数　： " . $countMiss . "<br/>";
  echo "正解の組み合わせ回数　： " . $countRight . "<br/>"; 