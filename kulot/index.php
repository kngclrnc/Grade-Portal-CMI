<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="">

    <title>Document</title>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
       <br><br><center><img src="image/new_logo.png" style="max-width: 150px; max-height: 150px"></center>

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
          <form style="width: 23rem; text-shadow: 1px 1px gray;" action="login.php" method="POST">
            <div class="form-outline mb-3">
              <hr>
              <h3>LOGIN HERE</h3>
              <hr>

              <div class="row mb-3">
                <div class="col-md-12">
                  <input type="text" name="username" placeholder="Enter Username" class="form-control form-control-lg" />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-12">
                <input type="password" name="password" placeholder="Enter Password" name="password" class="form-control form-control-lg" />
                </div>
              </div>
            </div>

            <div class="pt-1 mb-3">
              <button class="btn btn-info btn-lg btn-block" type="submit" name="submit">Login</button>
            </div>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="image/cmi.png" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
</body>
</html>


