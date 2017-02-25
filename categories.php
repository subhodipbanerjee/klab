<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="css/customCategoryStyle.css" type="text/css">
<link href="css/categories_style.css" rel="stylesheet" type="text/css"  media="all" />

<?php
  $universities = $db->query('SELECT * FROM universities');
  $universities = $universities->fetchAll(PDO::FETCH_ASSOC);
?>

	<div class="container" style="margin-top : 34px;">
		<div class="row">
			<div class="content col-md-12">
				<div class="col-md-3">
					<div class="categories">
						<div class="container">
							<div class="row">
								<div class="content-sidebar">
					    		<h4>
					    			<img src="images/category_images/fi.png" alt="" />Categories
					    		</h4>
									<ul>
										<?php foreach($universities as $university) { ?>
											<li><a href="#" class="leftMenu_uem" data-module="action1"><?php echo $university['name']; ?></a></li>
										<?php } ?>
									</ul>
						    	</div>
					    	</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="container">
						<div class="row">
							<div class="categories-types">
								<div class="recent-videos" id="uem">
									<h5><img src="images/category_images/recent.png" alt="" />Recent-videos</h5>
									<div class="col-md-12" style="margin-top: 30px;">
										<div class="col-md-6">
											<div class="container">
												<div class="row">
													<div class="leftBox">
														<div class="leftBoxHeader">
															<div class="headerText">
																<h4>University: MAKAUT(formerly WBUT)</h4>
																<span style="text-align: left;"> Course: B.Tech</span>
																<span style="text-align: right; padding-left: 32px;"> Semester : 1</span>
															</div>											
														</div>
														<hr class="topBar"></hr>
														<div class="leftBoxMiddle">
															<div class="middleText">
																<ul style="float: right;">
																	<li>Dummi text is one</li>
																	<li>Dummi text is two</li>
																</ul>
																<ul style="float: left">
																	<li>Dummi text is one</li>
																	<li>Dummi text is two</li>
																</ul>
															</div>
														</div>
														<div class="leftBoxFooter" style="background-color: #9ab51f">
															<span style="text-align: left;">RS. 900</span>
															<div class="checkbox" style="float: right; margin-top: 0px">
														    <label>
														      <input type="checkbox"> Select to Buy
														    </label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="container">
												<div class="row">
													<div class="leftBox">
														<div class="leftBoxHeader">
															<div class="headerText">
																<h4>University: MAKAUT(formerly WBUT)</h4>
																<span style="text-align: left;"> Course: B.Tech</span>
																<span style="text-align: right; padding-left: 32px;"> Semester : 2</span>
															</div>
														</div>
														<hr class="topBar"></hr>
														<div class="leftBoxMiddle">
															<div class="middleText">
																<ul style="float: right;">
																	<li>Dummi text is one</li>
																	<li>Dummi text is two</li>
																</ul>
																<ul style="float: left">
																	<li>Dummi text is one</li>
																	<li>Dummi text is two</li>
																</ul>
															</div>
														</div>
														<div class="leftBoxFooter" style="background-color: #9ab51f">
															<span style="text-align: left;">RS. 900</span>
															<div class="checkbox" style="float: right; margin-top: 0px">
														    <label>
														      <input type="checkbox"> Select to Buy
														    </label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
									<div class="col-md-12" style="margin-top: 30px;">
										<div class="col-md-6">
											<div class="container">
												<div class="row">
													<div class="leftBox">
														<div class="leftBoxHeader">
															<div class="headerText">
																<h4>University: MAKAUT(formerly WBUT)</h4>
																<span style="text-align: left;"> Course: B.Tech</span>
																<span style="text-align: right; padding-left: 32px;"> Semester : 3</span>
															</div>
														</div>
														<hr class="topBar"></hr>
														<div class="leftBoxMiddle">
															<div class="middleText">
																<ul style="float: right;">
																	<li>Dummi text is one</li>
																	<li>Dummi text is two</li>
																</ul>
																<ul style="float: left">
																	<li>Dummi text is one</li>
																	<li>Dummi text is two</li>
																</ul>
																<!-- <hr class="middleBar"></hr> -->
															</div>
														</div>
														<div class="leftBoxFooter" style="background-color: #9ab51f">
															<span style="text-align: left;">RS. 900</span>
															<div class="checkbox" style="float: right; margin-top: 0px">
															    <label>
															      <input type="checkbox"> Select to Buy
															    </label>
															  </div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="container">
												<div class="row">
													<div class="leftBox">
														<div class="leftBoxHeader">
															<div class="headerText">
																<h4>University: MAKAUT(formerly WBUT)</h4>
																<span style="text-align: left;"> Course: B.Tech</span>
																<span style="text-align: right; padding-left: 32px;"> Semester : 4</span>
															</div>											
														</div>
														<hr class="topBar"></hr>
														<div class="leftBoxMiddle">
															<div class="middleText">
																<ul style="float: right;">
																	<li>Dummi text is one</li>
																	<li>Dummi text is two</li>
																</ul>
																<ul style="float: left">
																	<li>Dummi text is one</li>
																	<li>Dummi text is two</li>
																</ul>
																<!-- <hr class="middleBar"></hr> -->
															</div>
														</div>
														<div class="leftBoxFooter" style="background-color: #9ab51f">
															<span style="text-align: left;">RS. 900</span>
															<div class="checkbox" style="float: right; margin-top: 0px">
															    <label>
															      <input type="checkbox"> Select to Buy
															    </label>
															  </div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
										<div class="clear"> </div>
									</div>
								</div>
								<div class="recent-videos" id="iim" style="display: none;">
									<h5><img src="images/category_images/recent.png" alt="" />IIM-videos</h5>
									<div class="grids grids2">
									<div class="grid grid2">
										<h3>Consectetur adipisicing elit</h3>
										<a href="#"><img src="images/category_images/g1 copy.png" title="video-name"></a>
										<div class="time">
											<span>00:10</span>
										</div>
										<div class="grid-info">
											<div class="video-share">
												<ul>
													<li><a href="#"><img src="images/category_images/likes.png" title="links"></a></li>
													<li><a href="#"><img src="images/category_images/link.png" title="Link"></a></li>
													<li><a href="#"><img src="images/category_images/views.png" title="Views"></a></li>
												</ul>
											</div>
											<div class="video-watch">
												<a href="single.html">Watch Now</a>
											</div>
											<div class="clear"> </div>
											<div class="lables">
												<p>Labels:<a href="#">Lorem</a></p>
											</div>
										</div>
									</div>
									<div class="grid grid2">
										<h3>Consectetur adipisicing elit</h3>
										<a href="single.html"><img src="images/category_images/g2 copy.png" title="video-name"></a>
										<div class="time">
											<span>2:10</span>
										</div>
										<div class="grid-info">
											<div class="video-share">
												<ul>
													<li><a href="#"><img src="images/category_images/likes.png" title="links"></a></li>
													<li><a href="#"><img src="images/category_images/link.png" title="Link"></a></li>
													<li><a href="#"><img src="images/category_images/views.png" title="Views"></a></li>
												</ul>
											</div>
											<div class="video-watch">
												<a href="single.html">Watch Now</a>
											</div>
											<div class="clear"> </div>
											<div class="lables">
												<p>Labels:<a href="#">Lorem</a></p>
											</div>
										</div>
									</div>
									<div class="grid grid2">
										<h3>Consectetur adipisicing elit</h3>
										<a href="single.html"><img src="images/category_images/g4.jpg" title="video-name"></a>
										<div class="time">
											<span>10:10</span>
										</div>
										<div class="grid-info">
											<div class="video-share">
												<ul>
													<li><a href="#"><img src="images/category_images/likes.png" title="links"></a></li>
													<li><a href="#"><img src="images/category_images/link.png" title="Link"></a></li>
													<li><a href="#"><img src="images/category_images/views.png" title="Views"></a></li>
												</ul>
											</div>
											<div class="video-watch">
												<a href="single.html">Watch Now</a>
											</div>
											<div class="clear"> </div>
											<div class="lables">
												<p>Labels:<a href="#">Lorem</a></p>
											</div>
										</div>
									</div>
									<div class="clear"> </div>
									</div>
									<div class="grids grids2">
										<div class="grid grid2">
											<h3>Consectetur adipisicing elit</h3>
											<a href="single.html"><img src="images/category_images/g1 copy.png" title="video-name"></a>
											<div class="time">
												<span>00:10</span>
											</div>
											<div class="grid-info">
												<div class="video-share">
													<ul>
														<li><a href="#"><img src="images/category_images/likes.png" title="links"></a></li>
														<li><a href="#"><img src="images/category_images/link.png" title="Link"></a></li>
														<li><a href="#"><img src="images/category_images/views.png" title="Views"></a></li>
													</ul>
												</div>
												<div class="video-watch">
													<a href="single.html">Watch Now</a>
												</div>
												<div class="clear"> </div>
												<div class="lables">
													<p>Labels:<a href="#">Lorem</a></p>
												</div>
											</div>
										</div>
										<div class="grid grid2">
											<h3>Consectetur adipisicing elit</h3>
											<a href="single.html"><img src="images/category_images/g2 copy.png" title="video-name"></a>
											<div class="time">
												<span>2:10</span>
											</div>
											<div class="grid-info">
												<div class="video-share">
													<ul>
														<li><a href="#"><img src="images/category_images/likes.png" title="links"></a></li>
														<li><a href="#"><img src="images/category_images/link.png" title="Link"></a></li>
														<li><a href="#"><img src="images/category_images/views.png" title="Views"></a></li>
													</ul>
												</div>
												<div class="video-watch">
													<a href="single.html">Watch Now</a>
												</div>
												<div class="clear"> </div>
												<div class="lables">
													<p>Labels:<a href="#">Lorem</a></p>
												</div>
											</div>
										</div>
										<div class="grid grid2">
											<h3>Consectetur adipisicing elit</h3>
											<a href="single.html"><img src="images/category_images/g4.jpg" title="video-name"></a>
											<div class="time">
												<span>10:10</span>
											</div>
											<div class="grid-info">
												<div class="video-share">
													<ul>
														<li><a href="#"><img src="images/category_images/likes.png" title="links"></a></li>
														<li><a href="#"><img src="images/category_images/link.png" title="Link"></a></li>
														<li><a href="#"><img src="images/category_images/views.png" title="Views"></a></li>
													</ul>
												</div>
												<div class="video-watch">
													<a href="single.html">Watch Now</a>
												</div>
												<div class="clear"> </div>
												<div class="lables">
													<p>Labels:<a href="#">Lorem</a></p>
												</div>
											</div>
										</div>
										<div class="clear"> </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>

	<section id="menu9" class="menu9-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 smap text-center">
          <div class="simg col-md-3">
            <a href="#page-top"><img class="smimg" src="images/knowledge_png.png" ></a>
          </div>
          <div class="smtop col-md-3">
            <h5 style=" color: white">COMPANY<br></h5><a class="sbm" href="index1.html#submenu6">Mission</a><br><a class="sbm" href="index1.html#submenu4">About us</a><br> <a class="sbm" href="index1.html#submenu8">Work with us</a>     
          </div>
          <div class="smmid col-md-3">
            <h5 style=" color: white">SUPPORT<br></h5><a class="sbm" href="#">Reach a Teacher</a><br><a class="sbm" href="#contact">Contact us</a><br>
          </div>
          <div class="smbot col-md-3">
            <h5 style=" color: white">GET READY<br></h5><a class="sbm" href="#submenu">Learning App</a><br><a class="sbm" href="#menu2">Training Lab</a><br>
          </div>
        </div>
      </div>
  	</div>
	</section>

  <?php include('includes/footer.php'); ?>