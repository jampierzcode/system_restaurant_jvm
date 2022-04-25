$(document).ready(function () {
  $(".drop-down-menu").click(() => {
    $(".aside-dashboard").toggleClass("closed_sidebar");
    $(".navbar-dashboard").toggleClass("close_sidebar");
    $(".container-dashboard").toggleClass("close_sidebar");
    $(".overlay-sidebar").toggleClass("overlay-sidebar-show");
  });
  $(".overlay-sidebar").click(() => {
    $(".aside-dashboard").toggleClass("closed_sidebar");
    $(".navbar-dashboard").toggleClass("close_sidebar");
    $(".container-dashboard").toggleClass("close_sidebar");
    $(".overlay-sidebar").toggleClass("overlay-sidebar-show");
  });
});
