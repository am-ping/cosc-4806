<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($_SESSION['controller']);?></li>
                  </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1>Reports</h1>
            </div>
        </div>
    </div>
    <h2 class="text-center text-bg-success rounded p-2">User with the most reminders: <? echo $data['most_reminders_user'][0]['username']; ?></h2>
    <h2 class="text-center">All Reminders</h2>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-bg-success">ID</th>
                <th scope="col" class="text-bg-success">User</th>
                <th scope="col" class="text-bg-success">Reminder</th>
                <th scope="col" class="text-bg-success">Created</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['reminders'] as $reminder) { ?>
                <tr>
                    <th scope="row"><? echo $reminder['user_id'] ?></th>
                    <td><? echo $reminder['username'] ?></td>
                    <td><? echo $reminder['subject'] ?></td>
                    <td><? echo $reminder['created_at'] ?></td>
                </tr>
            <?
            }
            ?>
        </tbody>
    </table>
    <h2 class="text-center">Total Logins by Username</h2>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-bg-success">Username</th>
                <th scope="col" class="text-bg-success">Total Logins</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['total_logins'] as $login) { ?>
                <tr>
                    <td><? echo $login['username']; ?></td>
                    <td><? echo $login['total_logins']; ?></td>
                </tr>
            <?
            }
            ?>
        </tbody>
    </table>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>