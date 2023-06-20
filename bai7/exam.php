<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ここにタイトル</title>
    <!-- <link href="css/reset.css" rel="stylesheet" type="text/css"> -->
    <link href="./style.css" rel="stylesheet" type="text/css">
​
</head>

​
  <body>
  <?php

$organization = $affiliation = $administrator = $zipone = $ziptwo = $address = $phone = $mailaddress = $password = '';
$organizationArr = $affiliationArr = $administratorArr = $ziponeArr = $ziptwoArr = $addressArr = $phoneArr = $mailaddressArr = $passwordArr = '';
$content = '';

if (isset($_POST['Submit'])) {
    $organization = $_POST['organization'];
    $affiliation = $_POST['affiliation'];
    $administrator = $_POST['administrator'];
    $zipone = $_POST['zipone'];
    $ziptwo = $_POST['ziptwo'];
    $address = $_POST['address'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $mailaddress = $_POST['mailaddress'];
    $password = $_POST['password'];


         // Validate for Tên tổ chức
    if (empty($organization)) {
        $organizationArr = '管理者名は必ず指定してください。';
    }

     // Validate for Đơn vị liên kết
    if (empty($affiliation)) {
        $affiliationArr  = '所属は必ず指定してください。 ';
    }

    // Validate for tên quản trị viên
    if (empty($administrator)) {
        $administratorArr  = '管理者名は必ず指定してください。 ';
    }

    // Validate for mã bưu điện
    if (empty($zipone)) {
        $ziponeArr  = '郵便番号は必ず指定してください。';
    }else if (!is_numeric($_POST['zipone'])) {
      $ziponeArr = '不正な形式';
    }

    if (empty($ziptwo)) {
        $ziptwoArr  = '郵便番号は必ず指定してください。 ';
    } else if (!is_numeric($_POST['ziptwo'])) {
      $ziptwoArr = '不正な形式';
    }


       // Validate for Địa chỉ
    if (empty($address)) {
        $addressArr  = 'ご住所は必ず指定してください。';
    }

       // Validate for 0866711741
    if (empty($phone)) {
        $phoneArr  = '電話番号は必ず指定してください。';
    }else if (strlen($_POST['phone']) > 10) {
        $phoneArr = '電話番号は 10 文字以内です';
    }

    // Validate for địa chỉ thư điện tử
    if (empty($mailaddress)) {
    $mailaddressArr = 'メールアドレスは必ず指定してください。';
    } else if (!filter_var($_POST['mailaddress'], FILTER_VALIDATE_EMAIL)) {
    $mailaddressArr = '電子メールの無効化';
    }

       // Validate for mật khẩu
    if (empty($password)) {
        $passwordArr  = 'パスワードは必ず指定してください。';
    }



    // Kiểm tra và hiển thị thông tin
    if ($organization && $affiliation && $administrator && $zipone && $ziptwo && $address && $phone && $mailaddress ) {
      $content .= "<p>Tên tổ chức của bạn: ${organization}";  
      $content .= "<p>Đơn vị liên kết của bạn: ${affiliation}";
      $content .= "<p>Tên quản trị viên của bạn: ${administrator}";
      $content .= "<p>Mã bưu điện của bạn: ${zipone}";
      $content .= "<p>Mã bưu điện của bạn: ${ziptwo}";
      $content .= "<p>Địa chỉ của bạn: ${address}";
      $content .= "<p>Số điện thoại của bạn: ${phone}";  
      $content .= "<p>Địa chỉ thư điện tử của bạn: ${mailaddress}";

    }
  }
    

?>
    <header id="header">
    </header>
​
    <div class="container">
      <div class="breadcrumbs">
        パンくずリスト > <a href="">パンくずリスト</a>
      </div>
    </div>
      
    <main>
​
​
      <form action="" method="POST">
      <section>
        <div class="section_header">
          <h2 class="section_title">お客様登録</h2>
        </div>
​
        <div class="container">
          <div class="form_frame">
​
            <div class="form_box">
​
              <div class="form_headline">
                商品引渡し先
              </div>
​
              <label class="side_label">
                <input type="radio" name="destination" value="company" checked>会社
              </label>
              <label class="side_label">
                <input type="radio" name="destination" value="school">学校
              </label>
​
            </div>
​
            <!-- 会社･勤務先フォーム -->
            <div id="company_form">
              
              <div class="form_box">
                <div class="form_headline">
                  団体名
                </div>
                <input type="text" name="organization" placeholder="株式会社〇〇" class="<?= $organizationArr ? 'input-error' : '' ?>" value="<?= $organization ?>">
                <?= $organizationArr ? "<span class='smg-error'>{$organizationArr}</span>" : '' ?>
              </div>
​
              <div class="form_box">
                <div class="form_headline">
                  所属（引渡し先）
                </div>
                <input type="text" name="affiliation" placeholder="営業部" class="<?= $affiliationArr ? 'input-error' : '' ?>" value="<?= $affiliation ?>">
                <?= $affiliationArr ? "<span class='smg-error'>{$affiliationArr}</span>" : '' ?>
              </div>
​
              <div class="form_box">
​
                <div class="form_headline">
                  管理者名
                </div>
                <input type="text" name="administrator" placeholder="山田　太郎" class="<?= $administratorArr ? 'input-error' : '' ?>" value="<?= $administrator ?>">
​                 <?= $administratorArr ? "<span class='smg-error'>{$administratorArr}</span>" : '' ?>
              </div>
​
​
              <div class="form_box">
                <div class="form_headline">
                  郵便番号
                </div>
                <div class="flex_wrap zip_frame">
                  <div>
                    <input type="text" name="zipone" maxlength="3" placeholder="000"  class="<?= $ziponeArr ? 'input-error' : '' ?>" value="<?= $zipone ?>">
                    <?= $ziponeArr ? "<span class='smg-error'>{$ziponeArr}</span>" : '' ?>
                  </div>
                  <div>
                    <input type="text" name="ziptwo" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zipone','ziptwo','pref','pref','addr1');" placeholder="0000" class="<?= $ziptwoArr ? 'input-error' : '' ?>" value="<?= $ziptwo ?>">
                    <?= $ziptwoArr ? "<span class='smg-error'>{$ziptwoArr}</span>" : '' ?>
                  </div>
                </div>
              </div>
​
              <div class="form_box">
                <div class="form_headline">
                  ご住所
                </div>
                <div class="pref"></div>
                <input type="text" name="address" placeholder="〇〇町1-1　〇〇マンション301" class="<?= $addressArr ? 'input-error' : '' ?>" value="<?= $address ?>">
                <?= $addressArr ? "<span class='smg-error'>{$addressArr}</span>" : '' ?>
              </div>
​
              <div class="form_box">
​
                <div class="form_headline">
                  電話番号
                </div>
                <input type="text" name="phone" placeholder="000-0000-0000" class="<?= $phoneArr ? 'input-error' : '' ?>" value="<?= $phone ?>">
                <?= $phoneArr ? "<span class='smg-error'>{$phoneArr}</span>" : '' ?>
​
              </div>
​
              <div class="form_box">
​
                <div class="form_headline">
                  メールアドレス
                </div>
                <input type="email" name="mailaddress" placeholder="example@example.com"  class="<?= $mailaddressArr ? 'input-error' : '' ?>" value="<?= $mailaddress ?>">
                <?= $mailaddressArr ? "<span class='smg-error'>{$mailaddressArr}</span>" : '' ?>
​
              </div>
​
              <div class="form_box">
​
                <div class="form_headline">
                  パスワード
                </div>
                <input type="text" name="password" placeholder="※半角英数字１５文字以内" class="<?= $passwordArr ? 'input-error' : '' ?>" value="<?= $password ?>">
                <?= $passwordArr ? "<span class='smg-error'>{$passwordArr}</span>" : '' ?>
​
              </div>
              
            </div>
​
            <!-- 学校フォーム -->
            <div id="school_form">
​
              <div class="form_box">
                <div class="form_headline">
                  団体名
                </div>
                <input type="text" name="" placeholder="〇〇中学校">
              </div>
​
              <div class="form_box">
                <div class="form_headline">
                  所属（学年・クラス）
                </div>
                <input type="text" name="" placeholder="〇年〇組">
              </div>
​
              <div class="form_box">
                <div class="form_headline">
                  管理者名
                </div>
                <input type="text" name="" placeholder="山田太郎">
              </div>
​
              <div class="form_box">
                <div class="form_headline">
                  郵便番号
                </div>
                <div class="flex_wrap zip_frame">
                  <div>
                    <input type="text" name="zip31" maxlength="3" placeholder="000">
                  </div>
                  <div>
                    <input type="text" name="zip32" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref','pref','addr1');" placeholder="0000">
                  </div>
                </div>
              </div>
​
              <div class="form_box">
                <div class="form_headline">
                  ご住所
                </div>
                <div name="pref"></div>
                <input type="text" name="addr1" placeholder="〇〇町1-1　〇〇マンション301">
              </div>
​
              <div class="form_box">
​
                <div class="form_headline">
                  電話番号
                </div>
                <input type="text" name="" placeholder="00-0000-0000">
​
              </div>
​
              <div class="form_box">
​
                <div class="form_headline">
                  メールアドレス
                </div>
                <input type="email" name="" placeholder="example@example.com">
​
              </div>
​
              <div class="form_box">
​
                <div class="form_headline">
                  パスワード
                </div>
                <input type="text" name="" placeholder="※半角英数字１５文字以内">
​
              </div>
​
            </div>
​
            <!-- 自宅フォーム -->
            <div id="home_form">
              自宅フォームが表示されます
            </div>
​
            </div>
​
          <div class="button">
            <div>
              <input type="submit" class="button01" name="Submit" value="確認画面へ">
            </div>
          </div>
​
​
        </div>
​
      </section>
      </form>
​
<div class='result'><?= $content ?></div>
​
    </main>
​
    <footer id="footer">
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="script.js"></script>
​
    <script>
      $(function(){
        $("#header").load("header.html");
        $("#footer").load("footer.html");
      });
    </script>
​
​
  </body>
</html>
