@extends('Frontend.account.myprofile')

@section('profile-content')
    <style>
        .my-profile-info-value {
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .my-profile-info-item {
            min-width: 0;
            flex: 1;
        }

        /* Optional: Responsive design fix for grid */
        .my-profile-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .my-profile-info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="col-lg-8">
        <div class="my-profile-card mb-4">
            <div class="my-profile-section">
                <h5 class="my-profile-section-title">
                    <i class="fas fa-info-circle"></i> Personal Information
                </h5>
                <div class="my-profile-info-grid">
                    <div class="my-profile-info-item">
                        <div class="my-profile-info-label">Full Name:</div>
                        <div class="my-profile-info-value">{{ Auth::user()->name }}</div>
                    </div>

                    {{-- <div class="my-profile-info-item">
                        <div class="my-profile-info-label">Call Sign:</div>
                        <div class="my-profile-info-value">Reaper</div>
                    </div> --}}

                    <div class="my-profile-info-item">
                        <div class="my-profile-info-label">Website:</div>
                        <div class="my-profile-info-value">{{ Auth::user()->website }}</div>
                    </div>

                    <div class="my-profile-info-item">
                        <div class="my-profile-info-label">Contact Email:</div>
                        <div class="my-profile-info-value">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="my-profile-info-item">
                        <div class="my-profile-info-label">Phone:</div>
                        <div class="my-profile-info-value">{{ Auth::user()->phone }}</div>
                    </div>

                    <div class="my-profile-info-item">
                        <div class="my-profile-info-label">Address:</div>
                        <div class="my-profile-info-value">{{ Auth::user()->address_line }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
