// Select the main list and add the class "hasSubmenu" in each LI that contains an ul.san
$('ul.san').each(function(){
  $this = $(this);
  $this.find("li").has("ul.san").addClass("hasSubmenu");
});
// Find the last li in each level
$('li:last-child').each(function(){
  $this = $(this);
  // Check if LI has children
  if ($this.children('ul.san').length === 0){
    // Add border-left in every ul.san where the last LI has not children
    $this.closest('ul.san').css("border-left", "1px solid gray");
  } else {
    // Add border in child LI, except in the last one
    $this.closest('ul.san').children("li").not(":last").css("border-left","1px solid gray");
    // Add the class "addBorderBefore" to create the pseudo-element :defore in the last li
    $this.closest('ul.san').children("li").last().children("a").addClass("addBorderBefore");
    // Add margin in the first level of the list
    $this.closest('ul.san').css("margin-top","20px");
    // Add margin in other levels of the list
    $this.closest('ul.san').find("li").children("ul.san").css("margin-top","20px");
  };
});
// Add bold in li and levels above
$('ul.san li').each(function(){
  $this = $(this);
  $this.mouseenter(function(){
    $( this ).children("a").css({"font-weight":"bold","color":"#336b9b"});
  });
  $this.mouseleave(function(){
    $( this ).children("a").css({"font-weight":"normal","color":"#428bca"});
  });
});
// Add button to expand and condense - Using FontAwesome
$('ul.san li.hasSubmenu').each(function(){
  $this = $(this);
  $this.prepend("<a href='#'><i class='fa fa-minus-circle'></i><i style='display:none;' class='fa fa-plus-circle'></i></a>");
  $this.children("a").not(":last").removeClass().addClass("toogle");
});
// Actions to expand and consense
$('ul.san li.hasSubmenu a.toogle').click(function(){
  $this = $(this);
  $this.closest("li").children("ul.san").toggle("slow");
  $this.children("i").toggle();
  return false;
});