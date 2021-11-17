<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    
    <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Home</button>
        </div>
    
        <div class="col-12">
          <button type="submit" class="btn btn-primary">All</button>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Active</button>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Completed</button>
          </div>
      </form>

</body>
</html>