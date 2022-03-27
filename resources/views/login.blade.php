<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;700&display=swap" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-start">
                                <img src="assets/img/Rodicord.png" alt="" style="margin-top: -40px; margin-left: -25px;">
                                <h3><strong>Login</strong></h3>
                                <p class="mb-3" style="font-size: 14px"><strong>Harap masukkan Username dan Password Anda</strong></p>
                                <div class="form-outline mb-2 ">
                                    <label class="form-label" for="typeUsername-2">Username</label>
                                    <input type="email" id="typeUsername-2" class="form-control form-control-lg" placeholder="Username" required/>
                                </div>
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" required/>
                                </div>
                                {{-- <button class="btn btn-success btn-lg mt-3" style="border-radius: 25px; width:350px;" type="submit">Login</button> --}}
                                <a href="/dashboard"><button class="btn btn-success btn-lg mt-3" style="border-radius: 25px; width:350px;" type="submit">Login</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('partials.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>