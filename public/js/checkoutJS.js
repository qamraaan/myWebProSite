 months=['JANUARY','FEBRAURY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEMPTEMBER','OCTOBER','NOVEMBER','DECEMBER'];
       years=['2021','2022','2023','2024','2025','2026','2027','2028','2029','2030'];
       states=['Jammu & Kashmir','Delhi','Rajasthan','Maharashtra','Gujrat','Assam','Andhra Pradesh','Madhya Pradesh'];
       //generate and append months for select element
       for(i=0;i<months.length;i++){
            $("#month").append("<option> "+months[i]+"</option>");
       }

       //generate and append years for select element
       for(i=0;i<years.length;i++){
            $("#year").append("<option> "+years[i]+"</option>");
       }
    
        //generate and append states for select element    
       for(i=0;i<states.length;i++){
            $("#state").append("<option> "+states[i]+"</option>");
       }

    // billing address screen
    $('#billingNextBtn').click(function(){
        $('#billingAddressScreen').css("display", "none");
        $('#OrderReview').css("display", "block");
    });
    // order review screen
    $('#reviewNextBtn').click(function(){
        $('#paymentMethodScreen').css("display", "block");
        $('#OrderReview').css("display", "none");  
    });
    $('#reviewPrevBtn').click(function(){
        $('#OrderReview').css("display", "none");
        $('#billingAddressScreen').css("display", "block");  
    });
    // payment method screen    when paymentNextbtn_clicked
    $('#paymentMetNextBtn').click(function(){
        $('#paymentMethodScreen').css("display", "none");
        if ($('#OnlinePay').is(':checked')){
            $('#onlinePay').css("display", "block"); 
        }else if ($('#COD').is(':checked')){
            $('#orderConfirmation').css("display", "block");  
        }
    });

    $('#paymentMetPrevBtn').click(function(){
        $('#paymentMethodScreen').css("display", "none");
        $('#billingAddressScreen').css("display", "none");
        $('#OrderReview').css("display", "block"); 
    });

    // online payment screen's previous btn
    $('#payPrevBtn').click(function(){
        $('#onlinePay').css("display", "none");
        $('#paymentMethodScreen').css("display", "block");     
    });
    $('#payNextBtn').click(function(){
        $('#orderConfirmation').css("display", "block");
        $('#paymentSuccessMsg').css("display", "block");
        $('#onlinePay').css("display", "none"); 
    });