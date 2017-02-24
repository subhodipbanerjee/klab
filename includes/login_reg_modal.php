<script type="text/javascript">
  $(document).on("click","#login_register_btn", function(){
    $("#register-modal").modal('show');
    $("#login-modal").modal('toggle');
  });
  $(document).on("click",".close", function(){
    $("#page-top").css("padding-right","0px;");
  });
</script>
<?php
// require('includes/config.php');
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
      $stmt = $db->prepare('INSERT INTO members (username,password,email,active,mobile_no,address,city,pincode,college_name,stream,year)
        VALUES (:username, :password, :email, :active, :mobile_no, :address, :city, :pincode, :college_name, :stream, :year )');
      $stmt->execute(array(
        ':username' => $_POST['username'],
        ':password' => $hashedpassword,
        ':email' => $_POST['email'],
        ':active' => $activasion,
        ':mobile_no' => $_POST['mobile_no'],
        ':address' => $_POST['address'],
        ':city' => $_POST['city'],
        ':pincode' => $_POST['pincode'],
        ':college_name' => $_POST['college'],
        ':stream' => $_POST['stream'],
        ':year' => $_POST['year']
      ));
      $id = $db->lastInsertId('memberID');
      // $to = $_POST['email'];
      // $subject = "Registration Confirmation";
      // $body = "<p>Thank you for registering at demo site.</p>
      // <p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
      // <p>Regards Site Admin</p>";
      // $headers = "MIME-Version: 1.0" . "\r\n";
      // $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
      // $headers .= 'From: <noreply@knowledgelab.co.in>' . "\r\n";

      $to = $_POST['email'];
      $subject = "Registration Confirmation";
      $headers = "From: noreply@knowledgelab.co.in\r\n";
      $headers .= "Reply-To: noreply@knowledgelab.co.in\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $body = '<p>Thank you for registering at Knowledge Lab.</p>';
      $body .= '<p>To activate your account, please click on this link: <a href='.strip_tags( BASE_URL ).'/activate.php?x='.strip_tags($id).'&y='.strip_tags($activasion).'>'.strip_tags( BASE_URL ).'/activate.php?x='.strip_tags($id).'&y='.strip_tags($activasion).'</a></p>';
      $body .= '<p>Regards Site Admin</p>';
      mail($to,$subject,$body,$headers);
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
    header('Location: categories.php');
    exit;
  } else {
    $error[] = 'Wrong username or password or your account has not been activated.';
  }
}

?>

<div class="modal fade container" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-left-sec col-md-5 col-xs-hidden col-sm-hidden ">
      <span class="modal-left">
        <span>
          <span><h3>Get <b>Knowledge Lab</b> Edge</h3></span>
        </span>
      </span>
      <ul class="modal-ul">
        <li> Discover Joy Of Engineering</li>
        <li> Videos, Revision Notes, Tests and more</li>
        <li> 10 year Semester Questation With solutions</li>
        <li> Mapped To Universict Syllabus</li>
      </ul>
    </div>
    <div class="modal-content col-md-7 col-xs-12 col-sm-12">
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
            <div class="knowledgelablogin"><span style="padding-left: 10px; text-align: center;"> --Or Login With knowledgelab Account--</span></div>
            <!-- <div id="div-login-msg">
              <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-login-msg">Type your username and password.</span>
            </div> -->
            <input id="login_username" name="username" class="form-control" type="text" placeholder="Username" required>
            <input id="login_password" name="password" class="form-control" type="password" placeholder="Password" required>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Remember me
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-md-7"  style="padding: 6px">
              <input type="submit" name="login" value="GO TO FREE TRAIL" class="btn btn-primary btn-lg btn-block col-md-6" style="font-size: 14px;" tabindex="5">
              <!-- <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" style="font-size: 14px;">GO TO FREE TRAIL</button> -->
            </div>
            <div class="col-md-5"  style="padding: 6px">
              <input type="submit" name="login" value="BUY NOW" class="btn btn-primary btn-lg btn-block col-md-6" style="font-size: 14px;" tabindex="5">
              <!-- <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" style="font-size: 14px;">BUY NOW</button> -->
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
            <div class="knowledgelablogin"><span style="padding-left: 10px;"> --Or fill the form--</span></div>
            <!-- <div id="div-register-msg">
              <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-register-msg">Register an account.</span>
            </div> -->
            <input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
            <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
            <input id="register_password" class="form-control" type="password" placeholder="Password" required>
          </div>
          <div class="modal-footer">
            <div class="col-md-7"  style="padding: 6px">
              <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" style="font-size: 14px;">GO TO FREE TRAIL</button>
            </div>
            <div class="col-md-5"  style="padding: 6px">
              <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" style="font-size: 14px;">BUY NOW</button>
            </div>
            <div>
              <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
              <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
            </div>
          </div> 
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade container" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-left-sec col-md-5 col-xs-hidden col-sm-hidden" style="height: 600px;">
      <span class="modal-left">
        <span>
          <span><h3>Get <b>Knowledge Lab</b> Edge</h3></span>
        </span>
      </span>
      <ul class="modal-ul">
        <li> Discover Joy Of Engineering</li>
        <li> Videos, Revision Notes, Tests and more</li>
        <li> 10 year Semester Questation With solutions</li>
        <li> Mapped To Universict Syllabus</li>
      </ul>
    </div>
    <div class="modal-content col-md-7" style="height: 600px;">
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
            <div class="knowledgelablogin"> <span style="padding-left: 10px;"> --Or fill the form--</span></div>
            <!-- <div id="div-register-msg">
              <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-register-msg">Register an account.</span>
            </div> -->
            <input id="register_username" name="username" class="form-control" type="text" placeholder="Full Name" required>
            <input id="register_email" name="email" class="form-control" type="text" placeholder="EMail" required>
            <input id="register_mobileNo" name="mobile_no" class="form-control" type="Mobile" placeholder="Mobile No." required>
           <input id="register_password" name="password" class="form-control" type="password" placeholder="Password" required>
            
            <textarea class="form-control" name="address" rows="1" id="address" type="address" placeholder="Address"></textarea>
            <div class="col-md-6" style="padding-bottom: 8px; padding-left: 0px; padding-right: 5px;"><input id="register_city" name="city" class="form-control" type="text" placeholder="City" required></div>
            <div class="col-md-6" style="padding-bottom: 8px; padding-left: 0px; padding-right: 0px;"><input id="register_pincode" name="pincode" class="form-control" type="pincode" placeholder="Pincode" required></div>
            <input id="register_college" name="college" class="form-control" type="text" placeholder="College" required>
            <div class="col-md-6" style="padding-bottom: 8px; padding-left: 0px; padding-right: 5px;">
              <select id="country" class="form-control" name="stream" type="text" placeholder="Stream">
                <option>stream</option>
                <option>stream 2</option>
                <option>stream 3</option>
                <option>stream 4</option>
                <option>stream 5</option>
                <option>stream 6</option>
                <option>stream 7</option>
                <option>stream 8</option>
              </select>
            </div>
            <div class="col-md-6" style="padding-bottom: 8px; padding-left: 0px; padding-right: 5px; padding-top: 5px;">
              <select id="register_year" class="form-control" name="year" type="text" placeholder="Year">
                <option>Year</option>
                <option>2017</option>
                <option>2016</option>
                <option>2015</option>
                <option>2014</option>
                <option>2013</option>
                <option>2012</option>
                <option>2011</option>
                <option>2010</option>
              </select>
            </div>
          <div class="modal-footer col-md-12" style="padding-right: 0px; padding-left: 0px;">
            <div class="col-md-6"  style="padding-right: 5px; padding-left: 0px;">
              <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" style="font-size: 14px;" name="registration">FREE TRAIL</button>
            </div>
            <div class="col-md-6"  style="padding-left: 5px; padding-right: 0px;">
              <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" style="font-size: 14px;" name="registration">BUY NOW</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>