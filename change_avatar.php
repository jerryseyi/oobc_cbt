<?php

$filepond = 'active';
require "header.php";
?>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Update Password</h2>
        </div>

        <div class="add-form">
            <form action="student_avatar.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-10">
                    <div class="input-box w-80 sm-mb-90 mb-0">
                        <label for="" style="margin-bottom: 10px">Change your profile picture.</label>
                        <div class="input-text-position">
                            <input type="file" class="filepond" name="image" required>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <input type="submit" name="change" value="Update" id="">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
