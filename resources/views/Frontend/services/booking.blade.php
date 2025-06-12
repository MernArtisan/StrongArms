@extends('Frontend.layout.layout')

@section('title', 'Booking')

@section('content')

    <!-- Your CSS same -->
    <style>
        .weapon-gallery .main-image {
            width: 100%;
            height: 450px;
            overflow: hidden;
            border: 2px solid #555;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #111;
        }

        .weapon-gallery .main-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
        }

        .date-strip .date-btn.active {
            background-color: #0d6efd !important;
            color: #fff !important;
            border-color: #0d6efd !important;
        }

        .date-strip {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px 0;
        }

        .date-strip .date-btn {
            display: inline-block;
            margin: 0 5px;
        }
    </style>

    <!-- Breadcumb same -->
    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content">
                            <h2>Service Detail</h2>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="javascript:void(0)">Service Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Service Booking -->
    <section class="weapon-service-detail section">
        <div class="container">
            <div class="row">
                <!-- Image -->
                <div class="col-lg-6">
                    <div class="weapon-gallery">
                        <div class="main-image mb-4">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="img-fluid rounded"
                                id="mainWeaponImage">
                        </div>
                    </div>
                </div>

                <!-- Details -->
                <div class="col-lg-6">
                    <div class="weapon-info">
                        <h1 class="weapon-title">{{ $service->name }}</h1>
                        <div class="weapon-meta mb-4">
                            <span class="badge bg-primary">{{ ucfirst($service->type) }}</span>
                            <span class="badge bg-success">Price: ${{ number_format($service->price, 2) }}</span>
                        </div>

                        <div class="service-pricing mb-4">
                            <h3 class="pricing-title">Description</h3>
                            <p>{!! nl2br(e($service->description)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointment Slots Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="appointment-section">
                        <h3 class="section-title mb-4">Available Time Slots</h3>

                        <div class="date-selector mb-4">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-secondary date-nav" onclick="changeDate(-1)">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <h4 class="current-date"></h4>
                                <button class="btn btn-outline-secondary date-nav" onclick="changeDate(1)">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <div class="time-slots">
                            <div class="row">
                                <!-- Dynamic slots will be inserted here by JS -->
                            </div>
                        </div>

                        <!-- Appointment Button -->
                        <form method="POST" action="{{ route('appointment') }}">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <input type="hidden" name="time_slot" id="selectedTimeInput" value="">

                            <div class="appointment-action text-center mt-4" id="appointmentAction" style="display: none;">
                                <div class="selected-slot-info mb-3">
                                    <h4>Selected Slot: <span id="selectedSlotTime">None</span></h4>
                                </div>
                                <button type="submit" class="btn1">
                                    <i class="fas fa-calendar-check me-2"></i>Make Appointment
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
        const availability = @json($availability->groupBy('date'));
        const availableDates = @json($availableDates);
        let currentIndex = 0;
        let selectedSlot = null;

        function updateDateDisplay() {
            const currentDate = availableDates[currentIndex];
            document.querySelector('.current-date').textContent = moment(currentDate).format('dddd, MMMM D, YYYY');

            const slots = availability[currentDate] || [];
            const container = document.querySelector('.time-slots .row');
            container.innerHTML = '';

            if (slots.length === 0) {
                container.innerHTML = '<p class="text-center">No time slots available for this date.</p>';
            } else {
                // Group slots
                const groups = {
                    Morning: [],
                    Afternoon: [],
                    Evening: []
                };

                slots.forEach(slot => {
                    const time = slot.time_slot;
                    const hour24 = convertTo24Hour(time.split('-')[0].trim());

                    if (hour24 < 12) {
                        groups.Morning.push(slot);
                    } else if (hour24 >= 12 && hour24 < 17) {
                        groups.Afternoon.push(slot);
                    } else {
                        groups.Evening.push(slot);
                    }
                });

                // Render groups
                Object.entries(groups).forEach(([groupName, groupSlots]) => {
                    if (groupSlots.length > 0) {
                        const col = document.createElement('div');
                        col.className = 'col-md-4 mb-3';

                        const header = document.createElement('h5');
                        header.className = 'time-slot-header';
                        header.textContent = groupName;

                        const slotList = document.createElement('div');
                        slotList.className = 'slot-list';

                        groupSlots.forEach(slot => {
                            const button = document.createElement('button');
                            button.className = 'time-slot btn btn-outline-primary w-100 mb-2';
                            button.textContent = slot.time_slot;
                            button.onclick = function() {
                                selectSlot(this, slot.time_slot);
                            };
                            slotList.appendChild(button);
                        });

                        col.appendChild(header);
                        col.appendChild(slotList);
                        container.appendChild(col);
                    }
                });
            }
        }

        function convertTo24Hour(timeStr) {
            const [time, modifier] = timeStr.split(' ');
            let [hours, minutes] = time.split(':').map(Number);

            if (modifier === 'PM' && hours !== 12) {
                hours += 12;
            }
            if (modifier === 'AM' && hours === 12) {
                hours = 0;
            }
            return hours;
        }

        function changeDate(days) {
            currentIndex += days;

            if (currentIndex < 0) currentIndex = 0;
            if (currentIndex >= availableDates.length) currentIndex = availableDates.length - 1;

            updateDateDisplay();
        }

        function selectSlot(element, time) {
            document.querySelectorAll('.time-slot').forEach(slot => {
                slot.classList.remove('active');
            });

            element.classList.add('active');
            selectedSlot = time;

            document.getElementById('selectedSlotTime').textContent = time;
            document.getElementById('appointmentAction').style.display = 'block';

            // Update form hidden input:
            document.getElementById('selectedTimeInput').value = time;
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateDateDisplay();
        });
    </script>

@endsection
