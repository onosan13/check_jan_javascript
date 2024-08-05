<?php

require_once('./function.php');

/*条件変数*/
$bakaze = $_POST['bakaze'];
$jikaze = $_POST['jikaze'];
$dora = $_POST["dora"];
$renchan = $_POST["renchan"];
$reach = $_POST['reach'];
$naki = $_POST["naki"];
$tumo_ron = $_POST['tumo_ron'];
$kan = $_POST["kan"];
$rinshan = $_POST["rinshan"];
$pinhu = $_POST["pinhu"];


$joukens = [$bakaze, $jikaze, $dora, $renchan, $reach, $naki, $tumo_ron, $kan, $rinshan, $pinhu];

//選択牌まとめ
$selectHais = $_POST['selectHais'];
$selectArray = explode(',', $selectHais[0]);


/*手牌変数*/
$jihai = distributionJihai($selectArray);
$j_count_ton = $_POST['j-count-ton'];
$j_count_nan = $_POST['j-count-nan'];
$j_count_sha = $_POST['j-count-sha'];
$j_count_pei = $_POST['j-count-pei'];
$j_count_haku = $_POST['j-count-haku'];
$j_count_hatu = $_POST['j-count-hatu'];
$j_count_chun = $_POST['j-count-chun'];

$manzu = distributionManzu($selectArray);
$m_count_1 = $_POST['m-count-1'];
$m_count_2 = $_POST['m-count-2'];
$m_count_3 = $_POST['m-count-3'];
$m_count_4 = $_POST['m-count-4'];
$m_count_5 = $_POST['m-count-5'];
$m_count_6 = $_POST['m-count-6'];
$m_count_7 = $_POST['m-count-7'];
$m_count_8 = $_POST['m-count-8'];
$m_count_9 = $_POST['m-count-9'];

$pinzu = distributionPinzu($selectArray);
$p_count_1 = $_POST['p-count-1'];
$p_count_2 = $_POST['p-count-2'];
$p_count_3 = $_POST['p-count-3'];
$p_count_4 = $_POST['p-count-4'];
$p_count_5 = $_POST['p-count-5'];
$p_count_6 = $_POST['p-count-6'];
$p_count_7 = $_POST['p-count-7'];
$p_count_8 = $_POST['p-count-8'];
$p_count_9 = $_POST['p-count-9'];

$souzu = distributionSouzu($selectArray);
$s_count_1 = $_POST['s-count-1'];
$s_count_2 = $_POST['s-count-2'];
$s_count_3 = $_POST['s-count-3'];
$s_count_4 = $_POST['s-count-4'];
$s_count_5 = $_POST['s-count-5'];
$s_count_6 = $_POST['s-count-6'];
$s_count_7 = $_POST['s-count-7'];
$s_count_8 = $_POST['s-count-8'];
$s_count_9 = $_POST['s-count-9'];

/*受けっとた手牌*/

$manzu_tehai = receive_manzu($manzu);
$pinzu_tehai = receive_pinzu($pinzu);
$souzu_tehai = receive_souzu($souzu);
$jihai_tehai = receive_jihai($jihai);
$tehais = array_merge($manzu_tehai, $pinzu_tehai, $souzu_tehai, $jihai_tehai);

$tehais_count = count($tehais);

$check = 0;

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

  <div class="check-wrapper">
    <h1>条件を確認してください</h1>
    <div class="jouken-container">

      <div class="joukens">
        <h3>◎場風</h3>
        <?php if ($bakaze === "ton_b") : ?>
          <p>東</p>
        <?php else : ?>
          <p>南</p>
        <?php endif; ?>
      </div>

      <div class="joukens">
        <h3>◎自風</h3>
        <?php switch ($jikaze) {
          case "ton_j":
            echo "<p>東</p>";
            break;
          case "nan_j":
            echo "<p>南</p>";
            break;
          case "sha_j";
            echo "<p>西</p>";
            break;
          case "pei_j";
            echo "<p>北</p>";
            break;
          default:
        }
        ?>
      </div>

      <div class="joukens">
        <h3>◎リーチ</h3>
        <?php if ($reach === "reach") : ?>
          <p>リーチ有り</p>
        <?php else : ?>
          <p>リーチ無し</p>
        <?php endif; ?>
      </div>

      <div class="joukens">
        <h3>◎ドラの数</h3>
        <?php echo "<p>{$dora}</p>"; ?>
      </div>

      <div class="joukens">
        <h3>◎連荘数</h3>
        <?php echo "<p>{$renchan}</p>"; ?>
      </div>

      <div class="joukens">
        <h3>◎鳴き</h3>
        <?php if ($naki === "naki") : ?>
          <p>鳴き有り</p>
        <?php else : ?>
          <p>鳴き無し</p>
        <?php endif; ?>
      </div>

      <div class="joukens">
        <h3>◎場風</h3>
        <?php if ($tumo_ron === "tumo") : ?>
          <p>ツモ</p>
        <?php else : ?>
          <p>ロン</p>
        <?php endif; ?>
      </div>

      <div class="joukens">
        <h3>◎カン数</h3>
        <?php echo "<p>{$kan}</p>"; ?>
      </div>

      <div class="joukens">
        <h3>◎嶺上開花</h3>
        <?php if ($rinshan === "rinshan") : ?>
          <p>嶺上開花</p>
        <?php else : ?>
          <p>無し</p>
        <?php endif; ?>
      </div>

      <div class="joukens">
        <h3>◎平和(ピンフ)</h3>
        <?php if ($pinhu === "pinhu") : ?>
          <p>平和</p>
        <?php else : ?>
          <p>無し</p>
        <?php endif; ?>
      </div>

    </div>
    <h1>手牌を確認してください</h1>
    <div class="check-container">
      <?php if ($tehais_count === 14) : ?>
        <?php displayTehai($tehais); ?>
        <p class="check-p">
          本当にあがっていますか？<br>
          ※あがってない場合、計算間違いが出る可能性があります
        </p>
      <?php else : ?>
        <?php $check++; ?>
        <h5>手牌の数が間違っています<br>手牌は上がり牌含め14枚選択してください</h5>
      <?php endif ?>
    </div>
    <?php if ($check !== 1) : ?>
      <h1>この手牌でよろしいですか？</h1>
    <?php else : ?>
      <h1>もう一度確認してください</h1>
    <?php endif; ?>
    <form action="result.php" method="post">
      <div class="check-container-2">
        <?php passJouken($joukens); ?>
        <?php passData($tehais); ?>
        <button class="btn" type="button" onclick="history.back()">もう１度選択する</button>
        <?php if ($check !== 1) : ?>
          <button class="btn">点数を計算する</button>
        <?php endif; ?>
      </div>
    </form>
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