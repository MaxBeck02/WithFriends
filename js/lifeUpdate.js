$(document).ready(function(e) {
    var refresher = setInterval("update_content();",30000); // 30 seconds
})

function update_content(){

    $.ajax({
      type: "GET",
      url: "../map.php", // post it back to itself - use relative path or consistent www. or non-www. to avoid cross domain security issues
      cache: false, // be sure not to cache results
    })
      .done(function( page_html ) {
        alert("LOADED");
    var newDoc = document.open("text/html", "replace");
    newDoc.write(page_html);
    newDoc.close();

    });   

}
