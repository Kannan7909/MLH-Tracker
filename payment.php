<?php
include("header.php");
?>

<main>
    <div class="container">
        <section>
            <div class="payment-section-1">
                <div class="row">
                    <div class="col-sm-4 receipt">
                        <p>Receipt for</p>
                        <h4>Subscription</h4>
                        <hr>
                        <p>Amount :</p>
                        <p>&nbsp;&nbsp;&nbsp;200.00 USD</p>
                        <hr>
                        <p>Date :</p>
                        <p>&nbsp;&nbsp;&nbsp; Nov 5</p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet.</p>                        
                    </div>
                    <div class="col-sm-6 payment-form">
                        <h3 class="text-center">Payment</h3>
                        <div class="form-outline">
                            <i class="fa fa-credit-card pay-icon" aria-hidden="true">
                                <input type="radio" id="" class="paymentMode" name="payment-mode" value="card" checked>
                            </i>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cc-paypal pay-icon">
                                <input type="radio" id="" class="paymentMode" name="payment-mode" value="paypal">
                            </i>
                        </div>
                        <form class="cardPayment-form" id="card-form">
                            <input type="hidden" name="amount" value="">
                            <div id="card">
                                <div class="form-outline">
                                    <label for="card-number">Card Number:</label>
                                    <input type="text" class="form-control" id="card-number" name="card-number" required>
                                </div>
                                <div class="form-outline">
                                    <label for="expiration-date">Expiration Date:</label>
                                    <input type="date" class="form-control" id="expiration-date" name="expiration-date" required>
                                </div>
                                <div class="form-outline">
                                    <label for="cvv">CVV:</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-outline-primary" value="Pay" style="padding: 5px 30px;">
                            </div>
                        </form>
                        <form class="paypalPayment-form" id="paypal-form">
                            <div class="text-center">
                                <img src="asset/images/PayPal.svg.png" style="width: 20%;opacity:unset"/>
                            </div>
                            <div id="card">
                                <div class="form-outline">
                                    <label for="card-number">Amount :</label>
                                    <input type="text" class="form-control" name="amount" value="$200" readonly>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-outline-primary" value="Pay">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
include("footer.php");
?>