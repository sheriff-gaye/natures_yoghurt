<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Payment</title>

  <link rel="stylesheet" type="text/css" href="{{asset('css/payment.css')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
  <main class="landing-section">
    <div class="background-image"></div>
    <div class="cc-container">
      <div class="cc-wrapper">
        <div class="cc-front">
          <div class="cc-front-content">
            <div class="circles-container">
              <div class="white-circle"></div>
              <div class="transparent-circle"></div>
            </div>
            <div class="cc-front-values">
              <div class="cc-front-values-1">
                <output class="cc-number-output">0000 0000 0000 0000</output>
              </div>
              <div class="cc-front-values-2">
                <output class="cc-name-output">card owner name</output>
                <div class="extade-container">
                  <output class="cc-mm-output">00</output>
                  <span>&#47;</span>
                  <output class="cc-yy-output">00</output>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cc-back">
          <div class="cc-back-content">
            <output class="cc-cvc-output">000</output>
          </div>
        </div>
      </div>
    </div>
    <section class="main-container">
      <form class="main-form">
        <div class="form-item">
          <label>Cardholder Name</label>
          <input id="card-name" class="form-item-input" type="text" name="CARD_HOLDER_NAME" placeholder="e.g. Jane Applessed" maxlength="100">
          <span id="wrong-name" class="wrong-span hide"></span>
        </div>
        <div class="form-item">
          <label>Card Number</label>
          <input id="card-number" class="form-item-input" type="text" name="CARD_NUMBER" placeholder="eg. 1234 5678 9123 0000" maxlength="16">
          <span id="wrong-number" class="wrong-span hide">Wrong format, numbers only</span>
        </div>
        <div class="form-item-aligner">
          <div class="form-item">
            <label>Exp. Date (MM/YY)</label>
            <div>
              <div>
                <input id="card-mm" class="form-item-input card-date-input" type="text" name="CARD_DATE_MONTH" placeholder="MM" maxlength="2">
                <span id="wrong-month" class="wrong-span hide">Can't be blank</span>
              </div>
              <div>
               <input id="card-yy" class="form-item-input card-date-input" type="text" name="CARD_DATE_YEAR" placeholder="YY" maxlength="2">
               <span id="wrong-year"class="wrong-span hide">Can't be blank</span>
              </div>
            </div>
          </div>
          <div class="form-item">
            <label>CVC</label>
            <input id="card-cvc" class="form-item-input" type="text" name="CARD_CVC" placeholder="e.g. 123" maxlength="3">
            <span id="wrong-cvc" class="wrong-span hide">Can't be blank</span>
          </div>
        </div>
        <button type="button" class="confirm-button">Confirm</button>
      </form>
    </section>
    <div class="submit-success-container hide">
      <img src="images/icon-complete.svg" alt="">
      <div>
        <h2>Thank you!</h2>
        <p>We've added your card details</p>
      </div>
      <button type="button" class="continue-button">Continue</button>
    </div>
</main>
<script type="text/javascript" src="{{asset('js/payment.js')}}"></script>
</body>
</html>
