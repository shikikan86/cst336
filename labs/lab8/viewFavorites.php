<!DOCTYPE html>
<html>
    <head>
        <title> View Favorites </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/styles.css">      
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
        <h1 class="jumbotron"> My Favorites</h1>
        
        <div id="keywords"></div>
        
        <div id="images"></div>
    </body>
</html>