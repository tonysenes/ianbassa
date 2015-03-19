 <?php global $bub_mt; ?>
        </div>
        <!-- Content Section -->
    </div>
</div>
<!-- Main Container end -->
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <?php get_sidebar(); ?>
        </div>

        <hr/>
        <div class="copyright"> <?php echo $bub_mt['footer_text'];?></div>
        <div class="info">
            <ul>
                <li><i class="mt-html5"></i></li>
                <li><i class="mt-css3"></i></li>
                <li><i class="mt-chrome"></i></li>
                <li><i class="mt-firefox"></i></li>
                <li><i class="mt-safari"></i></li>
                <li><i class="mt-IE"></i></li>
                <li><i class="mt-opera"></i></li>
            </ul>

        </div>
    </div>
</footer>
<!-- Footer end -->
<!-- special IE-only canvas fix -->
<!--[if IE]><script type="text/javascript" src="player/script/excanvas.js"></script><![endif]-->

<script type="text/javascript">
jQuery( document ).ready( function( $ ) {
soundManager.setup({
  // path to directory containing SM2 SWF
  url: '<?php echo get_template_directory_uri(); ?>/player/swf/'
});

threeSixtyPlayer.config.scaleFont = (navigator.userAgent.match(/msie/i)?false:true);
threeSixtyPlayer.config.showHMSTime = true;

// enable some spectrum stuffs

threeSixtyPlayer.config.useWaveformData = true;
threeSixtyPlayer.config.useEQData = true;

// enable this in SM2 as well, as needed

if (threeSixtyPlayer.config.useWaveformData) {
  soundManager.flash9Options.useWaveformData = true;
}
if (threeSixtyPlayer.config.useEQData) {
  soundManager.flash9Options.useEQData = true;
}
if (threeSixtyPlayer.config.usePeakData) {
  soundManager.flash9Options.usePeakData = true;
}

if (threeSixtyPlayer.config.useWaveformData || threeSixtyPlayer.flash9Options.useEQData || threeSixtyPlayer.flash9Options.usePeakData) {
  // even if HTML5 supports MP3, prefer flash so the visualization features can be used.
  soundManager.preferFlash = true;
}

// favicon is expensive CPU-wise, but can be used.
if (window.location.href.match(/hifi/i)) {
  threeSixtyPlayer.config.useFavIcon = true;
}

if (window.location.href.match(/html5/i)) {
  // for testing IE 9, etc.
  soundManager.useHTML5Audio = true;
}
        <?php if(isset($bub_mt['gmap_address']) && $bub_mt['gmap_address'] != '') { ?> 
    //Google Maps
      $('#gmap').gmap3({
        marker:{address:"<?php echo $bub_mt['gmap_address'];?>", options:{icon: "<?php echo get_template_directory_uri(); ?>/img/location1.png"}},
        map:{
            options:{
              zoom: 14
            }
           }
      });
         <?php } ?> 
  });
</script>
<?php global $bub_mt;
if(isset($bub_mt['integration_footer'])) echo $bub_mt['integration_footer'] . PHP_EOL; ?>

 <?php wp_footer(); ?>
  <a class="scroll-top" href="#" title="Scroll to top">Top</a>
  </body>
</html>