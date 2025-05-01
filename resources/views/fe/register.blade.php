<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="/frontend/images/logo.png">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Staydesa | {{ $title }}</title>

  <!-- Bootstrap/MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</head>

<body>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-form-card text-black shadow">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-1 mx-md-4 form-container">
                  <div class="text-center">
                    <img src="frontend/images/logo.png" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-2 pb-1">Join Staydesa Today</h4>
                    <p>Create your account</p>
                  </div>

                  <form action="/register" method="post">
                    @csrf
                    <div class="form-group mb-4">
                      <label for="name">Name</label>
                      <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" required value="{{ old('name') }}">
                      @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                
                    <div class="form-group mb-4">
                      <label for="email">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" required value="{{ old('email') }}">
                      @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                
                    <div class="form-group mb-4">
                      <label for="password">Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter password" required>
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button type="submit" class="btn btn-primary btn-block fa-lg mb-3" style="background-color: #EF6C57;">Register</button>
                      <a class="text-muted" href="#!">Already have an account?</a>
                    </div>
                
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Back to</p>
                      <a href="login" class="btn btn-outline-danger">Login</a>
                    </div>
                </form>                                
                </div>
              </div>

              <!-- Image Side -->
              <div class="col-lg-6 d-flex align-items-center p-0">
                <div class="w-100 h-100 position-relative text-white" style="
                  background-image: url('frontend/images/login-register.jpg');
                  background-size: cover;
                  background-position: center;
                  border-top-right-radius: 20px;
                  border-bottom-right-radius: 20px;
                ">
                  <div style="
                    position: absolute;
                    top: 0; left: 0;
                    width: 100%; height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    border-top-right-radius: 20px;
                    border-bottom-right-radius: 20px;
                  "></div>

                  <div class="position-relative p-5 d-flex flex-column justify-content-center h-100 text-center">
                    <h2 class="mb-3 fw-bold">Staydesa</h2>
                    <p class="small">Jelajahi keindahan alam, budaya, dan keramahan lokal<br>langsung dari genggaman Anda.</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
