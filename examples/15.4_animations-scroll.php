<?php require_once('../header.php'); ?>

    <div class="section align-center gradient">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h1>Animating on Scroll</h1>
                    <p>Without the <b>data-scroll</b> attribute, animations would fire too early, before they are scrolled into view.</p>
                    <a class="button" href="https://github.com/gospotcheck/styleguide/#15.4"><i class="material-icons left">chevron_left</i> Back to Readme</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>Prologue and Epilogue to Romeo &amp; Juliet</h3>
                </div>
            </div>

            <div class="row">
                <div class="width-50">
                    <p>Two households, both alike in dignity,<br>
                    In fair Verona, where we lay our scene,<br>
                    From ancient grudge break to new mutiny,<br>
                    Where civil blood makes civil hands unclean.<br>
                    From forth the fatal loins of these two foes<br>
                    A pair of star-cross'd lovers take their life;<br>
                    Whose misadventured piteous overthrows<br>
                    Do with their death bury their parents' strife.<br>
                    The fearful passage of their death-mark'd love,<br>
                    And the continuance of their parents' rage,<br>
                    Which, but their children's end, nought could remove,<br>
                    Is now the two hours' traffic of our stage;<br>
                    The which if you with patient ears attend,<br>
                    What here shall miss, our toil shall strive to mend.</p>
                </div>
                <div class="width-50">
                    <p>But I can give thee more:<br>
                    For I will raise her statue in pure gold;<br>
                    That while Verona by that name is known,<br>
                    There shall no figure at such rate be set<br>
                    As that of true and faithful Juliet.</p>
                    <p>As rich shall Romeo's by his lady's lie;<br>
                    Poor sacrifices of our enmity!</p>
                    <p>A glooming peace this morning with it brings;<br>
                    The sun, for sorrow, will not show his head:<br>
                    Go hence, to have more talk of these sad things;<br>
                    Some shall be pardon'd, and some punished:<br>
                    For never was a story of more woe<br>
                    Than this of Juliet and her Romeo.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section gradient">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3 class="animate-on-scroll" data-animation="fadeIn">This Header Fades In</h3>
                    <p class="animate-on-scroll" data-animation="fadeIn" data-animation-delay="500">Then this paragraph follows after a short delay, and then the image below follows after another short delay. Bananas!</p>
                    <img class="animate-on-scroll" data-animation="fadeIn" data-animation-delay="1000" src="../images/dev/gallery-2.jpg">
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>Romeo &amp; Juliet, Animated Edition</h3>
                </div>
            </div>

            <div class="row">
                <div class="animate-on-scroll width-50" data-animation="fadeInLeft">
                    <p>Two households, both alike in dignity,<br>
                    In fair Verona, where we lay our scene,<br>
                    From ancient grudge break to new mutiny,<br>
                    Where civil blood makes civil hands unclean.<br>
                    From forth the fatal loins of these two foes<br>
                    A pair of star-cross'd lovers take their life;<br>
                    Whose misadventured piteous overthrows<br>
                    Do with their death bury their parents' strife.<br>
                    The fearful passage of their death-mark'd love,<br>
                    And the continuance of their parents' rage,<br>
                    Which, but their children's end, nought could remove,<br>
                    Is now the two hours' traffic of our stage;<br>
                    The which if you with patient ears attend,<br>
                    What here shall miss, our toil shall strive to mend.</p>
                </div>
                <div class="animate-on-scroll width-50" data-animation="fadeInRight" data-animation-delay="1000">
                    <p>But I can give thee more:<br>
                    For I will raise her statue in pure gold;<br>
                    That while Verona by that name is known,<br>
                    There shall no figure at such rate be set<br>
                    As that of true and faithful Juliet.</p>
                    <p>As rich shall Romeo's by his lady's lie;<br>
                    Poor sacrifices of our enmity!</p>
                    <p>A glooming peace this morning with it brings;<br>
                    The sun, for sorrow, will not show his head:<br>
                    Go hence, to have more talk of these sad things;<br>
                    Some shall be pardon'd, and some punished:<br>
                    For never was a story of more woe<br>
                    Than this of Juliet and her Romeo.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section gradient">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>Cascading Images</h3>
                </div>
            </div>
            
            <div class="row align-center">
                <div class="width-33">
                    <img class="animate-on-scroll" data-animation="bounceIn" src="../images/dev/gallery-3.jpg">
                </div>
                <div class="width-33">
                    <img class="animate-on-scroll" data-animation="bounceIn" data-animation-delay="200" src="../images/dev/gallery-4.jpg">
                </div>
                <div class="width-33">
                    <img class="animate-on-scroll" data-animation="bounceIn" data-animation-delay="400" src="../images/dev/gallery-3.jpg">
                </div>
            </div>
        </div>
    </div>

<?php require_once('../footer.php'); ?>