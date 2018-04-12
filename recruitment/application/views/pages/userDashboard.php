<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $user_id = ($this->session->userdata['logged_in']['user_id']);
} else {
    redirect("logout");
}
?>



<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="assets/images/bg-01.jpg" width="600px" height="300px">
        </div>
        <div class="col-md-4">
            haha
        </div>
    </div>
</div>
