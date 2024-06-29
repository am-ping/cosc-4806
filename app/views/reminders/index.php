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
            <label for="subject">Create a reminder:</label>
            <input required type="text" class="form-control" name="subject" placeholder="Enter subject">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
    </form>
    <br>
    <div class="card-group">
        <?php
            foreach ($data['reminders'] as $reminder) { ?>
                <div class="card text-bg-primary p-2" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title"><? echo $reminder['subject'] ?></h5>
                    <a href="/reminders/update/?id=<? echo $reminder['id'];?>" class="card-link">Update</a>
                    <a href="/reminders/delete/?id=<? echo $reminder['id'];?>" class="card-link">Delete</a>
                  </div>
                </div>
            <?
            }
        ?>
    </div>
    
    <?php require_once 'app/views/templates/footer.php' ?>