$(document).ready(function() {
            $('#selPj').on('change', function() {
               var $form = $(this).closest('form');
               $form.find('input[type=submit]').click();
            });
        });