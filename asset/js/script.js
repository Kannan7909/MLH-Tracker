//Nav bar highlight

var pathArray = window.location.pathname.split( '/' );
var url_len = pathArray.length;
var page = pathArray[url_len-1].slice(0,pathArray[url_len-1].lastIndexOf('.'));
var menu = document.getElementById(`${page}`);
if(menu!=null){
    document.getElementById(`${page}`).classList.add("active");
}
else{
    document.getElementById('index').classList.add("active");
}

//hide lender
var lenderCol = document.getElementById("lender-col");
if(lenderCol){
    lenderCol.style.display = "none";    
}
var region = document.getElementById("region");

if(region){
    region.onchange = (e)=>{
        var selectedValues = [];

        for(var i=0;i<region.options.length;i++){
            if (region.options[i].selected) {
                selectedValues.push(region.options[i].value);
            }
        }

        if(selectedValues.length == 0){
            lenderCol.style.display = "none";
        }        
        else{
            lenderCol.style.display = "block";
            $.ajax({
                type: "POST",
                url: "php/getLender.php",
                data: { data: JSON.stringify(selectedValues) },
                success: function(response) {
                    var lenders = JSON.parse(response); 
                    var opts = "";
                    lenders.forEach(lender => {
                        opts += "<option value='"+lender.lenderId+"-"+lender.regionId+"'>"+lender.lender+"</option>";
                    });
                    $("#lenders")
                    .html(`${opts}`)
                    .selectpicker('refresh');
                }
            });
        }        
    }
}


var paymentMode = document.getElementsByClassName("paymentMode");
if(paymentMode.length>0){    
    document.getElementById("paypal-form").style.display = "none";
    for (let i = 0; i < paymentMode.length; i++) {
        if(paymentMode[i].checked){
            var checkedPaymentMode = paymentMode[i].value;
        }
        var paymentFormClass = document.getElementById(`${checkedPaymentMode}-form`);
        paymentMode[i].onchange = ()=>{
            paymentFormClass.style.display = "none";
            if(paymentMode[i].checked){
                checkedPaymentMode = paymentMode[i].value;
                paymentFormClass = document.getElementById(`${checkedPaymentMode}-form`);
            }
            paymentFormClass.style.display = "block";
        }
    }
}
