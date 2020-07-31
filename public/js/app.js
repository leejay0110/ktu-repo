$('#post-search-form').submit(function(e) {
                
    e.preventDefault();
    var url = $(this).attr("action")
    var form = $(this);

    $.ajax({
        type: "get",
        url: url,
        data: form.serialize(),
        success: function(data)
        {
            $("#search-posts-data").html(data);
        }
    })
});



$('#user-search-form').submit(function(e) {
                
    e.preventDefault();
    var url = $(this).attr("action")
    var form = $(this);

    $.ajax({
        type: "get",
        url: url,
        data: form.serialize(),
        success: function(data)
        {
            $("#search-users-data").html(data);
        }
    })

});




$('#menu-toggle, #app-overlay, #menu-close').click(function() {
    $('#app-menu, #app-overlay').toggle();
});