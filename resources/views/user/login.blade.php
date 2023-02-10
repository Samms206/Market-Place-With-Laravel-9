<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body class="bg-light">
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mx-auto">
            {{-- alert --}}
            @if (Session::has('status'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
          <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
              <h3>Login</h3>
            </div>
            <div class="card-body">
              <form action="/login" method="post">
                @csrf
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="form-check mt-2">
                    <input type="checkbox" class="form-check-input" id="showPassword">
                    <label class="form-check-label" for="showPassword">Show password</label>
                </div>
                <script>
                    const passwordInput = document.querySelector('#password');
                    const showPasswordCheckbox = document.querySelector('#showPassword');
                
                    showPasswordCheckbox.addEventListener('change', function() {
                      if (showPasswordCheckbox.checked) {
                        passwordInput.type = "text";
                      } else {
                        passwordInput.type = "password";
                      }
                    });
                  </script>
                <button type="submit" class="btn btn-primary btn-block mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>