$(document).ready(function() {
    $('.add-to-cart').click(function(e) {
      e.preventDefault();
      var productId = $(this).data('product-id');
      var quantity = $(this).data('quantity');
      var url = $(this).data('url');
      
      $.ajax({
        url: url,
        type: 'POST',
        data: {
          product_id: productId,
          quantity: quantity,
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          // Gérer la réponse réussie
          alert('Produit ajouté au panier');
        },
        error: function(xhr) {
          // Gérer les erreurs
          alert('Échec d\'ajout du produit au panier');
        }
      });
    });
  });
  