var xmlhttp;
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
}
else
{// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
var comment_loading = false;
var comment_page = 1;
function postComments() {
    xmlhttp.open("POST", "index.php?page=comment/add", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    post_id = document.getElementById("post_id").value;
    desc = document.getElementById("desc").value;
    if (desc != '') {
        document.getElementById('btn_post_comment').disabled = true;
        xmlhttp.send("comment[post_id]=" + post_id + "&comment[description]=" + desc);

    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById('btn_post_comment').disabled = false;
            if (xmlhttp.responseText == "success") {
                var c_html = document.getElementById("comments_list").innerHTML;
                document.getElementById("comments_list").innerHTML = "<li>" + desc + "<li>" + c_html;
            }
        }
    }
}

function loadComments() {
    if (!comment_loading) {
        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                comment_loading = false;
                comment_page++;
                appendAjaxReponse(xmlhttp.responseText);
            }

        }
        xmlhttp.open("GET", "index.php?page=comment/index/" + document.getElementById("post_id").value+"&p_indx="+comment_page, true);
        xmlhttp.send();
        comment_loading = true;
    }

}

function appendAjaxReponse(response) {
    var rs = document.getElementById("comments_list").innerHTML;
    document.getElementById("comments_list").innerHTML = rs + response;
}
