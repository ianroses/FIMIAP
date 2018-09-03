

$(document).ready(function() {
    $('select').material_select();

});


// Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
      
      
$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
);
      
// Show sideNav
  $('.button-collapse').sideNav('show');
  // Hide sideNav
  $('.button-collapse').sideNav('hide');
  // Destroy sideNav
  $('.button-collapse').sideNav('destroy');


//Using: https://github.com/chingyawhao/materialize-clockpicker/
//Time Picker:
$('.timepicker').pickatime({
    default: 'now',
    twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
    donetext: 'OK',
  autoclose: false,
  vibrate: true // vibrate the device when dragging clock hand
});


//horario de asesorías. Form con condición: http://stackoverflow.com/questions/21777481/conditional-form-depending-on-answers-in-select-list-not-working
$('.form-div2, .form-div3, .form-div4, .form-div5').show();
$('.form-div42').hide();

$('#user').change(function () {
    var selected = $('#user option:selected').text();
    $('.form-div2, .form-div3').toggle(selected == "I'm a first-time user");
});

$('#product').change(function () {
    var selected = $('#product option:selected').text();
    $('.form-div42').toggle(selected == "Other");

});


function imprimir(){
    alert("Guardando reporte en tu dispositivo");
}