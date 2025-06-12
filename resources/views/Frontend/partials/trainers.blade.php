@isset($providers)
    @if ($providers->count())
        <section class="price-area section bg-img jarallax">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-heading">
                            <h2>Trainers</h2>
                            <p>We offer flexible and affordable training packages for every skill level — from first-time
                                gun
                                owners to advanced tactical operators. Each session is conducted by certified instructors in
                                secure, professional environments. <br>Explore our most popular options:</p>
                        </div>
                    </div>
                </div>

                <!-- Weapons Providers Section -->
                <div class="row all-provider">
                    @foreach ($providers as $provider)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="provider-card h-100">
                                <div class="provider-img-container">
                                    <img src="{{ asset($provider->logo ? $provider->logo : 'assets/images/default-provider.jpg') }}"
                                        alt="{{ $provider->store_name }}" class="img-fluid provider-weapon-img">
                                </div>
                                <div class="provider-body">
                                    <h3 class="provider-title">{{ $provider->store_name }}</h3>
                                    <div class="provider-details">
                                        <div class="provider-info">
                                            <div class="provider-name">
                                                <i class="fas fa-user"></i>
                                                <span>{{ $provider->owner_name }}</span>
                                            </div>
                                            {{-- @if ($provider->established_year)
                                                <div class="provider-exp">
                                                    <i class="fas fa-trophy"></i>
                                                    <span>{{ now()->year - $provider->established_year }} Years
                                                        Experience</span>
                                                </div>
                                            @endif --}}
                                        </div>
                                        <div class="provider-contact">
                                            <div class="provider-phone">
                                                <i class="fas fa-phone"></i>
                                                <span>{{ $provider->phone_number ?? 'N/A' }}</span>
                                            </div>
                                            <div class="provider-email">
                                                <i class="fas fa-envelope"></i>
                                                <span>{{ $provider->email ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="provider-features">
                                        <ul>
                                            <li><i class="fas fa-check"></i> Home Defense</li>
                                            <li><i class="fas fa-check"></i> Tactical Drills</li>
                                            <li><i class="fas fa-check"></i> Concealed Carry</li>
                                        </ul>
                                    </div>
                                    <div class="provider-action">
                                        <a href="{{ route('provider.service', $provider->id) }}"
                                            class="btn btn-provider">View
                                            {{-- <a href="{{ route('provider.services', $provider->id) }}" class="btn btn-provider">View --}}
                                            Service</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 col-sm-12">
                        <div class="load-btn text-center mr-t80">
                            <a href="{{ route('trainers') }}" class="btn1">View All</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif
@endisset
