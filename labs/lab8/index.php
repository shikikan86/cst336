<!DOCTYPE html>
<html>
<head>
<title> Pixabay API Demo </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
body {
    text-align: center;
}
img {
    border-radius: 20px;
}
</style>
<script>

    function searchImage() {

        $.ajax({
        type: "GET",
        url: "https://pixabay.com/api/?key=5589438-47a0bca778bf23fc2e8c5bf3e&q=$keyword&image_type=photo&orientation=horizontal&safesearch=true&per_page=100",
        dataType: "json",
        data: { "q":$("#keyword").val() },
        success: function(data, status) {
            let randomImage = Math.floor(Math.random() * data.hits.length);
            $('#image').html("<img src='"+ data.hits[ randomImage ].webformatURL+"' width='500'>");
            $('#image').append("<br>Likes: " + data.hits[ randomImage ].likes)
        }
        }); //ajax

        }//searchImage()

</script>
</head>
<body>

    <h1> Pixabay Image Search </h1>
    Keyword: <input type="text" id="keyword"/>
    <button onclick="searchImage()"> Search </button>
    <br /><br />

    <div id="image"></div>

</body>
</html>