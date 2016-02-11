	<?php wp_footer(); ?>

	<div id="emailForm">
		<p>Want to learn some do it yourself tips, 
		checkout our newest bad to the bone ride, 
		see the next event we have coming up? No prob, 
		sign up to stay in the know!</p>
		<div>
			<!-- <link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css"> -->
    <style type="text/css">
        #mc_embed_signup{ clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div id="mc_embed_signup">
    <form action="//timsautoupholstery.us12.list-manage.com/subscribe/post?u=ad556b361afec75ed584545da&amp;id=e85659a18c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
        <h2>Email Signup</h2>
        <p>Want to get tips, specials, and news from us periodically? Sign up to our newsletter!</p>
    <div class="mc-field-group">
        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
    </div>
        <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;"><input type="text" name="b_ad556b361afec75ed584545da_e85659a18c" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </div>
    </form>
    </div>
    
    <!--End mc_embed_signup-->
		</div>
	</div>

	<div id="footer">
    <a href="#" id="footerMobileNav">
      <i class="fa fa-bars"></i>
    </a>
		<?php wp_nav_menu(array(
          'theme_location'  => 'footer_nav',
          'menu'        => 'footer_nav',
          'container_id'    => 'footerMenu',
          'menu_id'       => 'footerMenu',
          'container'     => false,
        )); ?>

        <ul id="socialMedia">
          <li><a href="https://www.facebook.com/patriotcomputercare"><i class="fa fa-facebook-official"></i></a></li>
          <li><a href="https://twitter.com/PatriotCompCare"><i class="fa fa-twitter-square"></i></a></li>
          <li><a href="https://plus.google.com/+Patriotcomputercare"><i class="fa fa-google-plus-square"></i></a></li>
          <li><a href="https://www.youtube.com/c/Patriotcomputercare"><i class="fa fa-youtube-square"></i></a></li>
        </ul>
	</div>

  <div id="contactForm">
    <form action="">
      <input type="text" name="name" placeholder='Name'>
      <input type="text" name="email" placeholder='Email'>
      <input type="text" name="phone" placeholder='Phone'>
      <textarea name="need" id="" cols="30" rows="10" placeholder='Reason for inquiry'></textarea>
      <input type="submit">
    </form>  
  </div>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-71579685-1', 'auto');
      ga('send', 'pageview');

    </script>
</body>
</html>