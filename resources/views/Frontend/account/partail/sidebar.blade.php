<div class="col-lg-4 mb-4 mb-lg-0">
    <div class="account-order-sidebar account-order-card">
        <ul class="account-order-sidebar-menu">
            <li><a href="{{ route('account.profile') }}" class="my-profile-active"><i class="fas fa-user"></i> My
                    Profile</a>
            <li><a href="{{ route('account.order') }}"><i class="fas fa-shopping-cart"></i> My Orders</a></li>
            <li><a href="account-booking.php"><i class="fas fa-calendar-check"></i> Booking</a></li>
            </li>
            @php $user = Auth::user(); @endphp

            <li>
                <a href="{{ route('account.edit') }}">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
            </li>
            <!-- <li><a href="#"><i class="fas fa-id-card"></i> FFL License</a></li> -->
            <li><a href="wishlist.php"><i class="fas fa-heart"></i> Wishlist</a></li>
            <li><a href="{{route('account.changePassword')}}"><i class="fas fa-lock"></i> Change Password</a></li>
            <!--  <li><a href="#"><i class="fas fa-book"></i> Training Courses</a></li> -->
            <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
</div>
