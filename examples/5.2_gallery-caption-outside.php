<?php require_once('../header.php'); ?>

    <div class="section align-center gradient">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h1>Galleries with Outside Captions</h1>
                    <p>Unless a height is explicitly set, gallery items will expand to fit their images. You can control this by resizing your images so they are all the same size.</p>
                    <a class="button" href="https://github.com/gospotcheck/styleguide/#5.2"><i class="material-icons left">chevron_left</i> Back to Readme</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section padding-double">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>Simple Example</h3>
                </div>
            </div>

            <div class="row">
                <div class="width-100">
                    <div class="gallery-4 captions-outside">
                        <!-- NOTE: the max-height inline styles on the figure elements are for this example only - the assumption is that you will crop images to fit, either manually or with a tool like Timthumb -->
                        <?php for ($i = 1; $i < 10; $i++) :
                            echo
                            '<article>
                                <figure style="max-height: 181px;">
                                    <div style="max-height: 145px;">
                                        <img src="../images/dev/gallery-' . $i . '.jpg">
                                    </div>
                                    <figcaption>This photo courtesy National Geographic.</figcaption>
                                </figure>
                            </article>';
                        endfor;
                        ?>
                    </div> <!-- // gallery-4 -->
                </div>
            </div>
        </div>
    </div>

    <div class="section topo padding-double">
        <div class="wrap">
            <div class="row align-center">
                <div class="width-100">
                    <h3>With Icons</h3>
                </div>
            </div>

            <div class="row">
                <div class="width-100">
                    <div class="gallery-2 captions-outside">
                        <!-- NOTE: the max-height inline styles on the figure elements are for this example only - the assumption is that you will crop images to fit, either manually or with a tool like Timthumb -->
                        <?php for ($i = 6; $i < 10; $i++) :
                            echo
                            '<article>
                                <figure style="max-height: 332px;">
                                    <div style="max-height: 303px;">
                                        <img src="../images/dev/gallery-' . $i . '.jpg">
                                    </div>
                                    <figcaption>This photo courtesy National Geographic.</figcaption>
                                    <p>381 <i class="material-icons float-right" style="color: #c00;">favorite</i></p>
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