<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
            </div>
        </div>
    </div>
    
    <form action="/reminders/create" method="post" >
        <div class="form-group">
            <label for="subject">Create a new reminder:</label>
            <input required type="text" class="form-control" name="subject" placeholder="Enter subject">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
    </form>
    <br>
    <div class="d-flex flex-wrap justify-content-start gap-3">
        <?php
            foreach ($data['reminders'] as $reminder) { ?>
                <div class="card text-bg-primary p-1" style="width: 18rem;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title"><? echo $reminder['subject'] ?></h5>
                            <a class="btn-close" aria-label="Close" href="/reminders/delete/?id=<? echo $reminder['id'];?>"></a>
                        </div>
                        <form action="/reminders/update/?id=<? echo $reminder['id'];?>" method="post" >
                            <div class="form-group">
                                <input required type="text" class="form-control" name="new_subject" placeholder="New subject">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?
            }
        ?>
    </div>
    
    <?php require_once 'app/views/templates/footer.php' ?>