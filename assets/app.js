/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import $ from 'jquery';
/*
var responsive_menu = $('#responsive_menu');
responsive_menu.on('click', function(e){
    e.preventDefault();
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
})
*/
/*
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
}*/
var $container = $('.navbar');
$container.find('.navbar-toggler').on('click', function(e){
    e.preventDefault();
    //alert("hey")
})
//console.log("hello");

/************* search in show.html.twig **************/
    $('#content').find("input[name='search']").on('keyup', function(e){
        e.preventDefault();
        console.log('searching')
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    })

    $('#content').find(".dropbtn").on('click', function(e){
      e.preventDefault();
      console.log('hovering...')
      document.getElementById("myDropdown").classList.toggle("show");
    })

    $('#dirpm').on('click', function(e){
      console.log('click...')
      document.getElementById("myDropdown").classList.toggle("show");
    });

    $("select#myDropdown").on('change',function(){
        var selectedVal = $(this).children("option:selected").val();
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
/************* end search in show.html.twig **************/