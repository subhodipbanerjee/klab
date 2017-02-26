<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="css/customCategoryStyle.css" type="text/css">
<link href="css/categories_style.css" rel="stylesheet" type="text/css"  media="all" />
<?php
  $universities = $db->query('SELECT * FROM universities');
  $universities = $universities->fetchAll(PDO::FETCH_ASSOC);
?>
	<div class="" style="margin-top : 40px;">
		<div class="row">
			<div class="content col-md-12">
				<div class="categories">
					<div class="col-md-3">
						<div class="container">
							<div class="row">
								<div class="content-sidebar">
									<h4>
										<img src="images/category_images/fi.png" alt="" />Categories
									</h4>
									<ul>
										<?php foreach($universities as $university) { ?>
											<li><a href="#<?php echo $university['name']; ?>" class="leftMenu_uem" data-module="action1"><?php echo $university['name']; ?></a></li>
										<?php } ?>
									</ul>
						    	</div>
					    	</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="categories-types">
						<?php foreach($universities as $university) { 
							$university_id = $university['id'];
						  $courses = $db->prepare('SELECT * FROM courses where university_id = :university_id');
						  $courses->execute(array('university_id' => $university['id']));
						  $courses = $courses->fetchAll(PDO::FETCH_ASSOC);
						  if (sizeof($courses) != 0 ) {
						?>
							<div class="recent-videos" id="<?php echo $university['name']; ?>">
								<h5><img src="images/category_images/recent.png" alt="" /><?php echo $university['name']; ?>-videos</h5>
								<div class="col-md-12" style="margin-top: 30px;">
									<?php
									  foreach($courses as $course) {
										  $categories = $db->prepare('SELECT * FROM categories where course_id = :course_id');
										  $categories->execute(array('course_id' => $course['id']));
										  $categories = $categories->fetchAll(PDO::FETCH_ASSOC);
									?>
									<div class="col-md-6" style="padding-left: 5px; padding-right: 5px;">
										<div class="leftBox">
											<div class="leftBoxHeader">
												<div class="headerText">
													<a href="library.php?c_id=<?php echo $course['id']; ?>"><h4>University: <?php echo $university['name']; ?></h4></a>
													<span style="text-align: left;"> Course: <?php echo $course['name'].'('.$course['stream'].')'; ?></span>
													<span style="text-align: right; padding-left: 32px;"> Semester : <?php echo $course['sem']; ?></span>
												</div>											
											</div>
											<hr class="topBar"></hr>
											<div class="leftBoxMiddle">
												<div class="middleText">
<!-- 													<ul style="float: right; width:50%">
														<li>Dummi text is one</li>
														<li>Dummi text is two</li>
													</ul>
													<ul style="float: left; width:50%">
														<li>Dummi text is one</li>
														<li>Dummi text is two</li>
													</ul> -->
													<ul>
														<li>Joy of Engineering</li>
														<?php foreach($categories as $category) { ?>
															<li><?php echo $category['name']; ?></li>
														<?php } ?>
													</ul>
												</div>
											</div>
											<div class="leftBoxFooter" style="background-color: #9ab51f">
												<span style="text-align: left;">RS. <?php echo $course['price']; ?></span>
												<div class="checkbox" style="float: right; margin-top: 0px">
											    <label>
											      <input type="checkbox"> Select to Buy
											    </label>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
								<div class="clear"></div>
							</div>
						<?php } } ?>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<?php include('includes/top-footer.php'); ?>
	<?php include('includes/footer.php'); ?>