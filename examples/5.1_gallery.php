<?php require_once('../header.php'); ?>

    <div class="section align-center gradient">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h1>Galleries</h1>
                    <p>Specify how many items per row you want and gallery will take care of the rest. Support for 2-5 items per row.</p>
                    <a class="button" href="https://github.com/gospotcheck/styleguide/#5.1"><i class="material-icons left">chevron_left</i> Back to Readme</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section topo padding-double">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>Galleries make displaying grids of content a breeze</h3>
                    <p>This is an example of a 3 item gallery with captions inside.</p>
                </div>
            </div>

            <div class="row">
                <div class="width-100">
                    <div class="gallery-3">
                        <!-- NOTE: the max-height inline style on the figure elements is for this example only - the assumption is that you will crop images to fit, either manually or with a tool like Timthumb -->
                        <?php for ($i = 1; $i < 10; $i++) :
                            echo
                            '<article>
                                <figure style="max-height: 200px;">
                                    <img src="../images/dev/gallery-' . $i . '.jpg">
                                    <figcaption>I bet you wish you took this photo.</figcaption>
                                </figure>
                            </article>';
                        endfor;
                        ?>
                    </div> <!-- // gallery-3 -->
                </div>
            </div>
        </div>
    </div>

    <div class="section dark gradient padding-double">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>Another Gallery with Different Captions</h3>
                    <p>Give your figcaption a class of "light" to change the caption's appearance.</p>
                </div>
            </div>

            <div class="row">
                <div class="width-100">
                    <div class="gallery-4">
                        <!-- NOTE: the max-height inline style on the figure elements is for this example only - the assumption is that you will crop images to fit, either manually or with a tool like Timthumb -->
                        <?php for ($i = 1; $i < 9; $i++) :
                            echo
                            '<article>
                                <figure style="max-height: 140px;">
                                    <img src="../images/dev/gallery-' . $i . '.jpg">
                                    <figcaption class="light">Light captions!</figcaption>
                                </figure>
                            </article>';
                        endfor;
                        ?>
                    </div> <!-- // gallery-4 -->
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-double">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>Last Gallery Example with Inside Captions and Icons</h3>
                    <p>Jazz up your caption and offer a link. Any <a href="https://github.com/gospotcheck/styleguide/#material-icons">Material Icon</a> (or other font icon library) is supported.</p>
                </div>
            </div>

            <div class="row">
                <div class="width-100">
                    <div class="gallery-3">
                        <?php for ($i = 1; $i < 4; $i++) :
                            // NOTE: the max-height inline style on the div  and figure elements below is for the example only - I didn't want to manually crop outsized photos
                            echo
                            '<article>
                                <figure>
                                    <div style="max-height: 295px;">
                                        <img src="../images/dev/gallery-' . $i . '.jpg">
                                    </div>
                                    <figcaption>
                                        This photo courtesy National Geographic.
                                        <a href="#">Download Photo <i class="material-icons float-right">get_app</i></a>
                                    </figcaption>
                                </figure>
                            </article>';
                        endfor;
                        ?>
                    </div> <!-- // gallery-3 -->
                </div>
            </div>
        </div>
    </div>

<?php require_once('../footer.php'); ?>