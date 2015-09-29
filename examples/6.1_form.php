<?php require_once('../header.php'); ?>

    <div class="section align-center gradient">
        <div class="wrap">
            <div class="row">
                <div class="width-100">
                    <h1>Forms</h1>
                    <p>Pretty standard stuff.</p>
                    <a class="button" href="https://github.com/gospotcheck/styleguide/#6.1"><i class="material-icons left">chevron_left</i> Back to Readme</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section off-white">
        <div class="wrap">
            <div class="row">
                <div class="width-66">
                    <form action="" method="post">
                        <div class="row">
                            <div class="width-50">
                                <input name="firstname" placeholder="First name" required type="text">
                            </div>
                            <div class="width-50">
                                <input name="lastname" placeholder="Last name" required type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="width-50">
                                <input placeholder="Password" type="password">
                            </div>
                            <div class="width-50">
                                <input placeholder="Email" type="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="width-50">
                                <select name="province">
                                    <option selected value="">Choose your country</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Italy">Italy</option>
                                </select>
                            </div>
                            <div class="width-50">
                                <select name="province">
                                    <option selected value="">Choose your province</option>
                                    <option value="Agrigento">Agrigento</option>
                                    <option value="Asti">Asti</option>
                                    <option value="Bologna">Bologna</option>
                                    <option value="Florence">Florence</option>
                                    <option value="Genoa">Genoa</option>
                                    <option value="L'Aquila">L'Aquila</option>
                                    <option value="Mantua">Mantua</option>
                                    <option value="Modena">Modena</option>
                                    <option value="Parma">Parma</option>
                                    <option value="Trieste">Trieste</option>
                                </select>
                            </div>
                        </div>
                        <input placeholder="Enter your age" type="number">
                        <textarea placeholder="Leave some notes"></textarea>
                        <button class="button dark" type="submit" value="Let 'er Rip">Let 'er Rip <i class="material-icons">chevron_right</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require_once('../footer.php'); ?>