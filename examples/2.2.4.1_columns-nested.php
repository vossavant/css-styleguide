<?php require_once('../header.php'); ?>

    <div class="section align-center gradient">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h1>Nested Columns</h1>
                    <p>You can have columns within columns within columns...</p>
                    <a class="button" href="https://github.com/gospotcheck/styleguide/#2.2.4.1"><i class="material-icons left">chevron_left</i> Back to Readme</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-80">
                    <h3>Heading Inside Outer Row</h3>
                    <p>Lorem ipsum dolor sit amet, dipsum schmipsum quipsum.</p>

                    <div class="row">
                        <div class="width-33">
                            <p>I'm a 1/3 width column inside the outer row.</p>

                            <div class="row">
                                <div class="width-100">
                                    <p>I'm 100% width of the 1/3 row</p>
                                </div>
                            </div>
                        </div>
                        <div class="width-66">
                            <p>I'm a 2/3 width column inside the outer row.</p>

                            <div class="row">
                                <div class="width-50">
                                    <p>I'm 50% width of the 2/3 row</p>
                                </div>
                                <div class="width-50">
                                    <p>I'm 50% width of the 2/3 row</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once('../footer.php'); ?>