$(function() {

    var morrisData = [];

    var url = window.location.href;
    var path = "/siventa2/c_item/group";
    var host = new URL(url).host;
    var target = 'http://' + host + path;
    $.ajax({
        type: "POST",
        url: target,
        cache: false,
        success: function (response) {
            var length = Object.keys(response.items).length;
            for (let i = 0; i < length; i++) {
                const item = response.items[i];
                morrisData.push({ 'label': item.nm_kategori, 'value': item.total });
            }
            console.log(typeof(morrisData));
        },
        error: function () {
        }
    });

    Morris.Bar({
        element: 'bar-example',
        data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75, b: 65 },
            { y: '2008', a: 50, b: 40 },
            { y: '2009', a: 75, b: 65 },
            { y: '2010', a: 50, b: 40 },
            { y: '2011', a: 75, b: 65 },
            { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B']
    });

    Morris.Donut({
        element: 'morris-donut',
        data: morrisData,
        resize: true
    });


    
});


function kategori() { 
    var url = window.location.href;
    var path = "/siventa2/c_item/group";
    var host = new URL(url).host;
    var target = 'http://'+host+path;
    var data = "";
    $.ajax({
        type: "POST",
        url: target,
        cache: false,
        success: function (response) {
            data = response.items;
        },
        error: function () {
        }
    });
}

