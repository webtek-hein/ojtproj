<!-- Start Page Content -->
<!-- ============================================================== -->

<!--
==================================================
Slider Section Start
================================================== -->
<section id="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="block wow fadeInUp" data-wow-delay=".3s">
                    <!-- Slider -->
                    <section class="cd-intro">
                        <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">
                            <span>WELCOME TO SCIS RECRUITMENT PORTAL</span><br>
                        </h1>
                    </section> <!-- cd-intro -->
                    <!-- /.slider -->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title text-success">New Users</h4>
                        <div>
                            <h2 id="newUsr" class="font-light m-b-0"></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title text-success">Messages</h4>
                        <div>
                            <h2 id="newMsg" class="font-light m-b-0"></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#main-slider-->

<!--
==================================================
Upcoming Events  Start
================================================== -->
<section id="about">
    <div class="container">
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Upcoming Events</h1>
                        <div class="table-responsive m-t-40">
                            <input id="position" type="hidden"
                                   value="<?= $this->session->userdata['logged_in']['userType'] ?>">
                            <table id="events" class="table stylish-table">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
</section> <!-- /#upcomingevents -->

<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->