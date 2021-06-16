<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student | classroommoney</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('/public/js/main.js') }}"></script>

    <script src="{{ asset('/public/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/public/css/dash.css?d') }}">
</head>
<body>
@if (Auth::user()->type==3)
<div class="topnav" id="myTopnav">
  <a href="{{ url('/') }}" class="active">Classroom Money</a>
  <a href="{{ url('/student/mymarksheet') }}">Marksheet</a>
  <a href="{{ url('/student/myteachers') }}">Teachers</a>
  <a href="{{ url('/student/tutors') }}">Tutors</a>
    <a href="{{ url('/student/library') }}">Library</a>
<div class="dropdown">
    <button class="dropbtn">Account 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="{{ url('/invest') }}">Fee submission</a>
      <a href="{{ url('/balance') }}">My balance</a>
      <a href="{{ url('/earning') }}">Earning Records</a>
            <a href="{{ url('/student/teach') }}">My Teachers</a>

      <a href="{{ url('/settings') }}">Settings</a>
    </div>
  </div> 
  <a href="{{ url('/logout') }}">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
@endif
@if (Auth::user()->type==2)
  <div class="topnav" id="myTopnav">
  <a href="{{ url('/') }}">Classroom Money</a>
  <a href="{{ url('/teacher/mymarksheet') }}">Marksheet</a>
  <a href="{{ url('/teacher/mystudents') }}">Students</a>
  <a href="{{ url('/teacher/requests') }}" class="active">Requests</a>
  <a href="{{ url('/settings') }}">Settings</a>
  <a href="{{ url('/logout') }}">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
@endif


<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc; text-align: center;" action="{{ url('/payment') }}" method="POST" enctype="multipart/form-data">

  @csrf
  
  <h2>Fee submission</h2>
  <hr>

  	<img src="{{ url('/public/logo/ss.jpg') }}" alt="" style="width: 200px">
  	<h2>{{$payment->amount}} {{$payment->currency}}</h2>
   	<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<div id="paypal-button"></div>

  <script>


      paypal.Button.render({
    // Configure environment
    env: 'production',
    client: {
      // sandbox: 'AQRlfPLzhINs3U04aU_rVv4SvDa6CWorwoEXGtlBBI0Sjn_x9awv3119vADaCopTMZeS6EIORp1A8O7v',
     production: 'ActTolrIfEMroz61ypGC_8TlUblvrp-vbd6A_6CWcTaGjuvrgLz-oQfTUjgPGobYyPHApS8G6wuls0V1'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'gold',
      shape: 'rect',
      label: 'pay',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '<?php echo $payment->amount ?>',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        // window.alert('Thank you for your purchase!');

        $.ajax({
          url: '{{ url('/payment/success') }}',
          type: 'POST',
          data: {amount: '<?php echo $payment->amount ?>',id: '<?php echo $payment->id ?>',orderID: data['orderID'],paymentID: data['paymentID'],returnUrl: data['returnUrl']},
        })
        .done(function() {
          window.location='{{ url('/invest') }}';
        })
        .fail(function() {
          alert("Payment Failed");
        })
        .always(function() {
          console.log("complete");
        });
        

      });
    }
  }, '#paypal-button');
  </script>
<div style="text-align: center;"><a href="#" class="btn btn-primary btn-block" style="max-width: 354px;
width: 100%;
padding: 10px; margin: 10px auto">Pay With Stripe</a></div>
</form>
<form action="{{ url('/vg') }}">
  <input type="hidden" value="<?php echo $payment->amount ?>" name="amount" class="amount">
  <script src = "https://checkout.stripe.com/checkout.js" > </script> 

<script type = "text/javascript">

    $(document).ready(function() {

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

    });


$('.btn-block').click(function() {

  var amount = $('.amount').val();

  var handler = StripeCheckout.configure({

      key: 'pk_live_51Hb8lGGixg6ZQ8a5aynNMgmSG5SATEIdQeNAAbdS8bGBZX38GjWM7hO6qZu9s7PEknesDMye4URv5MCgrLlXYHd500h9cv9g6q', // your publisher key id

      locale: 'auto',

      token: function(token) {

          // You can access the token ID with `token.id`.

          // Get the token ID to your server-side code for use.

          $('#res_token').html(JSON.stringify(token));

          $.ajax({

              url: '{{ url("vg") }}',

              method: 'post',

              data: {

                  tokenId: token.id,

                  amount: amount,
                  id: '<?php echo $payment->id ?>',
                  _token: '{{csrf_token()}}',

              },

              success: (response) => {

                  window.location = '{{ url('/invest') }}';

              },

              error: (error) => {

                  console.log(error);

                  alert('Oops! Something went wrong')

              }

          })

      }

  });

  handler.open({

      name: 'Payment Demo',

      description: 'NiceSnippets',

      amount: amount * 100

  });

})


</script>

</form>
<div>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
</body>
</html>
