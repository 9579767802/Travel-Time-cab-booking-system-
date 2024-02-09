$(document).ready(function () {
    $('#searchBtn').on('click', function () {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();

        $.ajax({
            url: $('#booking_form').attr('action'),
            type: 'POST',
            data: { 'from_date': from_date, 'to_date': to_date, start_time: start_time, end_time: end_time },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                let cardHtml = '';

                data.data.forEach(function (result) {
                    cardHtml += `
                    <div class="col-md-6"> <!-- Adjust the column size based on your design -->
                        <div class="card mb-3">
                            <img src="${result.image}" class="card-img-top" alt="Vehicle Images">
                            <div class="card-body">
                                <h5 class="card-title">${result.model_name}</h5>
                                <p class="card-text">Vehicle Number: ${result.vehicle_no}</p>
                                <p class="card-text">Passenger Capacity: ${result.passenger_capacity}</p>
                               

                                <button class="btn btn-success book-btn" data-id="${result.id}">Book</button>
                            </div>
                        </div>
                    </div>`;
                });

                $('#searchResult').html(cardHtml);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $(document).on('click', '.book-btn', function () {
        var vehicle_id = $(this).data('id');
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();
        var from_location = $('#from_location').val();
        var to_location = $('#to_location').val();
        var driver_id = 6;

        $.ajax({
            url: baseUrl + '/bookings/book-user/' + vehicle_id + '/' + driver_id,
            type: 'get',
            data: {
                from_date: from_date,
                to_date: to_date,
                start_time: start_time,
                end_time: end_time,
                from_location: from_location,
                to_location: to_location,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log('Booking successful:', response);
                alert('Booking successful!');
                window.location.href = baseUrl + '/get-booking';
            },
            error: function (error) {
                console.error('Booking error:', error);
                alert('Booking failed. Please try again.');
            }
        });
    });
});
