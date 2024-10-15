 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <title>login</title>
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <link rel="stylesheet" href="styleindex.css">
 </head>

 <body>
     <div class="sidenav">
         <div class="login-main-text">
             <h2>Welcome, <br>Dear Admin</h2>
             <p>Are you ready to join our website?</p>
         </div>
     </div>
     <div class="main">
         <div class="col-md-6 col-sm-12">
             <div class="login-form">
                 <form action="validationformlogin.php" method="POST" id="form">
                     <!-- Email input -->
                     <div class="form-outline mb-4">
                         <label>Enter Your Email</label>
                         <input type="text" name="Email" id="email" class="form-control" placeholder="User Name">
                         <p id="smalemail" style="color:red;"></p>
                     </div>

                     <!-- Password input -->
                     <div class="form-outline mb-4">
                         <label>Enter Your Password</label>
                         <input type="password" id="password" name="password" class="form-control"
                             placeholder="Password">
                         <p id="smalpassword" style="color:red;"></p>
                     </div>
                     <!-- Submit button -->
                     <button type="submit" name="btnConnecterAd" class="btn btn-primary btn-block mb-4">Login</button>
                 </form>
             </div>
         </div>
     </div>
     <script type="text/javascript" src="validatelog.js"></script>
 </body>

 </html>