
<div class="container">
<form id="paymenttform" method="post" action="{{url('/restpay') }}">
    @csrf
    <div class="formgroup">
    <label>Card Number</label>
    <input type="text" class="form-control" autocomplete="off" name="card" id="card">
    </div>
    <div class="formgroup">
    <label>Cvc</label>
    <input type="text" class="form-control" autocomplete="off" name="cvc" id="cvc">
    </div>
    <div class="formgroup">
    <label>Expory Month</label>
    <input type="text" class="form-control" autocomplete="off" name="exp_month" id="exp_month">
    </div>
    <div class="formgroup">
    <label>Expory Month</label>
    <input type="text" class="form-control" autocomplete="off" name="exp_year" id="exp_year">
    </div>
    <div class="formgroup">
    <input class="btn btn-primary" type="button" id="sb-form" value="submit">
    </div>
</form>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>