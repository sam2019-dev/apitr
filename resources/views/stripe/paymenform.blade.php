<form id="paymenttform" method="post" action="{{url('/makepayment') }}">
  @csrf
  <label>Card Number</label>
  <input type="text" autocomplete="off" name="card" id="card" >
  <label>Cvc</label>
  <input type="text" autocomplete="off" name="cvc" id="cvc" >
  <label>Expory Month</label>
  <input type="text" autocomplete="off" name="exp_month" id="exp_month" >
  <label>Expory Month</label>
  <input type="text" autocomplete="off" name="exp_year" id="exp_year" >
  <input type="button" id="sb-form" value="submit">
</form>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
/*$(function() {
    var $form         = $(".require-validation");
  $('#sb-form').click( function(e) {
   
 
        
  
 
      e.preventDefault();
      Stripe.setPublishableKey('pk_test_jRKtdW7HQsPgJ3WoFUB44qVp');
      Stripe.createToken({
        number: $('#card').val(),
        cvc: $('#cvc').val(),
        exp_month: $('#exp_month').val(),
        exp_year: $('#exp_year').val()
      }, stripeResponseHandler);
   
  
  });
  
  function stripeResponseHandler(status, response) {
      console.log(response);
       /* if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});*/
$(document).ready(function(){
    $('#sb-form').click( function(e) {
   
   Stripe.setPublishableKey('pk_test_jRKtdW7HQsPgJ3WoFUB44qVp');
   Stripe.createToken({
     number: $('#card').val(),
     cvc: $('#cvc').val(),
     exp_month: $('#exp_month').val(),
     exp_year: $('#exp_year').val()
   }, stripeResponseHandler);


});
function stripeResponseHandler(status, response) {
     
       if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
           
            $("#paymenttform").append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $("#paymenttform").get(0).submit();
        }
    }
    
})

</script>
</script>

