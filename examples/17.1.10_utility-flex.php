<?php require_once('../header.php'); ?>

    <div class="section align-center gradient">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h1>Utility Class: Flex</h1>
                    <p>Applies the <code>display: flex</code> property to an element.</p>
                    <a class="button" href="https://github.com/gospotcheck/styleguide/#17.1.10"><i class="material-icons left">chevron_left</i> Back to Readme</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section align-center">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h3>Without display: flex</h3>
                    <p>Sometimes, it can be helpful to apply this class to an element that isn't a flexbox. Elements with the "row" class always have flexbox, but sometimes you don't want to add a new row. The unordered list below has list item children that only display properly if the unordered list has display: flex. Here is what it looks like without the "flex" class:</p>
                    <ul class="icon">
                        <li class="width-33 hyperlinked">
                            <img src="../images/dev/data.svg">
                            <h4>Retail Execution</h4>
                            <p>Providing field reps with a mobile data collection application is no longer beneficial; it's required.</p>
                            <a class="button light small" href="#">Details <i class="material-icons">keyboard_arrow_right</i></a>
                        </li>
                        <li class="width-33 hyperlinked">
                            <img src="../images/dev/clock.svg">
                            <h4>Advanced Reporting</h4>
                            <p>To operate at the speed of modern retail, you need critical data, the moment you need it.</p>
                            <a class="button light small" href="#">Details <i class="material-icons">keyboard_arrow_right</i></a>
                        </li>
                        <li class="width-33 hyperlinked">
                            <img src="../images/dev/photos.svg">
                            <h4>Audits &amp; Compliance</h4>
                            <p>Providing field reps with a mobile data collection application is no longer beneficial; it's required.</p>
                            <a class="button light small" href="#">Details <i class="material-icons">keyboard_arrow_right</i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section gradient align-center">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h3>With display: flex</h3>
                    <p>Adding the "flex" class to the unordered list gets the list item children to line up properly. No extra "row" element required.</p>
                    <ul class="flex icon">
                        <li class="width-33 hyperlinked">
                            <img src="../images/dev/data.svg">
                            <h4>Retail Execution</h4>
                            <p>Providing field reps with a mobile data collection application is no longer beneficial; it's required.</p>
                            <a class="button light small" href="#">Details <i class="material-icons">keyboard_arrow_right</i></a>
                        </li>
                        <li class="width-33 hyperlinked">
                            <img src="../images/dev/clock.svg">
                            <h4>Advanced Reporting</h4>
                            <p>To operate at the speed of modern retail, you need critical data, the moment you need it.</p>
                            <a class="button light small" href="#">Details <i class="material-icons">keyboard_arrow_right</i></a>
                        </li>
                        <li class="width-33 hyperlinked">
                            <img src="../images/dev/photos.svg">
                            <h4>Audits &amp; Compliance</h4>
                            <p>Providing field reps with a mobile data collection application is no longer beneficial; it's required.</p>
                            <a class="button light small" href="#">Details <i class="material-icons">keyboard_arrow_right</i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php require_once('../footer.php'); ?>