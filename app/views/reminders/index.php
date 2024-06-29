<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
            </div>
        </div>
    </div>
    
    <p>Create a new reminder</p>
    <form action="/reminders/create" method="post" >
        <div class="form-group">
            <label for="subject">Subject</label>
            <input required type="text" class="form-control" name="subject">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
    </form>

    <?php
        foreach ($data['reminders'] as $reminder) {
            echo "<p>" . $reminder['subject'] . ' <a href="/reminders/update">update</a> <a href="/reminders/delete">delete</a> ' . "</p>";
        }

    ?>
    
    <?php require_once 'app/views/templates/footer.php' ?>