<div id="container_toast">
  <?php
  $this->showMessages();
  ?>
</div>
<script>
  window.onload = function() {
    toggleToast();
    // document.removeChild(x);
  }

  function toggleToast() {
    let container = document.getElementById("container_toast");
    let x = container.firstElementChild;
    x.className = "show";
    setTimeout(function() {
      x.className = x.className.replace("show", "");
    }, 3000);
  }
</script>