
<div style="padding:5px">
   <div class="container">
   
       @if($errors->any())
       <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
         @endforeach
         </ul>
         </div>
       @endif
   
   </div>    
</div>
<div class="container">
<form id="paymenttform" method="post" action="{{url('/restpay') }}">
    @csrf
    <div class="formgroup">
    <label>First Name</label>
    <input type="text" class="form-control" autocomplete="off" name="first_name" id="first_name" value="{{ old('first_name')}}">
    </div>
    <div class="formgroup">
    <label>First Name</label>
    <input type="text" class="form-control" autocomplete="off" name="last_name" id="last_name" value="{{ old('last_name')}}">
    </div>
    <div class="formgroup">
    <label>Card Number</label>
    <input type="text" class="form-control" autocomplete="off" name="card" id="card" value="{{ old('card')}}">
    </div>
    <div class="formgroup">
    <label>Cvc</label>
    <input type="text" class="form-control" autocomplete="off" name="cvc" id="cvc" value="{{ old('cvc')}}">
    </div>
    <div class="formgroup">
    <label>Expory Month</label>
    <input type="text" class="form-control" autocomplete="off" name="exp_month" id="exp_month" value="{{ old('exp_month')}}">
    </div>
    <div class="formgroup">
    <label>Expory Month</label>
    <input type="text" class="form-control" autocomplete="off" name="exp_year" id="exp_year" value="{{ old('exp_year')}}">
    </div>
    <div class="formgroup">
    <label>Amount</label>
    <input type="text" class="form-control" autocomplete="off" name="amount" id="amount" value="{{ old('amount')}}">
    </div>
    <div class="formgroup">
    <input class="btn btn-primary" type="submit" id="sb-form" value="submit">
    </div>
     @if(session('message')) 
    <div class="alert alert-success">
       <strong>Success!</strong> {{ session('message') }}
    </div>
     @endif
</form>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>