<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html" ; charset="UTF-8">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>

<body>
    <header>
        <h1><a href="index.html">Takoyaki Maker</a></h1>
        <p><a href="index.html">たこ焼き計算ツール</a></p>
    </header>

    <main>
        <?php

$chosen = $_POST["chosen"];
$num = $_POST["num"];

$menu = array(
    0 => "かりとろ",
    1 => "シンプル",
    2 => "ふわふわ");

$ingredient = array("生地", "具", "トッピング");

        
$recept[0][0] = array(
        array("たこ焼き粉", 70), 
        array("卵", 1),
        array("水", 110),
        array("青のり", "適量"),
        array("エビ粉", "適量"),
        array("和風だし", "適量"));
$recept[0][1] = array(
        array("たこ", 30),
        array("天かす", "適量"),
        array("長ネギ", "適量"),
        array("紅しょうが", "適量"));
$recept[0][2] = array(
        array("青のり", "適量"),
        array("かつおぶし", "適量"),
        array("ソース", "適量"),
        array("マヨネーズ", "適量"));
    
$recept[1][0] = array(
        array("たこ焼き粉", 50),
        array("卵", 1),
        array("水", 150),
        array("青のり", "適量"));
$recept[1][1] = array(
        array("たこ", 20),
        array("天かす", "適量"));
$recept[1][2] = array(
        array("青のり", "適量"),
        array("かつおぶし", "適量"),
        array("ソース", "適量"),
        array("マヨネーズ", "適量"));
    
$recept[2][0] = array(
        array("たこ焼き粉", 40),
        array("卵", 1),
        array("出し汁", 170),
        array("青のり", "適量"));
$recept[2][1] = array(
        array("たこ", 16),
        array("天かす", "適量"),
        array("長ネギ", "適量"),
        array("紅しょうが", "適量"));
$recept[2][2] = array(
        array("青のり", "適量"),
        array("かつおぶし", "適量"),
        array("ソース", "適量"),
        array("マヨネーズ", "適量"));
    
$no = ($num*10)."個";
echo"
    <div class=\"recept\">
    <div class=\"recept-title\">
    <h2>材料</h2>
    <p>$menu[$chosen]　$no</p></div>";
    
    for($i=0; $i<count($ingredient); $i++){
        echo "<div class=\"recept-content\">
            <h2>".$ingredient[$i]."</h2>
            <table class=\"recept-table\">";
            foreach($recept[$chosen][$i] as $element){
                if(gettype($element[1]) == "integer"){
                    if($element[1] == 1){
                        switch($chosen){
                            case 0: $element[1] = 1 + ($element[1] * floor(($num-1) / 7));
                                    $element[1] = $element[1]."個";
                                    break;
                            case 1: $element[1] = 1 + ($element[1] * floor(($num-1) / 2));
                                    $element[1] = $element[1]."個";
                                    break;
                            case 2: $element[1] = ($element[1] * ($num));
                                    $element[1] = $element[1]."個";
                                    break;
                        }
                    }
                    else {$element[1] *= $num;
                    $element[1] = $element[1]."g";}
                }
                echo 
                    "<tr class=\"recept-element\">
                    <td class=\"recept-element-name\">
                    $element[0]
                    </td>
                    <td class=\"recept-element-amount\">
                    $element[1]
                    </td>
                    </tr>";
        }
        echo "</table></div>";
    }
 echo"</div>";
?>

        <form action="output.php" method="post" class="user-select">
            <div class="sort">
                <label class="test-sort" for="toggle1">
                    <input type="radio" name="chosen" value="0" id="toggle1">
                    <div class="shop1">
                        <img src="img/gindako.png" width="200" height="200">
                        <p class="feel">かりとろ</p>
                    </div>
                </label>

                <label class="test-sort" for="toggle2">
                    <input type="radio" name="chosen" value="1" id="toggle2">
                    <div class="shop2">
                        <img src="img/okotako.png" width="200" height="200">
                        <p class="feel">シンプル</p>
                    </div>
                </label>

                <label class="test-sort" for="toggle3">
                    <input type="radio" name="chosen" value="2" id="toggle3">
                    <div class="shop3">
                        <img src="img/minatoya.png" width="200" height="200">
                        <p class="feel">ふわふわ</p>
                    </div>
                </label>
            </div>


            <div class="number">
                <img src="img/takoyaki.jpg" width="150" height="150">
                <div class="cp_ipselect">
                    <select name="num" class="cp_sl06" required>
                        <option value="" hidden disabled selected></option>
                        <option value="1">10個</option>
                        <option value="2">20個</option>
                        <option value="3">30個</option>
                        <option value="4">40個</option>
                        <option value="5">50個</option>
                        <option value="6">60個</option>
                    </select>
                    <span class="cp_sl06_highlight"></span>
                    <span class="cp_sl06_selectbar"></span>
                    <label class="cp_sl06_selectlabel">個数</label>
                </div>
            </div>

            <div class="make">
                <input type="submit" name="submit" id="toggle4" value="つくる">
                <label class="square_btn" for="toggle4">つくる</label>
            </div>

        </form>


    </main>

    <footer>

    </footer>

</body>

</html>
