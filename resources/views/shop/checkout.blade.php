@extends('layouts.master')

@section('title')
	Shopping Cart
@endsection

@section('content')

	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<h1>Checkout</h1>
			<h4>Your Total Rs.{{ $total }}</h4>
			<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''}}">
				{{ Session::get('error') }}
			</div>
			<form action="{{ route('checkout') }}" method="post" id="checkout-form">
			<div class="row">
				<div id="card-element">
				
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn-btn-primary">Buy Now</button>
				<div id="card-errors" role="alert"></div>
  			</div>
			</div>
			
			
			</form>
		</div>
	</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
// Create a Stripe client
var stripe = Stripe('pk_test_qF1AtSqdRtPNYWZoHZUNV0WN');

// Create an instance of Elements
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '24px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission
var form = document.getElementById('checkout-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('checkout-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection