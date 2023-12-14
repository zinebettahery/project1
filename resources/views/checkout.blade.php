@extends('layouts.app')

@section('title', 'Checkout')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Checkout</h2>
        </div>
    </section>
    <section class="section-content bg padding-yco">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form id="place-order-form" action="{{ url('place-order') }}" method="POST" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Billing Details</h4>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="col form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastname }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="adresse" value="{{ Auth::user()->adresse }}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ Auth::user()->country }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <label>Post Code</label>
                                        <input type="text" class="form-control" name="codepostal" value="{{ Auth::user()->codepostal }}">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="tele" value="{{ Auth::user()->tele }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Your Order</h4>
                                    </header>
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt>Total cost: </dt>
                                            <dt>{{ $total }} DH</dt>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                
                                    <div id="card-element"></div>
                                    <div id="card-errors" role="alert"></div>
                                    <button type="submit" class="subscribe btn btn-success w-100 mt-3">Payer</button>
                              
                                
                                <div class="col-md-12 mt-4">
    
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('place-order-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('place-order-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>


                            </div>
                          
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    
      
@endsection
