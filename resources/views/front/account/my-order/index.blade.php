
@extends('front.layout.master')

@section('title', 'My Order')

@section('body')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"> Home</i></a>
                        <span>My Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- My Order Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>IMAGES</th>
                                    <th style="width: 110px">ID</th>
                                    <th class="p-name">PRODUCTS</th>
                                    <th>TOTAL</th>
                                    <th>DETAILS</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td class="cart-pic first-row">
                                        <center><img style="height: 140px; "
                                                src="front/img/products/{{ $order->orderDetails[0]->product->productImages[0]->path }}"
                                                alt=""
                                        ></center>
                                    </td>
                                    <td class="first-row">#{{ $order->id }}</td>
                                    <td class="cart-title first-row">
                                        <h5>
                                            {{ $order->orderDetails[0]->product->name }}

                                            @if(count($order->orderDetails) > 1)
                                                (and {{ count($order->orderDetails) }} other products)
                                            @endif

                                        </h5>
                                    </td>
                                    <td class="cart-total first-row">
                                        {{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}đ
                                    </td>
                                    <td class="first-row">
                                        <a class="btn" href="./account/my-order/{{ $order->id }}">Details</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Order Section End -->


@endsection