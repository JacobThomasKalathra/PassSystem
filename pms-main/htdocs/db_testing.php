<html>
<head>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

  <style type='text/css'>
a.previous { display:none; }
.demo { width:960px; margin:50px auto;}
span {
  display: none;
  color: Red;
}

table.pms tr { display: none; }

table.pms tr:nth-child(-n+2) { display: table-row; }
</style>

</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type='text/javascript'>//<![CDATA[ 

  $(document).ready(function () {
        // number of records per page
        var pageSize = 2;
        // reset current page counter on load
        $("#hdnActivePage").val(1);
        // calculate number of pages
        var numberOfPages = $('table tr').length / pageSize;
        numberOfPages = numberOfPages.toFixed();
        // action on 'next' click
        $("a.next").on('click', function () {
            // show only the necessary rows based upon activePage and Pagesize
            $("table.pms tr:nth-child(-n+" + (($("#hdnActivePage").val() * pageSize) + pageSize) + ")").show();
            $("table.pms tr:nth-child(-n+" + $("#hdnActivePage").val() * pageSize + ")").hide();
            var currentPage = Number($("#hdnActivePage").val());
            // update activepage
            $("#hdnActivePage").val(Number($("#hdnActivePage").val()) + 1);
            // check if previous page button is necessary (not on first page)
            if ($("#hdnActivePage").val() != "1") {
                $("a.previous").show();
                $("span").show();
            }
            // check if next page button is necessary (not on last page)
            if ($("#hdnActivePage").val() == numberOfPages) {
                $("a.next").hide();
                $("span").hide();
            }
        });
        // action on 'previous' click
        $("a.previous").on('click', function () {
            var currentPage = Number($("#hdnActivePage").val());
            $("#hdnActivePage").val(currentPage - 1);
            // first hide all rows
            $("table.pms tr").hide();
            // and only turn on visibility on necessary rows
            $("table.pms tr:nth-child(-n+" + ($("#hdnActivePage").val() * pageSize) + ")").show();
            $("table.pms tr:nth-child(-n+" + (($("#hdnActivePage").val() * pageSize) - pageSize) + ")").hide();
            // check if previous button is necessary (not on first page)
            if ($("#hdnActivePage").val() == "1") {
                $("a.previous").hide();
                $("span").hide();
            } 
            // check if next button is necessary (not on last page)
            if ($("#hdnActivePage").val() < numberOfPages) {
                $("a.next").show();
                $("span").show();
            } 
            if ($("#hdnActivePage").val() == 1) {
                $("span").hide();
            }
        });
    });    
//]]>  

</script>
<?php
include("config.php");
// Create connection to Oracle

$query = 'select userid,description,password from password_list';
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);

// Fetch each row in an associative array

print '<table><tr><td>ID</td><td>Description</td><td>Password</td></tr></table>';
print '<table class="pms">';
 
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '"<input id='$id' class='submit' value='GET' type='submit'>"';
   print '</tr>';
}

print '</table>';
echo '<a class="previous">Previous</a><span> - </span><a class="next">Next</a>
<input type="hidden" id="hdnActivePage" value="1" />
<br />
<br />';



?>
</html>