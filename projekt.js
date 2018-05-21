/*    */
jQuery(document).ready(function() {
  search = jQuery('.aktion input');
  search.hide();
});

jQuery(document).on('click', '.aktion > div:first-child > a', function() {
  switch (search.css('display')) {
    case 'block':
      alert(search.val());
      break;
    case 'none':
      search.show();
      break;
    default:
      break;
  }
});

jQuery(document).on('blur', '.aktion input', function() {
  search.hide();
});

jQuery(document).on('click', '.aktion > div:nth-child(2) > a', function() {
  alert('Bearbeiten');
});

jQuery(document).on('click', '.aktion > div:nth-child(3) > a', function() {
  alert('Entlassen');
});
