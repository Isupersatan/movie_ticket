<?php
session_start();

if(empty($_SESSION["admin_username"]))
{
    header("Location:index.php");
}

else
{
  
    include("admin_header.php");

    $con=new connec();
    $tbl="language";
$result=$con->select_all($tbl);

   ?>
       
            
            <section>
                <div class="continer-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-color:gold;color:black;">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="color:black;">Language Details</h5>
                            <a href="addlanguage.php">Add Language</a>
                             <table class="table mt-5" border=1 >
                                <thead style="background-color:gold;color:black;color:black">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if($result->num_rows>0)
                                    {
                                        while($row=$result->fetch_assoc())
                                        {
                                    ?>
                                    <tr>
                                        
                                        <td> <?php echo $row["id"]; ?></td>
                                        <td> <?php echo $row["lang_name"]; ?></td>
                                        
                                        <td>
                                            <a href="editlanguage.php?id=<?php echo $row["id"]; ?> " class="btn btn-primary">Edit</a>
                                        <a href="deletelanguage.php?id=<?php echo $row["id"]; ?>=" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                    <?php
                                    }

                                }

                                    ?>
                                </tbody>
                             </table>


                        </div>
                    </div>
                </div>
            </section>
                    
    <?php
     include("admin_footer.php");
}
?>