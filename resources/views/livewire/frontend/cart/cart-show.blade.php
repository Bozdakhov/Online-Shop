<div>
    @if ($cart->isEmpty())
        <div class="fs-1 fw-bold text-center" style="margin-top: 15%">Hech narsa topilmadi!</div>
    @else
        <div class="py-3 py-md-5 bg-light ">
            <div class="container-xxl shadow">
                <h4>My Cart</h4>

                <div class="row ">
                    <div class="col-md-12">
                        <div class="shopping-cart ">

                            <div class="cart-header d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-md-1">
                                        <h4>Color</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Quantity</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Total</h4>
                                    </div>
                                    <div class="col-md-1">
                                        <h4>Remove</h4>
                                    </div>
                                </div>
                            </div>

                            @forelse ($cart as $cartItem)
                                <div class="cart-item ">
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            <a
                                                href="{{ url('collections/' . $cartItem->product->category->slug . '/' . $cartItem->product->slug) }}">
                                                <label class="product-name">

                                                    @if ($cartItem->product->productImages)
                                                        <img src="{{ asset($cartItem->product->productImages[0]->image) }}"
                                                            style="width: 50px; height: 50px" alt=""
                                                            class="">
                                                    @else
                                                        <img src="" style="width: 50px; height: 50px"
                                                            alt="">
                                                    @endif

                                                    {{ $cartItem->product->name }}
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            @if ($cartItem->productColor)
                                                @if ($cartItem->productColor->color)
                                                    <label>{{ $cartItem->productColor->color->name }}</label>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">{{ $cartItem->product->selling_price }} UZS</label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <span class="btn btn1"
                                                        wire:click="decrementQuantity({{ $cartItem->id }})"><i
                                                            class="fa fa-minus"></i></span>
                                                    <input type="text" value="{{ $cartItem->quantity }}" readonly
                                                        class="input-quantity" />
                                                    <span class="btn btn1"
                                                        wire:click="incrementQuantity({{ $cartItem->id }})"><i
                                                            class="fa fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label
                                                class="price">{{ $cartItem->product->selling_price * $cartItem->quantity }}
                                                UZS
                                            </label>
                                            @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity @endphp
                                        </div>
                                        <div class="col-md-1 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:click="removeCartItem({{ $cartItem->id }})"
                                                    class="btn btn-outline-danger btn-sm">
                                                    <span wire:loading.remove
                                                        wire:target="removeCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading
                                                        wire:target="removeCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Removing
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach



                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 my-md-auto mt-3">
                        <h5>
                            Get the best deals & Offers <a href="{{ url('/collections') }}"
                                class="btn btn-success text-white"><i class="bi bi-cart4"></i> Shop Now</a>
                        </h5>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="shadow-sm bg-white p-3">
                            <h4>Total:
                                <span class="float-end">{{ $totalPrice }}</span>
                            </h4>
                            <hr>
                            <a href="{{ url('/checkout') }}" class="btn w-100 text-white"
                                style="background-color: rgb(22 163 74) ;">Checkout</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif
</div>
