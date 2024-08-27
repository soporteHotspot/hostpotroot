/*
Template Name: Admin Template
Author: Wrappixel

File: js
*/
// ==============================================================
// Auto select left navbar
// ==============================================================

 var back = ["bg-danger text-white","bg-purple text-white","bg-primary text-white","bg-cyan text-white","bg-black text-white","bg-secondary text-white","bg-success text-white", "bg-light text-dark" ];
  var rand = back[Math.floor(Math.random() * back.length)];
$(function () {
  "use strict";
  var url = window.location + "";
  var path = url.replace(
    window.location.protocol + "//" + window.location.host + "/",
    ""
  );
  var element = $("ul#sidebarnav a").filter(function () {
    return this.href === url || this.href === path; // || url.href.indexOf(this.href) === 0;
  });
  element.parentsUntil(".sidebar-nav").each(function (index) {
    if ($(this).is("li") && $(this).children("a").length !== 0) {
      $(this).children("a").addClass("bg-primary text-white");
      $(this).parent("ul#sidebarnav").length === 0
        ? $(this).addClass("border border-white rounded" )
        : $(this).addClass("menu-open");
    } else if (!$(this).is("ul") && $(this).children("a").length === 0) {
      $(this).addClass("menu-open");
    } else if ($(this).is("ul")) {
      $(this).addClass("in");
    }
  });

  $('.input-group-text').addClass(rand);
   $('.input').addClass(rand);
   $('.modal-header').addClass(rand);
    

   


  element.addClass(rand);
  $("#sidebarnav a").on("click", function (e) {
    if (!$(this).hasClass("bg-danger text-white ")) {
      // hide any open menus and remove all other classes
      $("ul", $(this).parents("ul:first")).removeClass("in");
      $("a", $(this).parents("ul:first")).removeClass("active");

      // open our new menu and add the open class
      $(this).next("ul").addClass("in");
      $(this).addClass(rand);
    } else if ($(this).hasClass("bg-danger text-white")) {
      $(this).removeClass("bg-danger text-white");
      $(this).parents("ul:first").removeClass("bg-danger text-white");
      $(this).next("ul").removeClass("in");
    }
  });
  $("#sidebarnav >li >a.has-arrow").on("click", function (e) {
    e.preventDefault();
  });
});



