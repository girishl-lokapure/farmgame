/* 
 Created on : 12 Dec, 2018, 14 PM
 Author     : groot (Aditya Pandey)
 Description: Custom Script
 */

$(document).ready(function () {
    $.ajaxSetup({cache: false});
    if ($(".game_status").val() == "WON" || $(".game_status").val() == "LOST") {
        $("#feed").attr("disabled", "disabled");
    }
    var row = '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
    var eq = 0;


    function get_eq(element) {
        switch (element) {
            case 'farmer1':
                eq = 1;
                break;
            case 'cow1':
                eq = 2;
                break;
            case 'cow2':
                eq = 3;
                break;
            case 'bunny1':
                eq = 4;
                break;
            case 'bunny2':
                eq = 5;
                break;
            case 'bunny3':
                eq = 6;
                break;
            case 'bunny4':
                eq = 7;
                break;
            default:
            // code block
        }
        return eq;
    }



    $("#feed").on("click", function () {
        var fedLife = '';
        var feedUrl = "game/feed.php";
        $(".feed_table").find("tbody").html('');
        $.ajax({
            url: feedUrl,
            async: true,
            success: function (response) {
                response = jQuery.parseJSON(response);
                console.log(response);
                if (response == "win") {
                    $("#result").append('Game over :  You Won, reset the game to play again');
                    $("#feed").attr("disabled", "disabled");

                } else if (response == "lost") {
                    $("#result").append('Game over :  You Lost, reset the game to play again');
                    $("#feed").attr("disabled", "disabled");

                } else {                    
                    $.each(response, function (i, item) {
                        $(".feed_table").find("tbody").append(row);
                        $(".feed_table").find("tbody tr:last").find("td:eq(0)").html(item.round);
                        $(".feed_table").find("tbody tr:last").find("td:eq(" + get_eq(item.element) + ")").html('<img style="height:20px;width:20px;" src="images/food.png" alt="Fed"/>');
                        check_dead();
                    });
                }
            }
        });
    });

    $("#newGame").on("click", function () {
        var newGameUrl = "reset.php";
        $.ajax({
            url: newGameUrl,
            async: false,
            success: function () {
                location.reload();
            }
        });
    });

    function check_dead() {
        $.getJSON("game/cache/life.json", function (data) {

            $.each(data, function (key, val) {
                if (val == 0) {

                    $(".feed_table").find("tbody tr").find("td:eq(" + get_eq(key) + ")").addClass('dead')
                }
            });
        });
    }
    check_dead();
});