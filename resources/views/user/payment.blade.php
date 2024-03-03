@include('user.header')
<div style="width: 100%;height: auto;padding-top: 150px">
    <div  style="width:90%;height:auto;background-color: rgb(206, 197, 197) ;margin: auto;display: flex;padding: 20px;">


        <div style="width: 45%;height: auto;background-color: rgb(224, 224, 233);margin-right: 100px" >


  <div style="width: 100%;height: auto;background-color: rgb(179, 179, 173);padding: 20px;">
 @if (session()->has('coupon'))

    <div class="d-flex align-items-center justify-content-between mb-2">
        <p style="font-weight: bold;margin-bottom: 5px">Subtotal: {{ session()->get('coupon')['discount'] }} </p>
        <p><span class="fas fa-dollar-sign"></span></p>
    </div>
    <div class="d-flex align-items-center justify-content-between mb-2">
        <div class="d-flex align-items-center">
            <p style="font-weight: bold;margin-bottom: 5px" class="pe-2">Voucher Code : {{ session()->get('coupon')['name'] }}
                <span class="d-inline-flex align-items-center justify-content-between bg-light px-2 couponCode"> <span id="code" class="pe-2"> </span>

        </div>
        <p><span class="fas fa-dollar-sign"></span></p>
    </div>
    {{-- <div  class="d-flex align-items-center justify-content-between mb-2">
        <p style="font-weight: bold;margin-bottom: 5px">VAT<span></span></p>
        <p><span class="fas fa-dollar-sign"></span></p>
    </div> --}}
    <div  class="d-flex align-items-center justify-content-between mb-2">
        <p style="font-weight: bold;margin-bottom: 5px" class="fw-bold">Total: {{session()->get('coupon')['discount'] - (session()->get('coupon')['discount'] * session()->get('coupon')['value']) /100   }} </p>
        <p class="fw-bold"><span class="fas fa-dollar-sign"></span></p>
    </div>
    <form method="POST" action="{{ url('remove') }}">
        @csrf
    <div  class="d-flex align-items-center justify-content-between mb-2">
        <button class="btn btn-success" name="submit" type="submit">Remove</button>
    </div>
</form>
@else
    <div>
    <form method="POST" action="{{ url('voucher') }}">
        @csrf
    <div class="my-3">
        <p style="font-weight: bold;margin-bottom: 5px" class="dis fw-bold mb-2">Discount Code</p> <input name="discount" class="form-control text-uppercase" type="text" value="" id="discount">
        <button class="btn btn-success active" style="margin: 5px" type="submit" name="enter">Enter</button>
    </div>
    </form>
</div>
 @endif
            </div>


    </div>











        <div style="width: 40%;height: auto;background-color: rgb(195, 187, 187);padding: 20px" >
            <div class="box-inner-2">
                <div>
                    <p style="font-weight: bold;margin-bottom: 5px" class="fw-bold">Payment Details</p>
                    <p style="font-weight: bold;margin-bottom: 5px" class="dis mb-3">Complete your purchase by providing your payment details</p>
                </div>
                <form method="POST" action="{{ url('payment') }}">
                    @csrf
                    <div class="mb-3">
                        <p style="font-weight: bold;margin-bottom: 5px" class="dis fw-bold mb-2">Email address</p> <input class="form-control" name="email" type="email" value="">
                    </div>
                    <div class="address">
                        <p style="font-weight: bold;margin-bottom: 5px" class="dis fw-bold mb-3">Payment Type</p>
                        <select style="font-weight: bold;margin-bottom: 5px" name="paymentType" class="form-select" aria-label="Default select example"> <option selected value="Credit Card">Credit Card</option> <option value="Master Card">Master Card</option> <option value="Cash On Delivery">Cash On Delivery</option> <option value="Fawry">Fawry</option> </select>

                        </div>

                        <div class="address">
                            <p style="font-weight: bold;margin-bottom: 5px" class="dis fw-bold mb-3">Address</p>
                            <select style="font-weight: bold;margin-bottom: 5px" name="city" class="form-select" aria-label="Default select example"> <option selected hidden value="Cairo">Cairo</option> <option value="Giza">Giza</option> <option value="Alexandria">Alexandria</option> <option value="Elmansoura">Elmansoura</option> </select>
                            <div class="d-flex">  <input class="form-control state" name="region" type="text" placeholder="Region">

                            </div>
                            <div class="d-flex">  <input class="form-control state" type="text" name="street" placeholder="Street">

                            </div>




                            <button class="btn btn-primary mt-2 active" type="submit" name="pay">Pay
                            </button>
                        </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>


    </div>

</div>
    @include('user.footer')













