<?php
  // required page data
  $pageName = "inquiry-input";

  $metaData = [
    "title" => "商品注文・お問い合わせ｜業務用（法人のお客様）｜＆C－ブランドサイト",
    "description" => "＆Cの商品についてのご注文・お問い合わせはこちら。優れた樹脂コーティングをインテリアに。機能的で美しく。",
    "keywords" => "",
  ];

  $step = 1;

  $breadcrumb = [
    [
      "link" => false,
      "text" => "法人のお客様お問い合わせフォーム",
    ],
  ];
?>
<?php include './_inquiry-head.php'; ?>
  <div class="layout">
    <h2 class="inquiry-header">入力内容</h2>
    <!-- TODO: change post destination to "/inquiry/confirm" -->
    <form class="form" id="form" name="form" method="post" action="/inquiry/confirm">
      <p class="form__top-text txt-center"><span class="required"></span>は必須項目となります。必ずご記入ください。</p>
      <div class="form__row">
        <div class="form__row-left">お問い合わせ項目</div>
        <div class="form__row-right">
          <label class="clickable"><input type="radio" name="inquiry-type" value="お見積のご用命">お見積のご用命</label>
          <span class="spacer"></span>
          <label class="clickable"><input type="radio" name="inquiry-type" value="お問い合わせ">お問い合わせ</label>
          <span class="spacer"></span>
          <label class="clickable"><input type="radio" name="inquiry-type" value="その他">その他</label>
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left">商品名</div>
        <div class="form__row-right">
          <input type="text" name="product-name" class="form__text-input">
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left required">氏名</div>
        <div class="form__row-right">
          <input type="text" name="name-kanji" class="form__text-input" required>
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left required">氏名 よみがな</div>
        <div class="form__row-right">
          <input type="text" name="name-kana" class="form__text-input" required>
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left required">会社or団体名</div>
        <div class="form__row-right">
          <input type="text" name="organization-name" class="form__text-input" required>
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left required">部署名</div>
        <div class="form__row-right">
          <input type="text" name="department-name" class="form__text-input" required>
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left required">郵便番号</div>
        <div class="form__row-right">
          <input type="text" name="postal-code-1" class="form__text-input form__text-input--postal"
            minlength="3" maxlength="3" required
            onKeyUp="AjaxZip3.zip2addr('postal-code-1','postal-code-2','address','address');"
          >
          <span class="spacer">-</span>
          <input type="text" name="postal-code-2" class="form__text-input form__text-input--postal"
            minlength="4" maxlength="4" required
            onKeyUp="AjaxZip3.zip2addr('postal-code-1','postal-code-2','address','address');"
          >
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left required">住所</div>
        <div class="form__row-right">
          <input type="text" name="address" class="form__text-input" required>
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left required">お電話番号</div>
        <div class="form__row-right">
          <input type="tel" name="phone" class="form__text-input" required>
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left required">メールアドレス</div>
        <div class="form__row-right">
          <input type="email" name="email" class="form__text-input" required>
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left">FAX</div>
        <div class="form__row-right">
          <input type="tel" name="fax" class="form__text-input">
        </div>
      </div>
      <div class="form__row">
        <div class="form__row-left">お問い合わせ内容</div>
        <div class="form__row-right">
          <textarea name="message" cols="30" rows="10" class="form__text-input"></textarea>
        </div>
      </div>
      <h2 class="inquiry-header">個人情報の取り扱い</h2>
      <p class="txt-center">個人情報の取り扱いについて、詳しくは弊社の<a href="https://www.imcjpn.co.jp/policy/" target="_blank">プライバシーポリシー</a>をご覧ください。</p>
      <div class="personal-info">
        <span class="personal-info__text">個人情報の取り扱い</span>
        <label class="clickable"><input type="checkbox" name="personal-info" class="personal-info__checkbox" required>同意します</label>
      </div>
      <div class="button-wrapper">
        <input class="button button--disabled" id="submit-button" type="submit" value="入力内容確認">
      </div>
    </form>

  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      // display submit button as disabled if required inputs are not checked
      const $submitButton = $('#submit-button');
  
      function validateForm() {
        if (
          $('[name=name-kanji]').val().length > 0 &&
          $('[name=name-kana]').val().length > 0 &&
          $('[name=organization-name]').val().length > 0 &&
          $('[name=department-name]').val().length > 0 &&
          $('[name=postal-code-1]').val().length > 0 &&
          $('[name=postal-code-2]').val().length > 0 &&
          $('[name=address]').val().length > 0 &&
          $('[name=phone]').val().length > 0 &&
          $('[name=email]').val().length > 0 &&
          $('[name=personal-info]').prop('checked')
        ) {
          $submitButton.removeClass('button--disabled');
          $submitButton.addClass('button--blue');
        } else {
          $submitButton.removeClass('button--blue');
          $submitButton.addClass('button--disabled');
        }
        return false;
      }
  
      $('#form').on('change', validateForm);
    });
  </script>
  <!-- address lookup by zip api -->
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<?php include './_inquiry-foot.php'; ?>
