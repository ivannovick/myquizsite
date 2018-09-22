<?php
    include_once('components/header.php');
?>
<article class="talk">

  <p>This site helps you to learn the fundamentals of the <?= $language->get_normalized_name() ?> programming language.</p>
  
  <div>The goals of this site are: 
  		
  		<ol class="goals-list">
  			<li> Fast Site</li>
  			<li> Bug Free</li>
  			<li> Foundational Knowledge</li> 
  		</ol>

  </div>	
  	
  <p>If you notice any mistakes in the answers please send an email to the address shown at the bottom of the page.  Or feel free to contact us with any other comments or sugestions about the site.</p>

</article> <!-- talk -->

<div class="ghome_add">
    <?php include 'components/google_home.php' ?>
</div>
</main> <!-- maincontent -->
 <?php include('components/footer.php') ?>
 <?php include('components/google_analytics.php'); ?>
</body>
</html>
