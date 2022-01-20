$(document).ready(function() {
    resize_to_fit();
    });
    
    function resize_to_fit() {
        var fontsize = $('div.card-body #nama h4').css('font-size');
        console.log(fontsize)
        var that = $('div.card-body #nama h4'),
            textLength = that.text().length;
        console.log(textLength) // maks length: 110
        if(textLength >= 110) {
            that.css('font-size', '1.18em');
        } else if(textLength >= 80) {
            that.css('font-size', '2em');
        } else if(textLength >= 70) {
            that.css('font-size', '1.35em');
        }
    }

$(document).ready(function() {
    resize_to_fit2();
    });

    function resize_to_fit2() {
    console.log($('div.card-body #webinar p'));
    var fontsize2 = $('div.card-body #webinar p').css('font-size');
    console.log(fontsize2);
    var fontsize3 = $('div.card-body #webinar a').css('font-size');
    console.log(fontsize3)
    console.log($('div.card-body #webinar').height())
    
    if ($('div.card-body #webinar table').height() >= 210) { // maks high content: 218
        $('div.card-body #webinar p').css('fontSize', parseFloat(fontsize2) - 3);
        $('div.card-body #webinar a').css('fontSize', parseFloat(fontsize3) - 3);
        console.log($('div.card-body #webinar').height());
    }
}