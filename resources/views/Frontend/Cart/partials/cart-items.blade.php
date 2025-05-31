<div class="cart-container">
                        @if ($cartItems->count() > 0)
                            <div class="view-cart-items">
                                @foreach ($cartItems as $item)
                                    <div class="cart-item d-flex justify-content-between align-items-center py-2 border-bottom"
                                        data-rowid="{{ $item->rowId }}">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($item->options->image) }}" width="60"
                                                alt="{{ $item->name }}">
                                            <div class="ms-3">
                                                <p class="mb-0 fw-bold">{{ $item->name }}</p>
                                                <p class="mb-0">Price: ${{ number_format($item->price, 2) }}</p>
                                            </div>
                                        </div>

                                        <div>
                                            <input type="number" class="form-control update-cart-qty"
                                                data-rowid="{{ $item->rowId }}" value="{{ $item->qty }}" min="1"
                                                style="width: 80px;">
                                        </div>

                                        <div>
                                            <p class="mb-0">Total: ${{ $item->price * $item->qty }}</p>
                                        </div>

                                        <div>
                                            <a href="javascript:void(0)" class="remove-item btn btn-sm btn-danger"
                                                title="Remove item" data-rowid="{{ $item->rowId }}">
                                                <i class="fas fa-trash-alt">
                                                </i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="cart-summary mt-4" style="color:#ddd">
                                <h5>Subtotal: $<span id="cart-subtotal">{{ $cartTotal }}</span></h5>
                            </div>
                        @else
                            <p>Your cart is empty.</p>
                        @endif
                    </div>