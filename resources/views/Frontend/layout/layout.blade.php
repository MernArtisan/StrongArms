<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/icon" href="{{ asset('favicon.png') }}" />

    <!-- All css Here -->
    <link rel="stylesheet" href="{{ asset('assets/css/allplugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <meta name="robots" content="noindex, nofollow">
    <style>
        .cart-count-badge {
            position: absolute;
            top: 6px;
            right: -5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
            font-weight: bold;
            line-height: 1;
            min-width: 18px;
            text-align: left;
        }

        .modal-content {
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: #222;
            color: #fff;
            border-bottom: none;
        }

        .modal-body {
            padding: 2rem;
            font-size: 15px;
            line-height: 1.8;
        }
    </style>
</head>

<body>

    <div id="preloader">
        <div id="status">
            <img src="{{ asset('assets/images/logo/preloader.gif') }}" id="preloader_image" alt="loader">
        </div>
    </div>

    @include('Frontend.layout.header')


    @yield('content')

    {{-- @include('Frontend.partials.latestnews') --}}

    @include('Frontend.layout.footer')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('assets/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('assets/js/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.downCount.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

        @if (session('success'))
            toastr.success("{{ session('success') }}", "Success");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}", "Error");
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2zcZWYTrnjovVYwCR9zwHJwVEtUEufJk&libraries=places">
    </script>
    <script>
        function initialize() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.geometry) return;
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script>
        document.getElementById("headerserviceSearchForm").addEventListener("submit", function(e) {
            // Redirect to service tab after submit
            this.action = this.action + "#liton_service_list";
        });
    </script>




    <script>
        function refreshFullCart() {
            debugger;
            $.get("{{ route('cart.index') }}", function(response) {

                let itemsHtml = $(response).find('.view-cart-items').html();
                $('.view-cart-items').html(itemsHtml);
                // Update subtotal count
                let subtotalCount = $(response).find('#cart-subtotal-count').text();
                $('#cart-subtotal-count').text(subtotalCount);

                // Update subtotal value
                let subtotalValue = $(response).find('#cart-subtotal-value').text();
                $('#cart-subtotal-value').text(subtotalValue);

                // Update total
                let total = $(response).find('#cart-total').text();
                $('#cart-total').text(total);

                let subTotal = $(response).find('#cart-subtotal').text();
                $('#cart-subtotal').text(subTotal);

            });
        }
        // Function to load mini cart content from backend
        function loadMiniCart() {
            // debugger;
            $.ajax({
                url: "{{ route('cart.mini') }}",
                method: 'GET',
                success: function(res) {
                    let html = '';
                    if (res.cartCount > 0) {
                        html += '<ul class="product_list_widget">';
                        $.each(res.cartItems, function(index, item) {
                            html += `
                            <li class="mini_cart_item" data-rowid="${item.rowId}">
                                <a href="#">
                                    <img src="/public/${item.options.image}" alt="${item.name}" />
                                    <p class="product-name">${item.name}</p>
                                </a>
                                <p class="quantity">${item.qty} x <strong class="Price-amount">$${parseFloat(item.price).toFixed(2)}</strong></p>
                                <a href="javascript:void(0)" class="remove-item" title="Remove this item" data-rowid="${item.rowId}">x</a>
                            </li>`;
                        });

                        html += `</ul>
                                <p class="total"><strong>Subtotal:</strong> <span class="amount">$${parseFloat(res.cartTotal).toFixed(2)}</span></p>
                                <p class="buttons">
                            <a href="{{ route('cart.index') }}" class="btn1">View Cart</a>
                            <a href="{{ route('cart.checkout') }}" class="btn2">Checkout</a>
                                </p>`;
                    } else {
                        html = '<p class="text-center">Your cart is empty.</p>';
                    }

                    $('.widget_shopping_cart_content').html(html);


                    $('#cart-count').text(res.cartCount);
                }

            });
        }

        $(document).ready(function() {
            loadMiniCart();
        });


        // function renderMiniCart(cartItems, cartTotal) {

        //     let html = '';
        //     if (cartItems.length > 0) {
        //         html += '<ul class="product_list_widget">';
        //         $.each(cartItems, function(index, item) {
        //             html += `
    //     <li class="mini_cart_item" data-rowid="${item.rowId}">
    //         <a href="#">
    //             <img src="/${item.options.image}" alt="${item.name}" />
    //             <p class="product-name">${item.name}</p>
    //         </a>
    //         <p class="quantity">${item.qty} x <strong class="Price-amount">$${item.price}</strong></p>
    //         <a href="javascript:void(0)" class="remove-item" title="Remove this item" data-rowid="${item.rowId}">x</a>
    //     </li>`;
        //         });
        //         html += `</ul>
    // <p class="total"><strong>Subtotal:</strong> <span class="amount">${cartTotal}</span></p>
    // <p class="buttons">
    //     <a href="{{ route('cart.index') }}" class="btn1">View Cart</a>
    //     <a href="#" class="btn2">Checkout</a>
    // </p>`;
        //     } else {
        //         html = '<p class="text-center">Your cart is empty.</p>';
        //     }

        //     $('.widget_shopping_cart_content').html(html);
        // }

        $(document).on('click', '.remove-item', function() {
            let rowId = $(this).data('rowid');

            $.ajax({
                url: "{{ route('cart.remove') }}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Removed!',
                        text: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    refreshFullCart();
                    loadMiniCart();

                }
            });
        });

        $(document).on('click', '.add-to-cart-btn', function(e) {
            e.preventDefault();

            let btn = $(this);
            let form = btn.closest('form.add-to-cart-form');
            let productId = btn.data('id');
            let quantity = form.find('input[name="quantity"]').val() || 1;

            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId,
                    quantity: parseInt(quantity)
                },
                success: function(res) {
                    loadMiniCart(); // Your existing function to update mini cart UI
                    if (res.status === 'added') {
                        toastr.success('Added to cart!');
                    } else if (res.status === 'updated') {
                        toastr.info('Cart updated successfully.');
                    } else {
                        toastr.success(res.message);
                    }
                },
                error: function() {
                    toastr.error('Failed to add product to cart');
                }
            });
        });
    </script>
    <script>
        $(document).on('change', '.update-cart-qty', function() {
            let rowId = $(this).data('rowid');
            let qty = $(this).val();

            $.ajax({
                url: "{{ route('cart.update') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    rowId: rowId,
                    quantity: qty
                },
                success: function(res) {
                    toastr.success(res.message);
                    // Refresh cart HTML and totals
                    refreshFullCart();
                    loadMiniCart(); // already defined in layout
                }
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
