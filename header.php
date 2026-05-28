<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Google Tag Manager -->
  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', '<?php echo esc_js(lp_field('gtm_id', 'GTM-TTCZ6RF')); ?>');
  </script>
  <!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="<?php echo esc_url(lp_field('favicon', get_template_directory_uri() . '/img/favicon.ico')); ?>" type="image/x-icon" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr(lp_field('gtm_id', 'GTM-TTCZ6RF')); ?>" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Roistat Counter Start -->
<?php if (lp_field('roistat_id', '0926e9d36649c864b00475ec0f2b6681')) : ?>
<script>
(function (w, d, s, h, id) {
  w.roistatProjectId = id;
  w.roistatHost = h;
  var p = d.location.protocol == 'https:' ? 'https://' : 'http://';
  var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? '/dist/module.js' : '/api/site/1.0/' + id + '/init?referrer=' + encodeURIComponent(d.location.href);
  var js = d.createElement(s);
  js.charset = 'UTF-8';
  js.async = 1;
  js.src = p + h + u;
  var js2 = d.getElementsByTagName(s)[0];
  js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '<?php echo esc_js(lp_field('roistat_id', '0926e9d36649c864b00475ec0f2b6681')); ?>');
</script>
<?php endif; ?>
<!-- Roistat Counter End -->
