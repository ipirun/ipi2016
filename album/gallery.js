$(document).on('ready', function(){
  //Au moment du chargement de la bibliotheque JQuery
  //Une fois que la page complete a été chargé

  $('body').on('click', 'img.thumbnail', function(){
    //Evenement clique des images
    var source_img_click = $(this).attr('src');
    //Récupération de la source de l'image
    $('#myModal img').attr('src', source_img_click);
    //Insertion de l'image dans la modal
  });


});
