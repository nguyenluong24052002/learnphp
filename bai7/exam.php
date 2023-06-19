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

$organization = $affiliation = $administrator = $zip31 = $zip32 = $address = $phone = $mailaddress = $password = '';
$organizationArr = $affiliationArr = $administratorArr = $zip31Arr = $zip32Arr = $addressArr = $phoneArr = $mailaddressArr = $passwordArr = '';
$content = '';

if (isset($_POST['Submit'])) {
    $organization = $_POST['organization'];
    $affiliation = $_POST['affiliation'];
    $administrator = $_POST['administrator'];
    $zip31 = $_POST['zip31'];
    $zip32 = $_POST['zip32'];
    $address = $_POST['address'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $mailaddress = $_POST['mailaddress'];
    $password = $_POST['password'];


         // Validate for organization
    if (empty($organization)) {
        $organizationArr = '管理者名は必ず指定してください。';
    }

     // Validate for affiliation
    if (empty($affiliation)) {
        $affiliationArr  = '所属は必ず指定してください。 ';
    }

    // Validate for administrator
    if (empty($administrator)) {
        $administratorArr  = '管理者名は必ず指定してください。 ';
    }


    if (empty($zip31)) {
        $zip31Arr  = '郵便番号は必ず指定してください。';
    }


    if (empty($zip32)) {
        $zip32Arr  = '郵便番号は必ず指定してください。 ';
    }

       // Validate for address
    if (empty($address)) {
        $addressArr  = 'ご住所は必ず指定してください。';
    }

       // Validate for phone
    if (empty($phone)) {
        $phoneArr  = '電話番号は必ず指定してください。';
    }else if (strlen($_POST['phone']) > 10) {
        $phoneArr = 'Phone không đc quá 10 lý tự';
    }

    // Validate for email
    if (empty($mailaddress)) {
    $mailaddressArr = 'Vui lòng nhập email của bạn';
    } else if (!filter_var($_POST['mailaddress'], FILTER_VALIDATE_EMAIL)) {
    $mailaddressArr = 'Email không đúng định dạng';
    }

       // Validate for password
    if (empty($password)) {
        $passwordArr  = 'パスワードは必ず指定してください。';
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
              <label class="side_label">
                <input type="radio" name="destination" value="home">自宅
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
                    <input type="text" name="zip31" maxlength="3" placeholder="000"  class="<?= $zip31Arr ? 'input-error' : '' ?>" value="<?= $zip31 ?>">
                    <?= $zip31Arr ? "<span class='smg-error'>{$zip31Arr}</span>" : '' ?>
                  </div>
                  <div>
                    <input type="text" name="zip32" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref','pref','addr1');" placeholder="0000" class="<?= $zip32Arr ? 'input-error' : '' ?>" value="<?= $zip32 ?>">
                    <?= $zip32Arr ? "<span class='smg-error'>{$zip32Arr}</span>" : '' ?>
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
