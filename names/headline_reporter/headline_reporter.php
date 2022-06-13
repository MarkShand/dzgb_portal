<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" type="text/css" href="../common/css/style.css">
   </head>
   <body>
      <div class="headline-container">
         <div class="container">
            <div class="box">
               <div id="headline-backdrop-top" class="headline-backdrop-top"></div>
               <div id="headline-backdrop-bottom" class="headline-backdrop-bottom"></div>
            </div>
            <div class="overlay">
               <div id="headline-top" class="headline-top"></div>
               <div id="headline-bottom" class="headline-bottom"></div>
            </div>
            <div class="overlay2">
               <div id="headline-text-container" class="headline-text-container">
                  <div id="headline-text" class="headline-text"></div>
               </div>
            </div>
         </div>
      </div>
      <div id="program" style="display:none;"></div>
      <div id="reporter" style="display:none;"></div>
      <div id="location" style="display:none;"></div>
   </body">
   <script type="text/javascript" src="../common/js/script.js"></script>
   <script type="text/javascript" src="../common/js/jquery.js"></script>
   <script type="text/javascript">
      showHeadlineData('headlineData');
      HideAnimation('Hide');
   </script>
</html>


