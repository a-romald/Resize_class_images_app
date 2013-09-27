$(function() {
    $('a.prod_images').click(function(e) {
        var href = $(this).attr('href');
        var params = "width=800,height=600,menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes"
        window.open(href, "Image", params);
        
        e.preventDefault();
    });
})
