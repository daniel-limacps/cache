$(document).ready(function() {
    var jwtToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ3b3Jrc2hvcF9pZCI6NjF9.6Cv9cjh-g7nznr0QqYIxYnGoEH0vCzJDxsGiY4T5RXE";

    $.ajax({
        url: "http://localhost/diversos/cache/data.php",
        method: "GET",
        headers: {
            "Authorization": "Bearer " + jwtToken
        },
        success: function(response) {
            var parse = JSON.parse(response);
                console.log('response', parse.plate_data);
            if (parse.status === "ok") {
                var plateData = parse.plate_data;
                plateData.map(function(item) {
                    $('#itemList').append(
                        '<li id="' + item.car_plate + '">' + 
                            '<spam class="car_plate">car_plate:</spam> ' + item.car_plate + '<br>' +
                            '<spam>Car Brand:</spam> ' + item.car_brand + '<br>' +
                            '<spam>Car Logo:</spam> <img src="' + item.car_brand_logo + '" alt="' + item.car_brand + ' logo" width="50" height="50"><br>' +
                            '<spam>Car Chassi:</spam> ' + item.car_chassi + 
                        '</li>'
                    );
                });
            } else {
                console.log("Error: Unexpected response status");
            }
        },
        error: function(error) {
            console.log("Error: ", error);
        }
    });

    $('#filterInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        console.log('value', value.length);

        $('#itemList li').filter(function() {
            $(this).toggle($(this).attr('id').toLowerCase().startsWith(value));
        });
        if(value.length <= 0) {
            console.log('aqui');
            $('#itemList li').hide();
        }
    });

});