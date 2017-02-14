<?php
require('includes/config.php');
if(isset($_POST['registration'])) {
  if(strlen($_POST['username']) < 3) {
    $error[] = 'Username is too short.';
  } else {
    $stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
    $stmt->execute(array(':username' => $_POST['username']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($row['username'])){
      $error[] = 'Username provided is already in use.';
    }
  }
  if(strlen($_POST['password']) < 6) {
    $error[] = 'Password is too short.';
  }
  //email validation
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error[] = 'Please enter a valid email address';
  } else {
    $stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
    $stmt->execute(array(':email' => $_POST['email']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($row['email'])) {
      $error[] = 'Email provided is already in use.';
    }
  }
  //if no errors have been created carry on
  if(!isset($error)) {
    $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);
    $activasion = md5(uniqid(rand(),true));
    try {
      $stmt = $db->prepare('INSERT INTO members (username,password,email,active,user_type,mobile_no,address,city,pincode,college_name,stream,year)
        VALUES (:username, :password, :email, :active, :user_type, :mobile_no, :address, :city, :pincode, :college_name, :stream, :year )');
      $stmt->execute(array(
        ':username' => $_POST['username'],
        ':password' => $hashedpassword,
        ':email' => $_POST['email'],
        ':active' => $activasion,
        ':user_type' => $_POST['user_type'],
        ':mobile_no' => $_POST['mobile_no'],
        ':address' => $_POST['address'],
        ':city' => $_POST['city'],
        ':pincode' => $_POST['pincode'],
        ':college_name' => $_POST['college_name'],
        ':stream' => $_POST['stream'],
        ':year' => $_POST['year'],
      ));
      $id = $db->lastInsertId('memberID');
      //send email
      $to = $_POST['email'];
      $subject = "Registration Confirmation";
      $body = "<p>Thank you for registering at demo site.</p>
      <p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
      <p>Regards Site Admin</p>";
      $from = "noreply@knowledgelab.co.in";
      // $mail = new Mail();
      // $mail->setFrom(SITEEMAIL);
      // $mail->addAddress($to);
      // $mail->subject($subject);
      // $mail->body($body);
      // $mail->send();
      mail($to,$subject,$body,"From:".$from);
      header('Location: index.php?action=joined');
      exit;
    } catch(PDOException $e) {
      $error[] = $e->getMessage();
      print_r($error);
    }
  }
}

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  if($user->login($username,$password)){ 
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
  } else {
    $error[] = 'Wrong username or password or your account has not been activated.';
  }
}

?>


<div class="modal fade container" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <img class="img-squre" id="img_logo" src="images/knowledge_png.png">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
      </div>
      <div id="div-forms">
        <form id="login-form" method="post" action="" autocomplete="off" name="login">
          <div class="modal-body">
            <div class="fblogin"><a class="fbloginBtn" onclick="">Login with facebook account</a></div>
            <div class="knowledgelablogin"> <span style="padding-left: 10px;"> --Or Login With knowledgelab Account--</span></div>
            <div id="div-login-msg">
              <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-login-msg">Type your username and password.</span>
            </div>
            <input id="login_username" name="username" class="form-control" type="text" placeholder="Username" required>
            <input id="login_password" name="password" class="form-control" type="password" placeholder="Password" required>
            <div class="checkbox">
              <label><input type="checkbox">Remember me</label>
            </div>
          </div>
          <div class="modal-footer">
            <div>
              <!-- <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Login</button> -->
              <input type="submit" name="login" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5">
            </div>
            <div>
              <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
              <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
            </div>
          </div>
        </form>
        <form id="lost-form" style="display:none;">
          <div class="modal-body">
            <div id="div-lost-msg">
              <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-lost-msg">Type your e-mail.</span>
            </div>
            <input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
          </div>
          <div class="modal-footer">
            <div>
              <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
            </div>
            <div>
              <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
              <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
            </div>
          </div>
        </form>
        <form id="register-form" style="display:none;">
          <div class="modal-body">
            <div class="fblogin"><a class="fbloginBtn" onclick="">Login with facebook account</a></div>
            <div class="knowledgelablogin"> <span style="padding-left: 10px;"> --Or Login With knowledgelab Account--</span></div>
            <div id="div-register-msg">
              <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-register-msg">Register an account.</span>
            </div>
            <input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
            <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
            <input id="register_password" class="form-control" type="password" placeholder="Password" required>
          </div>
          <div class="modal-footer">
            <div>
              <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
            </div>
            <div>
              <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
              <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
            </div>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade container" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <img class="img-squre" id="img_logo" src="images/knowledge_png.png">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
      </div>
      <div id="div-forms">
        <form id="register-form" role="form" method="post" action="" autocomplete="off" name="registration">
          <div class="modal-body">
            <div class="fblogin"><a class="fbloginBtn" onclick="">Login with facebook account</a></div>
            <div class="knowledgelablogin"> <span style="padding-left: 10px;"> --Or Login With knowledgelab Account--</span></div>
            <div id="div-register-msg">
              <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-register-msg">Register an account.</span>
            </div>
            <input id="register_username" name="username" class="form-control" type="text" placeholder="Username" required>
            <input id="register_email" name="email" class="form-control" type="email" placeholder="E-Mail" required>
            <input id="register_password" name="password" class="form-control" type="password" placeholder="Password" required>
            <input id="register_mobileNo" name="mobile_no" class="form-control" type="Mobile" placeholder="Mobile no." required>
            <textarea class="form-control" name="address" rows="1" id="address" type="address" placeholder="Address"></textarea>
            <div class="col-md-6"><input id="register_city" class="form-control" name="city" type="text" placeholder="City" required></div>
            <div class="col-md-6"><input id="register_pincode" class="form-control" name="pincode" type="pincode" placeholder="Pincode" required></div>
            <input id="register_college" class="form-control" name="college_name" type="text" placeholder="College Name" required>
            <div class="col-md-6">
              <select id="country" name="stream" class="form-control" type="Mobile" placeholder="Stream">
                <option>stream 1</option>
                <option>stream 2</option>
                <option>stream 3</option>
                <option>stream 4</option>
                <option>stream 5</option>
                <option>stream 6</option>
                <option>stream 7</option>
                <option>stream 8</option>
              </select>
            </div>
            <div class="col-md-6"><input id="register_year" name="year" class="form-control" type="text" placeholder="Year" required></div>
            <div class="col-md-6"><input type="radio" name="user_type" id="femaleRadio" value="student">Student </div>
            <div class="col-md-6"><input type="radio" name="user_type" id="maleRadio" value="teacher">Teacher </div>
          </div>
          <div class="modal-footer">
            <div>
              <!-- <button type="submit" class="btn btn-primary btn-lg btn-block" name="registration">Register</button> -->
              <input type="submit" name="registration" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>