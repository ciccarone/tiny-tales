<?php require_once(__DIR__ . '/src/head.php'); ?>


<div class="container-fluid">
    <?php include_once(__DIR__ . '/src/header.php'); ?>

    <div class="app mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <p class="mb-0">Welcome to <?php echo getenv('APP_TITLE'); ?>, your delightful story companion for peaceful nights and magical dreams! Each story generated is created with love and care using artifical intellegence and designed to provide comfort, inspire dreams by using our vast collection of relevant prompts which ensure that every bedtime story is a unique experience, keeping children engaged and excited night after night.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <?php include_once(__DIR__ . '/src/elements/form.php'); ?>
                        </div>
                        <div class="col-6">
                            Story here
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once(__DIR__ . '/src/footer.php'); ?>
</div>