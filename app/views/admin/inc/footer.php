<!-- FOOTER -->
<footer class="text-center py-2">
   <div class="container">
      <small><span><?= SITENAME ?> </span><i class="fa fa-copyright" aria-hidden="true"></i>
         <?= date('Y') ?> | All right reserved
      </small>
      <p class="m-0">Developer:
         <a href="mailto:thomasangel697@gmail.com" class="text-dark" style="text-decoration: underline !important; color: var(--main-color) !important;">iCode</a>
      </p>
   </div>
</footer>

<?php require_once "modals.php"; ?>
<?php require_once APPROOT . "/views/inc/script-links.php"; ?>

<script>
   // SET AVTIVE NAV-BAR COLOR
   function setActive() {
      let navbar = document.getElementById('nav-bar');
      let a_tags = navbar.getElementsByTagName('a');

      for (i = 0; i < a_tags.length; i++) {
         let file = a_tags[i].href.split('/').pop();
         let file_name = file.split('.')[0];

         if (document.location.href.indexOf(file_name) >= 0) {
            a_tags[i].classList.add('active');
         }
      }
   }
   setActive();
</script>

</body>

</html>