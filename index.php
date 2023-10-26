<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Oscar Santa">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Checkout example · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">

    

    <!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body{
			width: 100%;
			height: 100vh;
			color: #fff;
			background: linear-gradient(45deg,#0A2647,#144272,#205295,#ffff);
			background-size: 400% 400%;
			position: relative;
			animation: cambiar 10s ease-in-out infinite;
		}
		@keyframes cambiar{
			0%{background-position: 0 50%;}
			50%{background-position: 100% 50%;}
			100%{background-position: 0 50%;}
		}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container col-md-6">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="./img/icon.svg" alt="" width="72" height="57">
      <h2>Student Registration</h2>
    </div>     
    <div class="row g-8">
      <div class="col-lg-12" >
        <h4 class="mb-3">Student data</h4>
        <hr class="my-4">      
        <?php if(
          empty($_POST['firstName']) && 
          empty($_POST['lastName']) && 
          empty($_POST['username']) && 
          empty($_POST['email']) && 
          empty($_POST['address']) && 
          empty($_POST['phone']) && 
          empty($_POST['country']) && 
          empty($_POST['state']) && 
          empty($_POST['zip'])
          ){ ?>  
        <form class="needs-validation" method="POST" action="index.php">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Phone <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="+57">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <input type="text" class="form-control" id="country" name="country" placeholder="Colombia" required>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" id="state" name="state" placeholder="Bogota" required>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">        
          <button class="w-100 btn btn-secondary btn-lg" type="submit">Continue to checkout</button>
        </form>
        <?php }else{ ?>
          <section class="mt-4">
            <?php
                require_once('db.class.php');
                $firstName = $_POST['firstName']; $lastName = $_POST['lastName']; $username = $_POST['username']; $email = $_POST['email']; $address = $_POST['address'];
                $phone = $_POST['phone']; $country = $_POST['country']; $state = $_POST['state']; $zip = $_POST['zip'];

                $db = new db("localhost", "root", "password", "database"); #Estos datos se modifican en el servidor... =(
                $result = $db->insert("INSERT INTO usuarios VALUES (?,?,?,?)", array(null, $nombres, $email, $password));
                if($result){
            ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    Usuario registrado correctamente!
                  </div>
                </div>
            <?php }else{ ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="index.php"/></svg>
                  <div>
                    Estudiante NO registrado!
                    <a href="index.php">Intentalo nuevamente</a>
                  </div>
                </div>
            <?php } ?>
            </section>
        <?php } ?>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2023 Oscar Santa</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="./js/bootstrap.bundle.min.js"></script>

      <script src="./js/form-validation.js"></script>
  </body>
</html>
