$(function(){



  //変数
  var src = 0;
  var clickCount = 0; //クリック数
  var $displayArea = $('#displayArea'); //表示画面
  var errorCount = 0;
  var id = 0; //クリックされた画像のID

  //各牌の上限
  var m1C = 0;
  var m2C = 0;
  var m3C = 0;
  var m4C = 0;
  var m5C = 0;
  var m6C = 0;
  var m7C = 0;
  var m8C = 0;
  var m9C = 0;
  var s1C = 0;
  var s2C = 0;
  var s3C = 0;
  var s4C = 0;
  var s5C = 0;
  var s6C = 0;
  var s7C = 0;
  var s8C = 0;
  var s9C = 0;
  var p1C = 0;
  var p2C = 0;
  var p3C = 0;
  var p4C = 0;
  var p5C = 0;
  var p6C = 0;
  var p7C = 0;
  var p8C = 0;
  var p9C = 0;
  var tonC = 0;
  var nanC = 0;
  var shaC = 0;
  var peiC = 0;
  var hakuC = 0;
  var hatuC = 0;
  var chunC = 0;

  //字牌データ
  var jihais = [];


  //関数
  //画像追加
  function addImage(src){
    $displayArea.append(`<img class="added-image" src="${src}">`);
  }

  //各牌のクリック数追加
  function haiLmit(id){
    switch(id) {
      case 'ton':
          tonC++;
          break;
      case 'nan':
          nanC++;
          break;
      case 'sha':
          shaC++;
          break;
      case 'pei':
          peiC++;
          break;
      case 'haku':
          hakuC++;
          break;
      case 'hatu':
          hatuC++;
          break;
      case 'chun':
          chunC++;
          break;
      case 'man-1':
          m1C++;
          break;
      case 'man-2':
          m2C++;
          break;
      case 'man-3':
          m3C++;
          break;
      case 'man-4':
          m4C++;
          break;
      case 'man-5':
          m5C++;
          break;
      case 'man-6':
          m6C++;
          break;
      case 'man-7':
          m7C++;
          break;
      case 'man-8':
          m8C++;
          break;
      case 'man-9':
          m9C++;
          break;
      case 'pin-1':
          p1C++;
          break;
      case 'pin-2':
          p2C++;
          break;
      case 'pin-3':
          p3C++;
          break;
      case 'pin-4':
          p4C++;
          break;
      case 'pin-5':
          p5C++;
          break;
      case 'pin-6':
          p6C++;
          break;
      case 'pin-7':
          p7C++;
          break;
      case 'pin-8':
          p8C++;
          break;
      case 'pin-9':
          p9C++;
          break;
      case 'sou-1':
          s1C++;
          break;
      case 'sou-2':
          s2C++;
          break;
      case 'sou-3':
          s3C++;
          break;
      case 'sou-4':
          s4C++;
          break;
      case 'sou-5':
          s5C++;
          break;
      case 'sou-6':
          s6C++;
          break;
      case 'sou-7':
          s7C++;
          break;
      case 'sou-8':
          s8C++;
          break;
      case 'sou-9':
          s9C++;
          break;
    }
  }

  //各牌の上限判定
  function haiJadge(id){
    switch(id) {
      case 'ton':
          if(tonC >= 4){
            return true;
          }
          break;
      case 'nan':
          if(nanC >= 4){
            return true;
          }
          break;
      case 'sha':
          if(shaC >= 4){
            return true;
          }
          break;
      case 'pei':
          if(peiC >= 4){
            return true;
          }
          break;
      case 'haku':
          if(hakuC >= 4){
            return true;
          }
          break;
      case 'hatu':
          if(hatuC >= 4){
            return true;
          }
          break;
      case 'chun':
          if(chunC >= 4){
            return true;
          }
          break;
      case 'man-1':
          if (m1C >= 4) {
              return true;
          }
          break;
      case 'man-2':
          if (m2C >= 4) {
              return true;
          }
          break;
      case 'man-3':
          if (m3C >= 4) {
              return true;
          }
          break;
      case 'man-4':
          if (m4C >= 4) {
              return true;
          }
          break;
      case 'man-5':
          if (m5C >= 4) {
              return true;
          }
          break;
      case 'man-6':
          if (m6C >= 4) {
              return true;
          }
          break;
      case 'man-7':
          if (m7C >= 4) {
              return true;
          }
          break;
      case 'man-8':
          if (m8C >= 4) {
              return true;
          }
          break;
      case 'man-9':
          if (m9C >= 4) {
              return true;
          }
          break;
      case 'pin-1':
          if (p1C >= 4) {
              return true;
          }
          break;
      case 'pin-2':
          if (p2C >= 4) {
              return true;
          }
          break;
      case 'pin-3':
          if (p3C >= 4) {
              return true;
          }
          break;
      case 'pin-4':
          if (p4C >= 4) {
              return true;
          }
          break;
      case 'pin-5':
          if (p5C >= 4) {
              return true;
          }
          break;
      case 'pin-6':
          if (p6C >= 4) {
              return true;
          }
          break;
      case 'pin-7':
          if (p7C >= 4) {
              return true;
          }
          break;
      case 'pin-8':
          if (p8C >= 4) {
              return true;
          }
          break;
      case 'pin-9':
          if (p9C >= 4) {
              return true;
          }
          break;
      case 'sou-1':
          if (s1C >= 4) {
              return true;
          }
          break;
      case 'sou-2':
          if (s2C >= 4) {
              return true;
          }
          break;
      case 'sou-3':
          if (s3C >= 4) {
              return true;
          }
          break;
      case 'sou-4':
          if (s4C >= 4) {
              return true;
          }
          break;
      case 'sou-5':
          if (s5C >= 4) {
              return true;
          }
          break;
      case 'sou-6':
          if (s6C >= 4) {
              return true;
          }
          break;
      case 'sou-7':
          if (s7C >= 4) {
              return true;
          }
          break;
      case 'sou-8':
          if (s8C >= 4) {
              return true;
          }
          break;
      case 'sou-9':
          if (s9C >= 4) {
              return true;
          }
          break;
      default:
        break;
    }
  }

  //クリック数リセット
  function ressetCount(){
    clickCount = 0;
    errorCount = 0;
    m1C = 0;
    m2C = 0;
    m3C = 0;
    m4C = 0;
    m5C = 0;
    m6C = 0;
    m7C = 0;
    m8C = 0;
    m9C = 0;
    s1C = 0;
    s2C = 0;
    s3C = 0;
    s4C = 0;
    s5C = 0;
    s6C = 0;
    s7C = 0;
    s8C = 0;
    s9C = 0;
    p1C = 0;
    p2C = 0;
    p3C = 0;
    p4C = 0;
    p5C = 0;
    p6C = 0;
    p7C = 0;
    p8C = 0;
    p9C = 0;
    tonC = 0;
    nanC = 0;
    shaC = 0;
    peiC = 0;
    hakuC = 0;
    hatuC = 0;
    chunC = 0;
  }

  //inputに追加
  function addInput(id){
    jihais.push(id);
    var uniqueJihais = Array.from(new Set(jihais));
    $('#jihai').attr('value',uniqueJihais);

  }


  //メインコード
  $('.pai-img').click(function(){

    clickCount++;
    src = $(this).attr('src');
    id = $(this).attr('id');

    haiLmit(id);

    if(haiJadge(id)){
      $(this).css({
        'opacity':'0.6',
        'pointer-events':'none'
      });
    }

    if(clickCount >= 15){
      errorCount++;
      if(errorCount == 1){
        $displayArea.append('<p>※手牌は14枚までが選択上限になります</p>');
        $('.pai-img').css('opacity','0.6');
      }
      return;
    }

    addImage(src);
    addInput(id);
  });


  $('#resetButton').click(function(){
    ressetCount();
    $displayArea.empty();
    $('.pai-img').css({
      'opacity':'1',
      'pointer-events':'auto'
    });
  });


});