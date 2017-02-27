<?php
  // echo $_REQUEST['c_id'];
  $categories = $db->prepare('SELECT * FROM categories where course_id = :course_id');
  $categories->execute(array('course_id' => $_REQUEST['c_id']));
  $categories = $categories->fetchAll(PDO::FETCH_ASSOC);
  $sub_categories = $db->prepare('SELECT * FROM categories where parent = :course_id');
  $sub_categories->execute(array('course_id' => $_REQUEST['c_id']));
  $sub_categories = $sub_categories->fetchAll(PDO::FETCH_ASSOC);
?>
<table width="100%" border="0"cellspacing="1"cellpadding="1" bgcolor="#ffffff" style="font-size:16px; font-weight:600; font-family:Arial, Helvetica, sans-serif; color:#FF000;">
  <tr>
    <td width="16%" height="600" valign="top" bgcolor="#4bc5e5"><ul class="sidebar-menu">
      <?php foreach($categories as $category) { ?>
        <li>
          <a href="#">
            <span><?php echo $category['code'].' : '.$category['name']; ?></span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sidebar-submenu" style="list-style-type:circle; color:#FFFFFF;">
            <li class="orange"><a href="#sec1a">Fundamentals of Computer</a></li>
            <li class="orange"><a href="#sec1b">C Fundamentals</a></li>
            <li class="orange"><a href="#sec1c">Operators & Expressions</a></li>
            <li class="orange"><a href="#sec1d">Fundamentals of Computer</a></li>
            <li class="orange"><a href="#sec1e">C Fundamentals</a></li>
            <li class="orange"><a href="#sec1f">Operators & Expressions</a></li> 
            <li class="orange"><a href="#sec1g">Structures Union and Files</a></li>
          </ul>
        </li>
      <?php } ?>
<!--       <li>
        <a href="#">
          <span>PH 201: Physics I</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="orange"><a href="#sec2a">Oscillation</a></li>
          <li class="orange"><a href="#sec2b">Optics 1</a></li>
          <li class="orange"><a href="#sec2c">Optics 2</a></li>
          <li class="orange"><a href="#sec2d">Quantum Physics</a></li>
          <li class="orange"><a href="#sec2e">Crystallography</a></li>
          <li class="orange"><a href="#sec2f">Lab Assignment</a></li> 
        </ul>
      </li>
      <li>
        <a href="#">
          <span>CH 201: Chemistry I</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="orange"><a href="#sec3a">Chemical Thermodynamics</a></li>
          <li class="orange"><a href="#sec3b">Reaction Dynamics</a></li>
          <li class="orange"><a href="#sec3c">Solid State Chemistry</a></li>
          <li class="orange"><a href="#sec3d">Electrochemistry</a></li>
          <li class="orange"><a href="#sec3e">Structure and Reactivity of Organic Molecule</a></li>
          <li class="orange"><a href="#sec3f">Polymerization</a></li> 
          <li class="orange"><a href="#sec3g">Industrial Chemistry</a></li>
          <li class="orange"><a href="#sec3h">Lab Assignment</a></li> 
        </ul>
      </li>
      <li>
        <a href="#">
          <span>M 201: Engineering Mathematics II</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="orange"><a href="#sec4a">First Order and First Degree (ODE)</a></li>
          <li class="orange"><a href="#sec4b">Higher Order and First Degree (ODE)</a></li>
          <li class="orange"><a href="#sec4c">Graph Theory</a></li>
          <li class="orange"><a href="#sec4d">Tree</a></li>
          <li class="orange"><a href="#sec4e">Improper Integral</a></li>
          <li class="orange"><a href="#sec4f">Laplace Transform</a></li> 
        </ul>
      </li>
      <li>
        <a href="#">
          <span>ES 201: Basic Electronic Engineering II</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="orange"><a href="#sec5a">Field Effect Transistors</a></li>
          <li class="orange"><a href="#sec5b">Amplifiers</a></li>
          <li class="orange"><a href="#sec5c">Digital Electronics</a></li>
          <li class="orange"><a href="#sec5d">Lab Assignment</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <span>ES 201: Basic Electrical Engineering II</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="orange"><a href="#sec6a">Electrostatics</a></li>
          <li class="orange"><a href="#sec6b">DC Machine</a></li>
          <li class="orange"><a href="#sec6c">Single Phase Transformer</a></li>
          <li class="orange"><a href="#sec6d">3 Phase Induction Motor</a></li>
          <li class="orange"><a href="#sec6e">3 Phase System</a></li>
          <li class="orange"><a href="#sec6f">General Structure of Electrical Power System</a></li>
          <li class="orange"><a href="#sec6g">Lab Assignment</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <span>ME 201: Engineering Thermodynamics & Fluid Mechanics</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="orange"><a href="#sec7a">Basic Concepts of Thermodynamics</a></li>
          <li class="orange"><a href="#sec7b">Heat and Work</a></li>
          <li class="orange"><a href="#sec7c">Ideal Equation of State, Processes; Real Gas</a></li>
          <li class="orange"><a href="#sec7d">Properties of Pure Substances</a></li>
          <li class="orange"><a href="#sec7e">1st Law of Thermodynamics</a></li>
          <li class="orange"><a href="#sec7f">2nd Law of Thermodynamics</a></li>
          <li class="orange"><a href="#sec7g">Standard Cycles of IC Engines</a></li>
          <li class="orange"><a href="#sec7h">Rankine Cycle of Steam</a></li>
          <li class="orange"><a href="#sec7i">Properties & Classification of Fluids</a></li>
          <li class="orange"><a href="#sec7j">Fluid Statics</a></li>
          <li class="orange"><a href="#sec7k">Measurement of Fluid Pressure</a></li>
          <li class="orange"><a href="#sec7l">Fluid Kinematics</a></li>
          <li class="orange"><a href="#sec7m">Dynamics of Ideal Fluids</a></li>
          <li class="orange"><a href="#sec7n">Measurement of Flow rate : Basic Principles</a></li>
          <li class="orange"><a href="#sec7o">Lab Assignment</a></li>
        </ul>
      </li> -->
    </td>
