<?php
//place this code on top of all the pages which you need to authenticate

//--- Authenticate code begins here ---
session_start();
//checks if the login session is true
if(!$_SESSION['sess_user']){
header("location:..\login.php");
}
$username = $_SESSION['sess_user'];

// --- Authenticate code ends here ---
?>

<?php include ('header.php'); ?>

<?php
 if (isset($_POST['note'])) { $note = $_POST['note'];  } ;
 if (isset($_POST['color'])) { $color = $_POST['color'];  } ;
 if (isset($_REQUEST['delete'])) { $delete = $_REQUEST['delete'];  } ;


if(isset($note))
{
$query = mysqli_query($con,"INSERT INTO sticky_notes (username, message, color) VALUES ('$username', '$note', '$color')");
}

if(isset($delete))
{
$success = mysqli_query($con,"DELETE FROM sticky_notes WHERE id='$delete'");
}
$document_get = mysqli_query($con,"SELECT * FROM user WHERE email='$username'");
$match_value = mysqli_fetch_array($document_get,MYSQLI_ASSOC);
$fullname = $match_value['User_Name'];

?>
<br/>
<div class="container">
 <div style="float:right"> <a href="#addnote" role="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Add Note</a> <a class="btn btn-info logout" href="../newhome.html" ><span class="glyphicon glyphicon-log-out"></span> Go back</a></div><br/><br/>
<div id="containment-wrapper" style="position: absolute; width: 100%; left: 0px; right: 0px; height: 100%;">
  <?php
  $sql = mysqli_query($con,"SELECT * FROM sticky_notes where username='$username'");

	while ($obj = mysqli_fetch_array($sql,MYSQLI_ASSOC))
	{
	$id = $obj['id'];
	$message = $obj['message'];
	$left = $obj['_left'];
	$top = $obj['_top'];
	$color = $obj['color'];

	?>

  <div id="draggable-<?php echo $id; ?>" class="draggable " onchange="javascript:position(this)" style="position:absolute; left: <?php echo $left; ?>px; top: <?php echo $top; ?>px">
	<img class="pin" src="pin.png" alt="pin" />

    <blockquote class="quote-box note-<?php echo $color; ?>">

      <p class="quote-text" id="content-<?php echo $id;?>">
        <?php echo $message; ?>
      </p>
      <hr>
      <div class="blog-post-actions">
        <p>
         <button class="btn btn-primary popEdit pull-left" data-toggle='tooltip' title="Edit" onClick="popOverEdit(<?php echo $id;?>)" id="pop-<?php echo $id;?>"><span class="glyphicon glyphicon-edit"></span></button>
         <div class="popover-markup blog-post-bottom" >

    <div class="head hide">Edit</div>
    <div class="content hide" id="popoverContent<?php echo $id;?>">
        <div class="form-group">
            <textarea id="<?php echo $id; ?>"  class="quick" ><?php echo $message; ?></textarea>
        </div>
       <button data-vendor-id="" data-act="send" onClick="getText(<?php echo $id;?>)" class="btn btn-info save_notes">Save</button>
    </div>
</div>
        </p>
        <p class="blog-post-bottom pull-right">
        <a class="delete" href="?delete=<?php echo $id; ?>" style="float:right">   <button class="btn btn-danger"  title="delete"><span class="glyphicon glyphicon-trash"></span></button> </a>
        </p>
      </div>
    </blockquote>

  </div>

<?php } ?>

</div>

 <script>

  jQuery(function() {
	 <?php
  $sql = mysqli_query($con,"SELECT * FROM sticky_notes where username='$username'");

	while ($obj = mysqli_fetch_array($sql,MYSQLI_ASSOC))
	{
	$id = $obj['id'];
	?>

    jQuery( "#draggable-<?php echo $id; ?>" ).draggable({ containment: "#containment-wrapper", scroll: false ,

    // Find position where image is dropped.
    stop: function(event, ui) {

    	// Show dropped position.
    	var Stoppos = $(this).position();
		model = {
			id: <?php echo $id; ?>,
            left: Stoppos.left,
			top: Stoppos.top
             };

			 $.ajax({
			  url: "save.php",
			  type: "post",
			  data: model,
			  success: function(data){

jQuery.HP({
	title: "Success!",
      message: "Saved..."
    });
			  },
			  error:function(){
				  alert('error is saving');
			  }
			});



    }
	});

	<?php
	}
	?>

  });

function getText(id){
	var popover = $('#pop-'+id);
	var id =id;
	var text = $("#"+id).val();

	 position = $('#draggable-'+id).attr("style");
	data = {
            id: id,
			text: text
             };
	 $.ajax({
      url: "save.php",
      type: "post",
      data: data,
      success: function(datas){
		  popover.popover('destroy').popover({
			  		title: 'Edit <a class="close" href="#");">&times;</a>',
                       content: $('#popoverContent'+id).html(datas.other),
                    })
                    .popover('show');
		   $('#content-'+id).html(datas.data);
		 // $('.success_msg').show().fadeIn(2000).fadeOut(4000);
		 jQuery.HP({
		title : "Success!",
        message: "saved...!"
      });
      },
      error:function(){
         jQuery.HP.error({
		title : "Fail!",
        message: "Error in saving...!"
      });
      }
    });
}

$('body').attr("style", "background: url('')");

  </script>

  <br/> <br/>


  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <form action="dashboard.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Write your Preference</h4>
      </div>
      <div class="modal-body">
       <div style="width:94%;padding:10px; text-align:center;">


<h3> Write Note </h3>
<textarea name="note" style="width:100%; max-width:100%; height:150px; max-height:150px;"></textarea>
<br/>
<b> Choose Note Color </b>
<br/>
<table style="width:100%;text-align: center;">
<tr>
<td> <input type="radio" name="color" value="1" checked /> </td>
<td> <input type="radio" name="color" value="2" />  </td>
<td> <input type="radio" name="color" value="3" />  </td>
</tr>

<tr>
<td> <div style="width:100px;  height: 100px; background:#FDFB8C; border: 1px solid #DEDC65; margin: 0 auto;width: 100px;">  </div> </td>
<td> <div style="width:100px;  height: 100px; background:#A5F88B; border: 1px solid #98E775; margin: 0 auto;width: 100px;"> </div> </td>
<td> <div style="width:100px;  height: 100px; background:#A6E3FC; border: 1px solid #75C5E7;margin: 0 auto;width: 100px;"> </div> </td>
</tr>

</table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    <input type="submit" class="btn btn-primary" value="Save changes" />

      </div></form>
    </div>

  </div>
</div>



</div>


 <script>
$(document).ready(function(e) {



$('.delete').click(function(){
    return confirm("Are you sure you want to Delete it?");
});

	$.noConflict();
});
function popOverEdit(id)
{

$("#pop-"+id).popover({
    html: true,
	placement : 'bottom',
    title: 'Edit <a class="close" href="#");">&times;</a>',
    content: $('#popoverContent'+id).html(),
});
$('#pop-'+id).click(function (e) {
    e.stopPropagation();
});

$(document).click(function (e) {
	e.preventDefault();
    if ($(e.target).is('.close')) {
        $('#pop-'+id).popover('hide');
    }
	});

}
</script>
	</div>
<?php include ('footer.php'); ?>
