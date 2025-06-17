<?php
#課題１
#ランダム値
$number = rand(1,10);

#数値を２で割ってあまり０の場合偶数
if ($number % 2 ==0) {
    echo "偶数\n";
#それ以外は奇数
} else {
    echo "奇数\n";
}

#ランダム値の表示
echo "$number \n";


#課題２
#0 ~ 100点満点のテストの点数をランダムで生成、表示
$score = rand(0,100);
echo $score . "点\n";

#点数に応じた成績の表示
if ($score == 100) {
    echo "満点\n";
} elseif ($score >= 80 ) {  #80~99
    echo "優\n";
} elseif ($score >= 70) {   #70~79
    echo "良\n";
} elseif ($score >= 50 ) {  #50~69
    echo "可\n";
} else {                    #49以下
    echo "不可\n";
}


#課題３
#0 ~ 100点満点の２教科のテストの点数をランダムで生成、表示
$score1 = rand(0,100);
$score2 = rand(0,100);
echo "{$score1}点 {$score2}点\n";

#合計点
$total = $score1 + $score2;
echo "合計 {$total}点\n";

#合格判定
if ($score1 >= 60 && $score2 >= 60) {       #両方とも60点以上
    echo "合格\n";
} elseif ($total >= 130) {      #合計が130点以上
    echo "合格\n";
} elseif ($total >= 100 && ($score1 >= 90 || $score2 >= 90)) {      #合計が100点以上かつ　どちらかのテストが90点以上
    echo "合格\n";
} else {        #それ以外
    echo "不合格\n";
}
 
?>
