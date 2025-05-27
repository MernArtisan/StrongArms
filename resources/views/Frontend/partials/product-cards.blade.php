@forelse($products as $product)
    <div class="col-sm-12">
        <div class="products">
            <figure><img src="{{ asset($product->image) }}" alt="" /></figure>
            <div class="contents">
                <h3>{{ $product->name }}</h3>
                <span>${{ number_format($product->price, 2) }}</span>
                <a href="#" class="btn4">Add To Cart</a>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 text-center py-5">
        <p>No products found for this category.</p>
    </div>
@endforelse
