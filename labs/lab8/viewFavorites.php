<!DOCTYPE html>
<html>
    <head>
        <title> View Favorites </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
        /* global $ */
        $(document).ready(function() {
            $.ajax({
                    method: "GET",
                    url: "api/favoritesAPI.php",
                    dataType: "json",
                    data: { action: "keyword"},
                    success: function(data, status) {
                        data.forEach(function(i) {
                            $("#keywords").append("<a onclick='displayFavorites(this)' href='#'>" + i.keyword + "</a>" + " ");
                        });
                    }
                }); //ajax
        });
        
        function displayFavorites(keywordLink) {
            //alert($(keywordLink).html());
            var keyword = $(keywordLink).html();
            $.ajax({
                    method: "GET",
                    url: "api/favoritesAPI.php",
                    dataType: "json",
                    data: { "action": "favorites",
                            "keyword": keyword
                    },
                    success: function(data, status) {
                        $("#images").html("");
                        data.forEach(function(i) {
                            $("#images").append("<img width='200' src='" + i.imageURL + "'> ");
                        });
                    }
                }); //ajax
        }
        </script>
    </head>
    <body>
        <h1> My Favorites</h1>
        
        <div id="keywords"></div>
        
        <div id="images"></div>
    </body>
</html>