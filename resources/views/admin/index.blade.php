@extends('admin.layouts.main')
@section('content')
<div class="container">
    <h1>Overview</h1>

    <div class="row g-3 my-2">
        <!-- Content here -->
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5">Total User</p>
                    <h3 class="fs-2">{{$totalCustomers}}</h3>
                    <button id="retrieveDataBtn" class="btn btn-primary">Show Users Account</button>
                    <div id="userDataContainer"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5">Orders</p>
                    <h3 class="fs-2">{{$totalOrders}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5">Products</p>
                    <h3 class="fs-2">{{$totalProducts}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"></h3>
                    <p class="fs-5">Revenue</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-2">
        <div class="col-md-6">
            <div class="p-3 bg-white shadow-sm rounded">
                <canvas id="newUserChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        var userDataVisible = false;

        $('#retrieveDataBtn').click(function() {
            if (userDataVisible) {
                $('#userDataContainer').hide();
                userDataVisible = false;
            } else {
                $.ajax({
                    url: '/retrieveUserData',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            var userData = response.data;
                            var html = '';

                            // Iterate over the retrieved user data
                            userData.forEach(function(user) {
                                html += '<p>Name: ' + user.name + '</p>';
                                html += '<p>Email: ' + user.email + '</p>';
                                html += '<hr>';
                            });

                            // Display the retrieved user data
                            $('#userDataContainer').html(html).show();
                            userDataVisible = true;
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        });
    });
    $(document).ready(function() {
    // Retrieve new registered account data from the server
    $.ajax({
        url: '/newRegisteredAccounts',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                var newData = response.data;

                if (newData.length > 0) {
                    var currentMonthData = newData[0]; // Get the first item containing current month's data

                    // Create the new user chart
                    var ctx = document.getElementById('newUserChart').getContext('2d');
                    var newUserChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [currentMonthData.month], // Display only the current month as the label
                            datasets: [{
                                label: 'New Users',
                                data: [currentMonthData.count], // Display only the count for the current month
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    stepSize: 1
                                }
                            }
                        }
                    });
                }
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
});

</script>

@endsection
