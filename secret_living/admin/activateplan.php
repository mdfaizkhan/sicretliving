<?php include("header.php");?>
<section id="middle">
    <header id="page-header">
            <h1>Activate Plan</h1>
    </header>
				
    <div id="content" class="dashboard padding-20">
        <div class="row">
        
            <!--<div class="col-md-6">
                <div class="panel panel-default mypanel ">
                    <div class="panel-heading panel-heading-transparent">
                            <strong>Activate My Plan</strong> 
                    </div>
                    <div class="panel-body">
                        <?php
                        /*$q2 = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `user_id` where uid = $mlmid"));
                        if(empty($q2["pin"]))
                        {*/
                        ?>
                        <form  id="ActivatePlan" method="post"  enctype="multipart/form-data">
                            <fieldset>
                                
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <label>Transaction Pin*</label>
                                            <div class="fancy-form">
                                                <i class="fa fa-barcode"></i>
                                                <input type="text"  placeholder = "Enter Transaction Pin" class = "form-control" name = "pin_no" id = "transpin" title = "Enter Transaction Pin!"  required>
                                            </div>
                                        </div>
                                         <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 text-center">
                                        <input type="hidden" name="uid" value="<?php echo $mlmid; ?>">
                                        <input type="hidden" name="type" value="UpgradeTopup">
                                            <button type="submit" name = "updatepin"  class="btn btn-info btn-md btn-submit formvalidate" data-form="ActivatePlan" > Activate Plan</button>
                                        </div>
                                         <div class="clearfix"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                        /*}
                        else
                        {*/
                        ?>
                            <!-- <div class="alert alert-success margin-bottom-30">
                                <strong>Well done!</strong> You have already selected a pack.
                            </div> -->

                        <?php
                        //}
                        ?>
                    <!--</div>
                </div>
            </div>-->
            <div class="col-md-6">
                <div class="panel panel-default mypanel ">
                    <div class="panel-heading panel-heading-transparent">
                            <strong>Activate Other User Plan</strong> 
                    </div>
                    <div class="panel-body">
                        <form  id="ActivatePlanall" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <label>Username*</label>
                                            <div class="fancy-form fancy-form-select"><!-- input -->
                                                <select class = "form-control select2" name = "uid" id = "username" required>
                                                <option value = "" selected disabled>Select Distributor</option>
                                                <?php

                                                /*$left_users = GetUserByPos($db,$mlmid,'L');
						                        $right_users = GetUserByPos($db,$mlmid,'R');
						                        $users=implode(',',array_merge($left_users,$right_users));*/
						                      //  echo "SELECT * FROM `user_id` WHERE uid in ($users) and uname != 'admin'";
                                                // $sql=mysqli_query($db,"SELECT * FROM `user_id` WHERE uid in ($users) and uname != 'admin'");
                                                $sql=mysqli_query($db,"SELECT * FROM `user_id` WHERE status = 1 and uid!=1");
                                                while($row = mysqli_fetch_assoc($sql))
                                                {
                                                ?>
                                                <option value = "<?php echo $row["uid"];?>"><?php echo $row["uname"];?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <label>Transaction Pin*</label>
                                            <select class = "form-control select2" name = "pin_no" id = "transpin" required>
                                                <option value = "" selected disabled>Select Transaction Pin</option>
                                                <?php
                                                $sql=mysqli_query($db,"SELECT t2.*,t3.* FROM transpin t2  join plans t3 on t2.plan_id = t3.plan_id and t2.allot_uid = 0 and t2.status = 0;");
                                                while($row = mysqli_fetch_assoc($sql))
                                                {
                                                ?>
                                                <option value = "<?php echo $row["pin_code"];?>"><?php echo "Rs.".$row['plan_amount']." - ".$row["pin_code"];?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 text-center">
                                            <input type="hidden" name="type" value="UpgradeTopup">
                                            <!--<button type="submit" name = "topupother"  class="btn btn-info btn-md btn-submit formvalidate" data-form="ActivatePlanall" > Activate Plan</button>-->
                                            <button type="button" name = "topupother1"  class="btn btn-info btn-md btn-submit formvalidate" data-uid="<?php echo $mlmid; ?>" data-form="ActivatePlanall" > Activate Plan</button>
                                        </div>
                                         <div class="clearfix"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>

<!-- /MIDDLE -->
<!--<div class="bootbox modal fade bootbox-prompt in password_verification" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Enter Your Transaction Password</h4>
            </div>
            <div class="modal-body">
                <div class="bootbox-body">
                    <form class="bootbox-form">
                        <input class="bootbox-input bootbox-input-password form-control" autocomplete="off" type="password">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="check_password" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>-->
<script>
    var mlmid = '<?php echo $mlmid;?>';
</script>
<?php include("footer.php");?>
