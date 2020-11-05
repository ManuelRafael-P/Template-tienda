<div class="content">
    <div class="container">
        <br>
        <p><?php echo $precio_soles; ?></p>
        <p><?php echo $precio_dolares; ?></p>
        <br>
        <div id="paypal-button-container"></div>
    </div>
</div>

<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout', // checkout | credit | pay | buynow | generic
            size: 'responsive', // small | medium | large | responsive
            shape: 'pill', // pill | rect
            color: 'gold' // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox: 'AeEuw68gqJE7FXY1AmOQ6Ulo1IaM5iBpj5NIDeu3dFKAEADC_yk-xZ3PQkql4dcfdRQaRX3wVBjHuNpk',
            production: 'AZDc2besgZM73x6XtJe3tZ8YOBPR7Un1Hq5DLB1s0oXq41j6zos-0ctx3KuoP8WFz-D9H7-8W4ytC9_Q'
        },

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [{
                        amount: {
                            total: '<?php echo $precio_dolares ?>',
                            currency: 'USD'
                        },
                        description: "Compra de productos a Warning : $<?php echo $precio_dolares; ?>",
                        custom: "<?php echo $SID ?>#<?php echo $IdVenta; ?>"
                    }]
                }
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                window.location = "index.php?c=pago&a=Verificar&paymentToken=" + data.paymentToken + "&paymentID=" + data.paymentID;
            });
        }

    }, '#paypal-button-container');
</script>