<?php include("../include/header.php")?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>
<style>
.creditCard{
    margin-right:5px;
}
.creditCard:hover{
    border:1px solid blue;
    padding-right:1px;
}
.checkout-container{
    margin-top:4em; 
    padding:1.5em 4em; 
    border:1px solid grey; 
    background-color:#f3f3f333;
    border-radius:5%; 
    width:50%;
}

@media only screen and (max-width:500px) and (min-width:100px) {
    .checkout-container{
        border-radius:2%; 
        width:90%; 
        margin-top:2em; 
        padding:0.1em 1em;
        padding-bottom: 0.9em; 
    }
    .creditCard{
        margin-right:-2px;
    }   
    
}

@media only screen and (max-width:850px) and (min-width:500px) {
    .checkout-container{
        border-radius:3%; 
        width:75%; 
        margin-top:2em; 
        padding:1em 3em; 
    }
    .creditCard{
        margin-right:-3px;
    }  
}

@media only screen and (max-width:1000px) and (min-width:850px) {
    .checkout-container{
        border-radius:4%; 
        width:60%; 
        margin-top:2em; 
        padding:1em 3em; 
    }
}

</style>
<div class="container checkout-container">
<form >
     <!-- first screen -->
    <section>
        <div class="row" style="margin-top:2em;" id="billingAddressScreen" style="display:block;">
            <h4 >Billing Address</h4>    
            <div class="col-sm-12" style="margin-top:1.3em;">
                <div class="form-group">
                    <label for="name"><strong>Name<span style="color:red;">*</span>:</strong></label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="bookCodeHelp" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="email"><strong>Email<span style="color:red;">*</span>:</strong></label>
                    <input type="email" class="form-control" name="email"  id="emailR" placeholder="Enter E-mail" required>
                </div>
                <div class="form-group">
                    <label for="contact"><strong>Contact<span style="color:red;">*</span>:</strong></label>
                    <input type="text" class="form-control" name="contact"  id="contact" maxlength="12" placeholder="Contact Number" required>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="country"><strong>Country<span style="color:red;">*</span>:</strong></label>
                            <select id="inputCountry" class="form-control" disabled required>
                                <option selected>India</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="state"><strong>State/UT<span style="color:red;">*</span>:</strong></label>
                            <select id="state" class="form-control" required>
                                <option selected disabled>Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="postalCode"><strong>Postal Code<span style="color:red;">*</span>:</strong></label>
                            <input type="text"  maxlength="6" class="form-control" placeholder="Postal code" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <label for="contact"><strong>Address<span style="color:red;">*</span>:</strong></label>
                    <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="row" style="margin-top:1.5em;">
                <div class="col-md-8"></div>            
                <div class="col-md-4" >
                    <button type="button"  style="width:100%;" name="next" class="btn btn-primary" id="billingNextBtn">NEXT</button>
                </div>
            </div>
            </div>
            <!-- row 4 -->
            
        </div>
        
            
        
    </section>
    <!-- 2nd section -->
    <!-- 2nd screen -->
    <section>
          <div id="paymentMethodScreen" style="display:none; ">
            <h4>Select Payment Method</h4>
            <div class="form-check" style="margin-top:1.5em;">
                <input class="form-check-input" type="radio" name="payMethod" id="OnlinePay" value="1" checked >
                <label class="form-check-label" for="exampleRadios1">
                Pay Online
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payMethod" id="COD" value="2">
                <label class="form-check-label" for="exampleRadios2">
                Cash On Delivery
                </label>
            </div>
            <div class="row col-md-12" style="margin-top:1.5em;">
                <div class="col-md-4" id="prevBtnPay">
                    <button type="button"  style="width:100%;" name="pre" class="btn btn-primary" id="paymentMetPrevBtn">PREVIOUS</button>
                </div>
                <div class="col-md-4"></div>            
                <div class="col-md-4" >
                    <button type="button"  style="width:100%;" name="next" class="btn btn-primary" id="paymentMetNextBtn">NEXT</button>
                </div>
            </div>
        </div>
        
    </section>
    <!-- 3rd section -->
    <section>
         <!-- third screen -->
         <div id="OrderReview" style="display:none;">
            <h4>Review Order</h4>
            <h5>Order Info</h5>
             <div style="height:100px;"></div>   
            <h5>Address Info</h5>
            <div class="row col-md-12" style="margin-top:2em;">
                <div class="col-md-4"  id="prevBtnReview">
                    <button type="button"  style="width:100%;" name="prev" class="btn btn-primary" id="reviewPrevBtn">PREVIOUS</button>
                </div>
                <div class="col-md-4"></div>            
                <div class="col-md-4" >
                    <button type="button"  style="width:100%;" name="next" class="btn btn-primary" id="reviewNextBtn">NEXT</button>
                </div>
            </div>
        </div>
    </section>
    <section id="onlinePay"  style="display:none;">
        <!-- fourth screen -->
        <div class="row" style="margin-top:2em;" >
            <h4 >Pay Online</h4>    
            <div class="col-sm-12" style="margin-top:1.3em;">
                <!-- <div class="row" style="margin-bottom:1.2em;">
                    <div class="col-md-2">
                       <a href="#"> <img class="creditCard" height="50" width="70" src="images/Dark Color/1.png"></a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" > <img class="creditCard" height="50" width="70" src="images/Dark Color/2.png"></a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" >  <img class="creditCard" height="50" width="70" src="images/Dark Color/3.png"></a>
                    </div>
                    <div class="col-md-2">
                        <a href="#"> <img class="creditCard" height="50" width="70" src="images/Dark Color/5.png"></a>
                    </div>
                    <div class="col-md-4"></div>
                </div>  -->
                <div style="margin-bottom:1.2em; ">
                    <a href="#"> <img class="creditCard" height="50" width="70" src="images/Dark Color/1.png"></a>
                    <a href="#" > <img class="creditCard" height="50" width="70" src="images/Dark Color/2.png"></a>
                    <a href="#" > <img class="creditCard" height="50" width="70" src="images/Dark Color/3.png"></a>
                    <a href="#"> <img class="creditCard" height="50" width="70" src="images/Dark Color/5.png"></a>
                </div>
                <div class="form-group">
                    <label for="cardNumber"><strong>Card Number<span style="color:red;">*</span>:</strong></label>
                    <input type="text" maxlength="16" class="form-control" name="cardNumber" id="cardNumber" aria-describedby="cardNumberHelp" placeholder="CARD NUMBER" required>
                </div>
                <div class="row ">
                    <div class="col-md-5">
                    <label for="expiry"><strong>Expiry Date<span style="color:red;">*</span>:</strong></label>
                        <div class="form-group">
                            <select id="month" name="month" class="form-control" required>
                                <option selected disabled>MONTH</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <label for="expiry" style="visibility:hidden;"><strong>Expiry Date<span style="color:red; ">*</span>:</strong></label>
                        <div class="form-group">
                            <select id="year" name="year" class="form-control" required>
                                <option selected disabled>YEAR</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cvv"><strong>CVV<span style="color:red;">*</span>:</strong></label>
                            <input type="number"  maxlength="3" class="form-control" name="cvv"  id="cvv" placeholder="CVV" required>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label for="cardholderName"><strong>Card Holder Name<span style="color:red;">*</span>:</strong></label>
                    <input type="text" class="form-control" name="cardholderName"  id="cardholderName" placeholder="CARD HOLDER NAME" required>
                </div>
                <div class="form-group" >
                    <button type="button"  style="width:100%;" name="next" class="btn btn-primary" id="payNextBtn" >PAY</button>
                </div>
            </div>

            <div class="row col-md-12" style="margin-top:1.5em;">
                <div class="col-md-4"  id="prevBtnReview">
                    <button type="button"  style="width:100%;" name="next" class="btn btn-primary" id="payPrevBtn">PREVIOUS</button>
                </div>
                <div class="col-md-8"></div>            
            </div>
        </div>
            
    </section>
    <!-- fifth screen -->
    <section id="orderConfirmation"  style="display:none;">
        <div style="padding:20px;">
            <h4 style="display:none;" id="paymentSuccessMsg">Payment Successful!!</h4>
            <h5>Your order has been placed successfully. Thanks for shopping with us.</h5>
        </div>
    </section>
</form>
</div>
<?php include("../include/footer.php")?>
<script type="text/javascript" src="js/checkoutJS.js"></script>