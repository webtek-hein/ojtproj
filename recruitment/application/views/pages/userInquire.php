<section id="service-page" class="pages service-page">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-5">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center">NOTE</h2>
                        <p>Messages will be sent to the admin.</p>
                    </div>
                    <div class="body">

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center">MESSAGE</h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="Recruitments/inquire">
                            <div class="body table-responsive form-group">
                                <label>To: </label>
                                <?php if ($this->session->flashdata('err-message')) {
                                    echo '<br><div class="inv-err-msg">
                                          <p class="text-danger">'
                                        . $this->session->flashdata('err-message') . '
                                          </p></div>';
                                } else if ($this->session->flashdata('success-message')) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Message successfully sent.")';
                                    echo '</script>';
                                }else if ($this->session->flashdata('failed-message')){
                                    echo '<script language="javascript">';
                                    echo 'alert("Message not sent.")';
                                    echo '</script>';
                                }
                                ?>
                                <input type="email" placeholder="@example: 2143735@slu.edu.ph" name="to"
                                       class="form-control">
                            </div>
                            <div class="body table-responsive form-group">
                                <label>Message: </label>
                                <textarea name="message" rows="20" cols="70" class="form-control"></textarea>
                            </div>
                            <button type="submit" onclick="">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
