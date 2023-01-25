@extends('back-layouts/master')
@section('page', 'Courses')
@section('title', 'Payment')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <!--begin::details View-->
                <div class="card mt-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Make payment</h3>
                        </div>
                        <!--end::Card title-->
                    </div>


                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <div class="row mb-8">
                            <h4 class="fw-bolder text-center">Select your payment method : </h4>
                        </div>
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <!--begin::Row-->

                        <form action="{{ route('make-payment-post' , $invoice->invoice_id) }}" method="POST" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="checkout-form">
                            @csrf                            
                            <div class="col">
                                <div class="row mb-7">
                                    <input type='hidden' name='stripeToken' id='stripe-token-id'>                              

                                    <div id="card-element" class="form-control" ></div>
                                </div>
                            </div>
                            <!--end::Row-->
                            <button type="submit" id="pay-btn" class="btn btn-lg btn-primary float-end" >Pay RM {{ $subjects->sum('price') }}.00                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Credit-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                        <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                        <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                                <!--end::Svg Icon-->
                            </button>
                        </form>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->
            </div>
            <div class="col-md-5">
                <!--begin::details View-->
                <div class="card mt-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Invoice detail</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <div class="card-body p-9">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <tbody>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <!--begin::Label-->
                                                <label class="col fw-bold mx-3">Invoice ID</label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Row-->
                                        </td>
                                        <td>
                                            <div class="row">
                                                <!--begin::Label-->
                                                <label class="col fw-bold mx-3">{{ $invoice->invoice_id }}</label>

                                                <!--end::Label-->
                                            </div>
                                            <!--end::Row-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <!--begin::Label-->
                                                <label class="col fw-bold mx-3">Invoice Date</label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Row-->
                                        </td>
                                        <td>
                                            <div class="row">
                                                <!--begin::Label-->
                                                <label class="col fw-bold mx-3">{{ $invoice->date }}</label>

                                                <!--end::Label-->
                                            </div>
                                            <!--end::Row-->
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="fw-bolder">Courses</th>
                                    <th scope="col" class="fw-bolder">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <!--begin::Label-->
                                                <label class="col fw-bold mx-3">{{ $subject->subject_name }}</label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Row-->
                                        </td>
                                        <td>
                                            <div class="row">
                                                <!--begin::Label-->
                                                <label class="col fw-bold" id="subject-{{ $subject->id }}"
                                                    value="{{ $subject->price }}"> RM {{ $subject->price }}</label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Row-->
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        <div class="row">
                                            <!--begin::Label-->
                                            <label class="col fw-bold mx-3 text-danger">Total : </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Row-->
                                    </td>
                                    <td>
                                        <div class="row">
                                            <!--begin::Label-->
                                            <label class="col fw-bold text-danger">RM {{ $subjects->sum('price') }}.00</label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Row-->
                                    </td>
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->
            </div>

        </div>
    </div>

@endsection

@section('stripe')
<script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}')
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');
  
        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
  
                  
                if(typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }
  
                // creating token success
                if(typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
        stripe.confirmPayment({
            elements,
            confirmParams: {
                // Return URL where the customer should be redirected after the PaymentIntent is confirmed.
                return_url: 'https://example.com',
            },
            })
            .then(function(result) {
            if (result.error) {
                // Inform the customer that there was an error.
            }
        });
    </script>
@endsection
