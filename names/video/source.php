<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <style>
   .container {
      position: relative;
      width: 100%;
      overflow: hidden;
   }
   .responsive-iframe {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      width: 100%;
      height: 100%;
      border: none;
   }
</style>
</head>
<body>
   <iframe id="video" class="responsive-iframe" src="" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
</body>
<script type="text/javascript" src="../common/js/script.js"></script>
<script type="text/javascript" src="../common/js/jquery.js"></script>
<script>
show_embedded_live();
</script>

</html>
