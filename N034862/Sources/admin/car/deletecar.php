<?php

//index.php
include('connect.php');
$output = '';
$query = "SELECT * FROM car ORDER BY id_car DESC";
$result = mysqli_query($connect, $query);

?>  
    <body>  
        <div class="container">  
            <br />
   <div class="table-responsive">  
    <h3 align="center">Delete Xe</h3><br />
    <div class="row   container col-md-12" style="margin-bottom: 20px;">
        <div class="col-md -11">
            
        </div>
         <div class="col-md -2">
            <input type="text" class="search form-control" name="">
        </div>
         <div class="col-md-1">
             <th width="5%"><button type="button" id="search_btn" class="btn btn-danger btn-xs" style="ma">Search</button></th>
         </div>
        
        
    </div>
    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="5%"><button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs">Delete</button></th>
                              <th width="10%">carname</th>
                              <th width="55%">describe</th>
                              <th width="20%">image</th>
                              <th width="10%">seats</th>
                              <th width="2%">licenseplate</th>
                              <th width="3%">license</th>
                        </tr>
                        </thead>
                        <?php
                        foreach($result as $row)
                        {
                            echo '
                            <tr>
                                <td class="danhsach">
                                    <input type="checkbox" class="delete_checkbox" value="'.$row["id_car"].'" />
                                </td>
                                <td>'.$row["carname"].'</td>
                                <td>'.$row["describe"].'</td>
                                <td>'.$row["image"].'</td>
                                <td>'.$row["seats"].'</td>
                                <td>'.$row["licenseplate"].'</td>
                                <td>'.$row["license"].'</td>
                            </tr>
                            ';
                        }
                        ?>
                    </table>
                </div>
   </div>  
  </div>
    </body>   
<style>
.removeRow
{
    background-color: #FF0000;
    color:#FFFFFF;
}
</style>
<script>  
$(document).ready(function(){ 

    $('.delete_checkbox').click(function(){
        if($(this).is(':checked'))
        {
            $(this).closest('tr').addClass('removeRow');
        }
        else
        {
            $(this).closest('tr').removeClass('removeRow');
        }

    });

    $('#delete_all').click(function(){
       

       
             var checkbox = $('.delete_checkbox:checked');
            if(checkbox.length > 0)
            { 
                if (confirm('Bạn có muốn xóa không')) {
                    var checkbox_value = [];
                    $(checkbox).each(function(){
                        checkbox_value.push($(this).val());
                    });

                    $.ajax({
                        url:"car/delete.php",
                        method:"POST",
                        data:{checkbox_value:checkbox_value},
                        success:function()
                        {
                            $('.removeRow').fadeOut(1500);
                        }
                    }); 
                }
                 else{
                        return false;
                }
            }
            else
            {
                alert("Bạn chưa chọn dữ liệu cần xóa");
            }
    });

});  

</script>


