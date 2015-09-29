<?php require_once('../header.php'); ?>

    <div class="section align-center gradient">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h1>Utility Class: Align Left</h1>
                    <p>Aligns content (text and images) to the left. Also applies to a parent with <b>display: flex</b>, and aligns child content to the left of the parent. Since this is the default alignment, this class need only be used to override a different alignment.</p>
                    <a class="button" href="https://github.com/gospotcheck/styleguide/#17.1.3"><i class="material-icons left">chevron_left</i> Back to Readme</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section align-center off-white">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h3>This whole section is center aligned</h3>
                </div>

                <div class="width-50">
                    <p>That means that all children of this section will automatically inherit the center alignment.</p>
                    <img src="../images/dev/gallery-6.jpg" style="width: 200px;">
                </div>
                <div class="width-50 align-left">
                    <p>But you can override that alignment for individual columns by using this special class. Pretty neat, eh?</p>
                    <img src="../images/dev/gallery-6.jpg" style="width: 200px;">
                </div>
            </div>
        </div>
    </div>

    <div class="section dark grad">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>Children Centered within a Flexbox Parent</h3>
                    <p>When children of a flexbox don't take up the full width of the parent, the parent alignment will determine their placement. Here, the children are centered within the available space.</p>
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
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section dark grad">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>Children Left-Aligned within a Flexbox Parent</h3>
                    <p>With application of the <b>align-left</b> class, the children move to the far left. More specific <b>align-center</b> classes keep the contents of the children centered.</p>
                    <ul class="flex icon align-left">
                        <li class="width-33 align-center hyperlinked">
                            <img src="../images/dev/data.svg">
                            <h4>Retail Execution</h4>
                            <p>Providing field reps with a mobile data collection application is no longer beneficial; it's required.</p>
                            <a class="button light small" href="#">Details <i class="material-icons">keyboard_arrow_right</i></a>
                        </li>
                        <li class="width-33 align-center hyperlinked">
                            <img src="../images/dev/clock.svg">
                            <h4>Advanced Reporting</h4>
                            <p>To operate at the speed of modern retail, you need critical data, the moment you need it.</p>
                            <a class="button light small" href="#">Details <i class="material-icons">keyboard_arrow_right</i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php require_once('../footer.php'); ?>