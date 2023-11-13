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
    $tbl="cinema";
$result=$con->select_all($tbl);

   ?>
       
            
            <section>
                <div class="continer-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-color:gold;color:black;">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="color:black;">Cinema Details</h5>
                            <a href="addcinema.php">Add Cinema</a>
                             <table class="table mt-5" border=1 >
                                <thead style="background-color:gold;color:black;color:black">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>City</th>
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
                                        <td> <?php echo $row["name"]; ?></td>
                                        <td> <?php echo $row["location"]; ?></td>
                                        <td> <?php echo $row["city"]; ?></td>
                                        <td>
                                            <a href="editcinema.php?id=<?php echo $row["id"]; ?> " class="btn btn-primary">Edit</a>
                                        <a href="deletecinema.php?id=<?php echo $row["id"]; ?>=" class="btn btn-danger">Delete</a></td>
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