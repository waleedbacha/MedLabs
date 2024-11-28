<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" type="text/css" href="design/style.css">

<link rel="stylesheet" type="text/css" href="design/font/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="design/font/css/font-awesome.css">
<link rel="shortcut icon" href="images/favicon.gif">


 <link href="design/css/carousel.css" rel="stylesheet">
    <link href="design/css/animate.min.css" rel="stylesheet">
	<link href="design/css/social-media.css" rel="stylesheet">
	<link href="design/css/animate.min.css" rel="stylesheet">
<script>
    function confirmDelete(link) {
        if (confirm("Are you sure to Delete?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    }
</script>

<script>
    function confirmEdit(link) {
        if (confirm("Are you sure to Update?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    }
</script>

<script>
    function confirmUpdate(link) {
        if (confirm("Are you sure to Return Book Now?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    }
</script>

<script>
    function confirmLost(link) {
        if (confirm("Are you sure that Member Lost Library Book?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    }
</script>

<script>
function inputLimiter(e,allow) {
    var AllowableCharacters = '';

    if (allow == 'Letters'){AllowableCharacters=' ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';}
    if (allow == 'Numbers'){AllowableCharacters='1234567890';}
    var k = document.all?parseInt(e.keyCode): parseInt(e.which);
    if (k!=13 && k!=8 && k!=0){
        if ((e.ctrlKey==false) && (e.altKey==false)) {
        return (AllowableCharacters.indexOf(String.fromCharCode(k))!=-1);
        } else {
        return true;
        }
    } else {
        return true;
    }
} 
</script>








<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">   
<link rel="stylesheet" href="css/datatable.css"></style>

<script src="css/jquery-datatable.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/datatable.js"></script>
<link rel="stylesheet" type="text/css" href="design/style.css">

<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>


