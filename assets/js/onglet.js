var $content = ("#content");
$content.easytabs({
  animate : true,
  updateHash : false,
  transitionIn : 'fadeIn',
  transitionOut : 'fadeOut',
  animationSpeed : 200,
  tabs : ".nav-item",
  tabActiveClass : 'active',
});

$content.find('.navbar-nav li a').hover(
  function(){
    $(this).stop().animate({ marginTop: "-5px" }, 200);
  },function(){
    $(this).stop().animate({ marginTop: "0px"}, 300);
  }
);
