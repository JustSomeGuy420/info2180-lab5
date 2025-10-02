$("#lookup").on("click", function(element) {
    element.preventDefault();

    var country = $("#country").val();
    $.ajax({
        url: "world.php",
        type: "GET",
        data: { country: country },
        success: function(data) {
            $("#result").html(data);
        },
        error: function() {
            $("#result").html("An error occurred while fetching data.");
        }
    });
});

$("#lookupCities").on("click", function(element) {
    element.preventDefault();

    var country = $("#country").val();
    $.ajax({
        url: "world.php",
        type: "GET",
        data: { country: country, lookup: "cities" },
        success: function(data) {
            $("#result").html(data);
        },
        error: function() {
            $("#result").html("An error occurred while fetching data.");
        }
    });
});