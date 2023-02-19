<?php include('includes/header.php'); ?>
<?php include('includes/posts.php') ?>


	    <div class="container">

	      <div class="blog-header">
	        <h1 class="blog-title">The Bootstrap Blog</h1>
	        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
	      </div>

	      <div class="row">

	        <div class="col-sm-8 blog-main">
	        	<?php foreach( $posts as $post ) { ?>	
	          <div class="blog-post">
	    		<h2 class="blog-post-title"><?php echo $post['post-title']; ?></h2>
	    		<p class="blog-post-meta"><?php echo $post['post-date']; ?> by <?php echo $post['post-author']; ?></p>

	    		<?php echo $post['post-content']; ?>

	          </div><!-- /.blog-post -->
	          <?php } ?>
	          <nav>
	            <ul class="pager">
	              <li><a href="#">Previous</a></li>
	              <li><a href="#">Next</a></li>
	            </ul>
	          </nav>

	        </div><!-- /.blog-main -->

	        <?php include('includes/sidebar.php'); ?>

	      </div><!-- /.row -->

	    </div><!-- /.container -->

	    <?php include('includes/footer.php'); ?>
    <!-- jQuery -->
	<script>window.jQuery || document.write('<script src="../js/jquery-3.1.1.js"><\/script>')</script>

	<!-- Bootstrap JS -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
   	</body>

</html>