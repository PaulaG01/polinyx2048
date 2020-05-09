<?php
session_start();
if(isset($_POST['direction'])){
    Step($_POST['direction']);
}
if(isset($_POST['start'])){
    $_SESSION['map'] = generateMap();

    for($i=0; $i<4; $i++):
        for($j=0; $j<4; $j++):
            echo "<div class='map-item'>".$_SESSION['map'][$i][$j]."</div> ";
        endfor;
    endfor;

}

function Step($direction){
    if(isNotFull()){
        $map = $_SESSION['map'];
        $map = map_controller($direction, $map);
        $map = spawnNums($map);
        $_SESSION['map'] = $map;

        for($i=0; $i<4; $i++):
            for($j=0; $j<4; $j++):
                echo "<div class='map-item'>".$_SESSION['map'][$i][$j]."</div> ";
            endfor;
        endfor;
    }
    else echo 'over';
}
function map_controller($direction, $map){
    switch ($direction){
        case('right'):
            $new_map = $map;
            $result_map = [];
            for ($i=0; $i<4; $i++)
            {
                $row = $new_map[$i]; //строка
                $row = delNulls($row);
                $row = addValues($row);
                $row = delNulls($row);
                array_push($result_map, $row); //закинуть строку в массив
            }
            return $result_map;
            break;
        case('down'):
            $new_map = $map;;
            $result_map = [[],[],[],[]];
            for ($i=0; $i<4; $i++)
            {
                $row = [];
                for ($j=0; $j<4; $j++){
                    array_push($row, $new_map[$j][$i]);
                }

                $row = delNulls($row);
                $row = addValues($row);
                $row = delNulls($row);

                for ($j=0; $j<4; $j++) {
                    array_push($result_map[$j], $row[$j]);
                }
            }
            return $result_map;
            break;
        case('left'):
            $new_map = $map;
            $result_map = [];
            for ($i=0; $i<4; $i++) //тут зарибиваю двумерный массив на линейные
            {
                $row = $new_map[$i]; //строка тут получается из него, ну типо колонка\строчка
                $row = delNulls2($row); //тут убираю нули, ну смещение
                $row = addValues2($row); //тут сложение
                $row = delNulls2($row); //тут опять нули образовавшиеся

                array_push($result_map, $row); //закинуть строку в массив

            }
            return $result_map;
            break;
        case('up'):
            $new_map = $map;
            $result_map = [[],[],[],[]];
            for ($i=0; $i<4; $i++)
            {
                $row = [];
                for ($j=0; $j<4; $j++){
                    array_push($row, $new_map[$j][$i]);
                }

                $row = delNulls2($row);
                $row = addValues2($row);
                $row = delNulls2($row);

                for ($j=0; $j<4; $j++) {
                    array_push($result_map[$j], $row[$j]);
                }
            }
            return $result_map;
            break;
    }
    
}
function addValues($row){
    for($j=3; $j>0; $j--){ //сложить

        if ($row[$j] == $row[$j-1]) {
            $row[$j] *= 2;
            $row[$j-1] = 0;
        }
    }
    return $row;
} //работае только для ВВЕРХ и ВПРАВО
function addValues2($row){
    for($j=0; $j<3; $j++){ //сложить

        if ($row[$j] == $row[$j+1]) {
            $row[$j] *= 2;
            $row[$j+1] = 0;
        }
    }
    return $row;
} //работает только для ВНИЗ и ВЛЕВО
function delNulls($row){
    for($j=3; $j>0; $j--){ //сдвинуть вправо
        if ($row[$j] == 0) {
            list($row[$j], $row[$j-1]) = array($row[$j-1], $row[$j]);
        }
    }
    return $row;
}//работае только для ВВЕРХ и ВПРАВО
function delNulls2($row){
    for($j=0; $j<3; $j++){ //сдвинуть вправо
        if ($row[$j] == 0) {
            list($row[$j+1], $row[$j]) = array($row[$j], $row[$j+1]);
        }
    }
    return $row;
}//работает только для ВНИЗ и ВЛЕВО
function spawnNums($map){
    if(isNotFull()){
        $vsp = 0;
        while ($vsp != 1){
            $i = rand(0,3);
            $j = rand(0,3);
            if($map[$i][$j] == 0){
                $map[$i][$j] = 2;
                $vsp++;
            }
        }
        return $map;
    } 
}
function isNotFull(){
    $col = 0;
    for($i=0; $i<4; $i++){
        for($j=0; $j<4; $j++){
            if($_SESSION['map'][$i][$j] != 0){
                $col++;
            }
        }
    }
    if($col == 16) return false; //game over
    else return true;
}
function generateMap(){
    $map = [
        [0,0,0,0],
        [0,0,0,0],
        [0,0,0,0],
        [0,0,0,0]
    ];
    $vsp = 0;
    while($vsp != 2){
        for($n=1; $n<3; $n++){
            $i = rand(0,3);
            $j = rand(0,3);
            if($map[$i][$j] == 0){
                $map[$i][$j] = 2;
                $vsp++;
            }
        }   
    }
    return $map;
} 