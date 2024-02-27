<?php
$database = mysqli_connect('localhost', 'root', '', 'atbmtt');
if (!$database) {
	echo "Ket noi databse that bai!";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bootstrap 4 Blog Template For Developers</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Blog Template">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- FontAwesome JS-->
	<script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>

	<!-- Plugin CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/styles/monokai-sublime.min.css">

	<!-- Theme CSS -->
	<link id="theme-style" rel="stylesheet" href="assets/css/theme-1.css">

	<style>
		.pre-wrap {
			white-space: pre-wrap;
		}

		.blog {
			width: 80%;
			margin: auto;
			margin-top: 50px
		}
	</style>
</head>

<body>

	<header class="header text-center">
		<h1 class="blog-name pt-lg-4 mb-0"><a href="index.php">Group 9</a></h1>

		<nav class="navbar navbar-expand-lg navbar-dark">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navigation" class="collapse navbar-collapse flex-column">
				<div class="profile-section pt-3 pt-lg-0">
					<img class="profile-image mb-3 rounded-circle mx-auto" src="assets/images/profile3.jpg" alt="image">

					<div class="bio mb-3">Chào mừng bạn đến với trang blog Lỗ Hỏng Web/App/OS! Tại đây, chúng tôi tập trung vào việc chia sẻ kiến thức về bảo mật web/app/os và các lỗ hổng phổ biến mà các nhà phát triển và chủ sở hữu trang web/app/os có thể gặp phải.</div><!--//bio-->
					<ul class="social-list list-inline py-3 mx-auto">
						<li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-github-alt fa-fw"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-codepen fa-fw"></i></a></li>
					</ul><!--//social-list-->
					<hr>
				</div><!--//profile-section-->

				<ul class="navbar-nav flex-column text-left">
					<li class="nav-item active">
						<a class="nav-link" href="index.php"><i class="fas fa-home fa-fw mr-2"></i>Blog Home <span class="sr-only">(current)</span></a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="blog-post.html"><i class="fas fa-bookmark fa-fw mr-2"></i>Blog Post</a>
					</li> -->
					<?php
					$query = 'SELECT * FROM tbl_danhMuc';
					$sql = mysqli_query($database, $query);
					if (!$sql) {
						echo " Truy van that bai";
					}
					if (mysqli_num_rows($sql) > 0) {
						while ($row = mysqli_fetch_array($sql)) {
							echo "
								<li class='nav-item'>
									<a class='nav-link' href='blog-list.php?id=" . $row['id_danhMuc'] . "'><i class='fas fa-bookmark fa-fw mr-2'></i>" . $row['tenDanhMuc'] . "</a>
								</li>
								";
						}
					}
					?>
					<!-- <li class="nav-item">
						<a class="nav-link" href="about.html"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
					</li> -->
				</ul>

				<div class="my-2 my-md-3">
					<a class="btn btn-primary" href="https://themes.3rdwavemedia.com/" target="_blank">Get in Touch</a>
				</div>
			</div>
		</nav>
	</header>

	<div class="main-wrapper">
		<?php
		$query = "SELECT * FROM tbl_danhMuc, tbl_noiDung WHERE tbl_danhMuc.id_danhMuc = tbl_noiDung.id_danhMuc AND tbl_noiDung.id_noiDung = '$_GET[id]' LIMIT 1";
		$sql = mysqli_query($database, $query);
		if (!$sql) {
			echo " Truy van that bai";
		}
		if (mysqli_num_rows($sql) > 0) {
			while ($row = mysqli_fetch_array($sql)) {
				echo "
								<div class = 'blog'>
									
									<h1>" . $row['tenNoiDung'] . "</h1>
									<h3>Định Nghĩa</h3>
									<pre class='pre-wrap'>" . $row['dinhNghia'] . "</pre>
									<h3>Dấu hiệu nhận biết</h3>
									<pre class='pre-wrap'>" . $row['dauHieu'] . "</pre>
									<h3>Biện pháp: </h3>
									<pre class='pre-wrap'>" . $row['bienPhap'] . "</pre>
								</div>
								";
			}
		}
		?>


		<footer class="footer text-center py-2 theme-bg-dark">

			<!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
			<small class="copyright">"Thông tin trên trang web này chỉ để tham khảo và giáo dục. Không chúng tôi chịu trách nhiệm về tổn thất hoặc hậu quả do việc sử dụng thông tin này. Luôn áp dụng biện pháp bảo mật và cập nhật hệ điều hành và ứng dụng của bạn. Thông tin được thu thập từ nguồn đáng tin cậy và cập nhật đến ngày [ngày cập nhật]. Kiểm tra thông tin từ nguồn đáng tin cậy khác. Liên hệ với chúng tôi nếu phát hiện lỗ hỏng hoặc có thông tin bổ sung. Xin cảm ơn đóng góp của bạn."</small>
		</footer>

	</div><!--//main-wrapper-->


	<!-- *****CONFIGURE STYLE (REMOVE ON YOUR PRODUCTION SITE)****** -->
	<div id="config-panel" class="config-panel d-none d-lg-block">
		<div class="panel-inner">
			<a id="config-trigger" class="config-trigger config-panel-hide text-center" href="#"><i class="fas fa-cog fa-spin mx-auto" data-fa-transform="down-6"></i></a>
			<h5 class="panel-title">Choose Colour</h5>
			<ul id="color-options" class="list-inline mb-0">
				<li class="theme-1 active list-inline-item"><a data-style="assets/css/theme-1.css" href="#"></a></li>
				<li class="theme-2  list-inline-item"><a data-style="assets/css/theme-2.css" href="#"></a></li>
				<li class="theme-3  list-inline-item"><a data-style="assets/css/theme-3.css" href="#"></a></li>
				<li class="theme-4  list-inline-item"><a data-style="assets/css/theme-4.css" href="#"></a></li>
				<li class="theme-5  list-inline-item"><a data-style="assets/css/theme-5.css" href="#"></a></li>
				<li class="theme-6  list-inline-item"><a data-style="assets/css/theme-6.css" href="#"></a></li>
				<li class="theme-7  list-inline-item"><a data-style="assets/css/theme-7.css" href="#"></a></li>
				<li class="theme-8  list-inline-item"><a data-style="assets/css/theme-8.css" href="#"></a></li>
			</ul>
			<a id="config-close" class="close" href="#"><i class="fa fa-times-circle"></i></a>
		</div><!--//panel-inner-->
	</div><!--//configure-panel-->



	<!-- Javascript -->
	<script src="assets/plugins/jquery-3.3.1.min.js"></script>
	<script src="assets/plugins/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Page Specific JS -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/highlight.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/blog.js"></script>

	<!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
	<script src="assets/js/demo/style-switcher.js"></script>


</body>

</html>