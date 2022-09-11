<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formato</title>
</head>

<body>
    <div class="card card-body w-50 mx-auto p-5 mt-5">

        <div class="col">
            <label for="">Numero de palabras</label>
            <p id="total_words"></p>
        </div>

        <div class="col">
            <label for="">primera palabra</label>
            <p id="sizefirstword"></p>
        </div>
        <div class="col">
            <label for=""> Ultima palabra</label>
            <p id="last_word"></p>
        </div>
        <div class="col">
            <label for="">Palabras invertidas</label>
            <p id="invert_words"></p>
        </div>
        <div class="col">
            <label for="">Palabras ordenadas alfabeticamente</label>
            <p id="sort_words"></p>
        </div>
        <div class="col">
            <label for="">palabras ordenadas descendentemente</label>
            <p id="sort_words_des"></p>
        </div>

    </div>

    <script src={{   URL::asset('js/formato.js')  }}></script>
</body>

</html>
