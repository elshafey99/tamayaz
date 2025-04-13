<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <link rel="stylesheet" href="css/main.css">
    <title>Tamayz | Dashboard</title>
  </head>
  <body>
    <section class="bg-sing" style="height: 100vh;">
        <div class="container-fluid h-100">
            <div class="row justify-content-center align-items-center h-100 order-md-first order-last">

                <div class="col-md-6  d-flex flex-column justify-content-center order-md-last order-first">

                    <div class="text-center my-3">
                        <img class="img-fluid" src="{{ asset('dashboard/images/تميز copy 2.svg')}}" style="width: 60%;" alt="">


                    </div>
                </div>

                <div class="col-md-6  d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center my-4">
                     <img class="img-login" src="{{ asset('dashboard/images/تميز copy 2.svg')}}" width="300px" alt="">
                    </div>
                     <div style="border-radius: 20px; text-align: center;" class="bg-light shadow-lg p-4 bg-singin w-75 mx-auto">
                         <h3 class="text-singin my-4">Login</h3>
                         <form method="post" action="{{ route('admin.login.post') }}">
                                @csrf
                             <input type="text" name="email" class="w-75 form-control my-3 mx-auto" placeholder="Email">
                             <input type="password" name="password" class="w-75 form-control mx-auto" placeholder="password">
                             <button type="submit" class="btn btn-singin my-5">Login</button>
                         </form>
                     </div>
                 </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  </body>
</html>
