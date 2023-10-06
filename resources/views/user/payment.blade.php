@extends('layouts.app')

@section('title','JM Rentcar')

@section('content')

<div class="container-fluid">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-9Kth_vn9qLnTLdae"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <div class="card mx-auto" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('img/payment.jpg')}}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">Lanjutkan pembayaran anda pilih metode pembayaran yang anda gunakan</p>
            <button type="submit" class="btn btn-info" id="pay-button">Checkout</button>
        </div>
    </div>



    <form action="" id="submit_form" method="POST">
        @csrf
        <input type="hidden" name="json" id="json_callback">
    </form>

</div>


<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                alert("payment success!");
                send_response_to_form(result)
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                send_response_to_form(result)
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                csend_response_to_form(result)
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });

    function send_response_to_form(result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
    }
</script>
@endsection