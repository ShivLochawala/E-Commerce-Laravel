@extends('master')
@section('content')
<div class="custom-product">
    <div>
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h2>Order Products</h2>
                @if(session()->has('user'))
                <div class="container">           
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Detail</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($CartLists as $CartList)
                        <tr>
                            <td>{{$CartList->name}}</td>
                            <td>Rs.{{$CartList->price}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td> <b>Amount</b> </td>
                            <td> <b>Rs.{{$total}}</b> </td>
                        </tr>
                        <tr>
                            <td>
                            @if($total > 300)
                                <?php $Tax = 2.5; echo "Tax(".$Tax."%)";?>
                            @else
                                <?php $Tax = 0; echo "Tax(".$Tax."%)";?>
                            @endif
                            </td>
                            <td><?php $final_tax = round($total*$Tax/100); echo $final_tax; ?></td>
                        </tr>
                        <tr>
                            <td>Delivery Charge</td>
                            <td>
                            @if($total > 300)
                                <?php $delivery = 0; echo $delivery;?>
                            @else
                                <?php $delivery = 100; echo $delivery;?>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Total Amount</b> </td>
                            <td> <b>Rs.{{$total+$delivery+$final_tax}}</b> </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @else
                    <h4>You are not login</h4>
                    <a href='/login'>You want login?</a>
                @endif
                <div class="container">
                    <form action="/buy-now">
                        <div class="form-group">
                        <label for="address">Delivery Address:</label><br>
                        <textarea class="form-control" name="address" id="" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="payment-method">Payment Method:</label><br><br>
                        <input type="radio" name="method" value="Online Payment">Online Payment<br><br>
                        <input type="radio" name="method" value="EMI Payment">EMI Payment<br><br>
                        <input type="radio" name="method" value="Online Payment">Cash on Delivery(COD)<br><br>
                        </div>
                        <button type="submit" class="btn btn-success">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')