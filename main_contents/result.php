<?php

require_once('function.php');
require_once('function_yaku.php');

/*受け取った条件データ・手牌データ*/
$tehais = $_POST['tehais'];
$joukens = $_POST['joukens'];

$jikaze = $joukens[1];

/*条件*/
$reach = reach();
$renchan = renchan(); /*最後に足す*/
$tumo_ron = tumo_ron();
$rinshan = rinshan();
$pinhu = pinhu($tehais);


/*ドラの数*/
$dora = $joukens[2];

/*タンヤオチェック*/
$tanyao = tanyao($tehais);

/*役満チェック*/
$kokusi = kokusi($tehais);
$su_anko = su_anko($tehais);
$daisangen = daisangen($tehais);
$daisu_si = daisu_si($tehais);
$shousu_si = shousu_si($tehais);
$chu_renputou = chu_renpoutou($tehais);
$ryu_i_sou = ryu_i_sou($tehais);
$tu_i_sou = tu_i_sou($tehais);
$tinrountou = tinrountou($tehais);
$su_kantu = su_kantu();


/*通常役チェック*/
$honroutou = honroutou($tehais);
$sanshoku_doukou = sanshoku_doukou($tehais);
$shousangen = shousangen($tehais);
$sananko = sananko($tehais);
$sanshoku_doujun = sanshoku_doujun($tehais);
$ikkitu_kan = ikkitu_kan($tehais);
$tinitu = tinitu($tehais);
$honitu = honitu($tehais);
$toitoi = toitoi($tehais);
$junchan = junchan($tehais);
$chanta = chanta($tehais);
$ryan_pe_kou = ryan_pe_kou($tehais);
$i_pe_kou = i_pe_kou($tehais);
$sankantu = sankantu();

/*七対子チェック*/
$ti_toitu = ti_toi($tehais);

/*役牌*/
$ton = ton($tehais);
$nan = nan($tehais);
$sha = sha($tehais);
$pei = pei($tehais);
$haku = haku($tehais);
$hatu = hatu($tehais);
$chun = chun($tehais);

$yaku_check = [
  $ton,
  $nan,
  $sha,
  $pei,
  $haku,
  $hatu,
  $chun,
  $tanyao,
  $honroutou,
  $sanshoku_doukou,
  $shousangen,
  $sananko,
  $sanshoku_doujun,
  $ikkitu_kan,
  $toitoi,
  $sankantu,
  $tinitu,
  $honitu,
  $ryan_pe_kou,
  $i_pe_kou,
  $junchan,
  $chanta,
  $ti_toitu
];


$total_han = 0;
$yakuman_list = [];
$jouken_list = [];
$yaku_list = [];

$yakuman_check = [
  $kokusi,
  $su_anko,
  $daisangen,
  $daisu_si,
  $shousu_si,
  $chu_renputou,
  $ryu_i_sou,
  $tu_i_sou,
  $tinrountou,
  $su_kantu
];


yakuman_check();
yakuman_list();
jouken_check();
jouken_list();
yaku_check();
yaku_list();

$result_score = result_score($total_han);
$result_list = array_merge($yakuman_list, $jouken_list, $yaku_list);

$yaku_message = 0;

if ($total_han >= 13) {
  $yaku_message = "役満";
} elseif ($total_han >= 11) {
  $yaku_message = "三倍満";
} elseif ($total_han >= 8) {
  $yaku_message = "倍満";
} elseif ($total_han >= 6) {
  $yaku_message = "跳満";
} elseif ($total_han >= 4) {
  $yaku_message = "満貫";
} else {
  $yaku_message = null;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check JAN</title>
  <meta name="description" content="麻雀の点数計算を行うサイトです。">
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" type="image/png" href="../img/favicon.ico">
</head>

<body>

  <header>
    <div class="header-container">
      <div class="header-left">
        <div class="header-title">
          <h2>Check JAN</h2>
          <div class="header-logo">
            <img src="../img/main-rogo.png" alt="ロゴ">
          </div>
          <p>～麻雀点数計算サイト～</p>
        </div>
      </div>
      <div class="header-right">
        <ul class="header-nav">
          <li><a href="../index.html">トップ</a></li>
        </ul>
      </div>
    </div>
  </header>

  <div class="result-wrapper">
    <div class="result-container">
      <h1>点数はこちら</h1>
      <div class="point-container">
        <h5><?php echo "{$yaku_message}  {$result_score}点"; ?></h5>
      </div>
    </div>

    <div class="check-container point-tehai">
      <?php displayTehai($tehais); ?>
    </div>

    <h1>上がり役はこちら</h1>
    <div class="result-tehai-container">
      <?php foreach ($result_list as $list) : ?>
        <h5><?php echo $list; ?></h5>
      <?php endforeach; ?>
    </div>
  </div>

  <footer>
    <div class="footer-container">
      <div class="footer-title">
        <h2>Check JAN</h2>
        <div class="footer-logo">
          <img src="../img/main-rogo.png" alt="ロゴ">
        </div>
        <p>～麻雀点数計算サイト～</p>
      </div>
      <ul class="footer-nav">
        <li><a href="../index.html">トップ</a></li>
      </ul>
    </div>
  </footer>

</body>

</html>