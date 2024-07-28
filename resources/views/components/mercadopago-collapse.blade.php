<div class="payment-method-details" data-method="{{ $paymentPlatform->id }}">
    <label class="mt-3">Detalles de la tarjeta:</label>

    <div class="form-group form-row mb-3">
        <div class="col-6 single-input-item">
            <div id="cardNumber"></div>
        </div>
        <div class="col-3 single-input-item">
            <div id="expirationDate"></div>
        </div>
        <div class="col-3 single-input-item">
            <div id="securityCode"></div>
        </div>
    </div>

    <div class="form-group form-row mb-3">
        <div class="col-6 single-input-item">
            <input type="text" id="cardholderName" data-checkout="cardholderName" placeholder="Tu nombre">
        </div>
        <div class="col-6 single-input-item">
            <input type="email" data-checkout="cardholderEmail" placeholder="Correo electrónico" name="email">
        </div>
    </div>

    <div class="form-group form-row mb-3">
        <div class="col-4 single-input-item">
            <select class="nice-select" id="docType" name="docType" data-checkout="docType" type="text">
            </select>
        </div>
        <div class="col-8 single-input-item">
            <input id="docNumber" name="docNumber" data-checkout="docNumber" type="text"
                placeholder="Número de Documento" />
        </div>
    </div>

    <div class="form-group form-row">
        <div class="col">
            <small class="form-text text-mute" role="alert">Su pago se convertirá a
                {{ strtoupper(config('services.mercadopago.base_currency')) }}</small>
        </div>
    </div>

    <div class="form-group form-row">
        <div class="col">
            <small class="form-text text-danger" id="paymentErrors" role="alert"></small>
        </div>
    </div>

    <input type="hidden" id="cardToken" name="card_token">
    <input type="hidden" id="cardNetwork" name="card_network">
</div>

@push('scripts')
    {!! Html::script('https://sdk.mercadopago.com/js/v2') !!}

    <script>
        const mp = new MercadoPago('{{ config('services.mercadopago.key') }}');

        (async function getIdentificationTypes() {
            try {
                const identificationTypes = await mp.getIdentificationTypes();
                const identificationTypeElement = document.getElementById('docType');
                createSelectOptions(identificationTypeElement, identificationTypes);
            } catch (e) {
                console.error('Error getting identificationTypes: ', e);
            }
        })();

        function createSelectOptions(elem, options, labelsAndKeys = { label: "name", value: "id" }) {
            const { label, value } = labelsAndKeys;
            elem.options.length = 0;

            const tempOptions = document.createDocumentFragment();
            options.forEach(option => {
                const optValue = option[value];
                const optLabel = option[label];

                const opt = document.createElement('option');
                opt.value = optValue;
                opt.textContent = optLabel;

                tempOptions.appendChild(opt);
            });
            elem.appendChild(tempOptions);
        }

        const cardNumberElement = mp.fields.create('cardNumber', {
            placeholder: "Número de tarjeta"
        }).mount('cardNumber');

        const expirationDateElement = mp.fields.create('expirationDate', {
            placeholder: "MM/AA",
        }).mount('expirationDate');

        const securityCodeElement = mp.fields.create('securityCode', {
            placeholder: "CVV"
        }).mount('securityCode');

        cardNumberElement.on('binChange', async function(data) {
            try {
                const { bin } = data;
                const { results } = await mp.getPaymentMethods({ bin });
                const cardNetwork = results[0].payment_method_id;
                document.getElementById('cardNetwork').value = cardNetwork;
            } catch (e) {
                console.error('Error getting payment methods: ', e);
            }
        });

        document.getElementById('paymentForm').addEventListener('submit', async function(event) {
            event.preventDefault();
            let form = document.getElementById('paymentForm');
            const token = await mp.fields.createCardToken({
                cardholderName: document.getElementById('cardholderName').value,
                identificationType: document.getElementById('docType').value,
                identificationNumber: document.getElementById('docNumber').value,
            });
            setCardTokenAndPay(token.id);
        });

        function setCardTokenAndPay(token) {
            let form = document.getElementById('paymentForm');
            let cardToken = document.createElement('input');
            cardToken.setAttribute('name', 'token');
            cardToken.setAttribute('type', 'hidden');
            cardToken.setAttribute('value', token);
            form.appendChild(cardToken);
            form.submit();
        }
    </script>
@endpush
