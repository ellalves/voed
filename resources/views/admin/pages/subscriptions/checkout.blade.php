@extends('adminlte::page')

@section('title', __("Make the payment") )

@section('content_header')
    {{-- {{ Breadcrumbs::render('productsCreate') }} --}}
    <h1> {{ __("Make the payment") }} </h1>
@stop

@section('content')
    <div class="card">
        <div class="div card-header">
            <div class="callout callout-info">
                <h5>{{ __("You are signing") }}</h5>

                <p>{{ $plan->name }}</p>
            </div>
        </div>

        <div class="card-body">
            <div id="show-errors" style="display: none;" class="my-2 text-sm text-red-dark"></div>

            <form action="{{ route('subscriptions.store') }}" method="POST" id="form">
                @csrf
                <div class="input-group mb-3">
                    <input id="card-holder-name" type="text" class="form-control bg-white text-black"
                        placeholder="{{ __("Holder's name, as it is on the card") }}">
                </div>

                <div id="card-element" class="rounded p-2 bg-white border-gray-100"></div>

                <div class="input-group mt-3">
                    <button id="card-button" data-secret="{{ $intent->client_secret }}" type="submit"
                        class="btn btn-success">
                        {{ __("Confirm payment") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe("{{ config('cashier.key') }}");
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const showErrors = document.getElementById('show-errors')

        // subscription payment
        const form = document.getElementById('form')
        const cardHolderName = document.getElementById('card-holder-name')
        const cardButton = document.getElementById('card-button')
        const clientSecret = cardButton.dataset.secret

        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            // Disable button
            cardButton.classList.add('cursor-not-allowed')
            cardButton.firstChild.data = '{{ __("checking the data") }}'
            // reset errors
            showErrors.innerText = ''
            showErrors.style.display = 'none'

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            )

            if (error) {
                console.log(error)
                const errData = "{{__("Invalid data, please check and try again")}}"
                showErrors.style.display = 'block'
                showErrors.innerText = (error.type == 'validation_error') ? error.message : errData

                cardButton.classList.remove('cursor-not-allowed')

                return;
            }

            let token = document.createElement('input')
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)

            form.appendChild(token)

            form.submit()
        });

    </script>
@endpush
