<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="/favicon.png">
    <title>COSC 4806</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
  </head>
  <body>
    <nav class="navbar navbar-dark navbar-expand-md bg-success mb-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">COSC 4806</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link text-bg-success" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-bg-success" href="/movie">Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-bg-success" href="/reminders">Reminders</a>
            </li>
            <?php
            if (isset($_SESSION["is_admin"])) {
              echo '<li class="nav-item">';
              echo '<a class="nav-link text-bg-success" href="/reports">Reports</a>';
              echo '</li>';
            }
            ?>
          </ul>
          <?php 
          if (isset($_SESSION["auth"])) {
            echo "<div class='mb-0 text-bg-success me-2'>" . $_SESSION['username'] . "</div>";
            echo "<a class='btn btn-info' href='/logout' type='button'>Logout</a>";
          } else  {
            echo "<a class='btn btn-info rounded-start rounded-0 border-end' href='/login' type='button'>Login</a>";
            echo "<a class='btn btn-info rounded-end rounded-0' href='/signup' type='button'>Sign Up</a>";
          }
          ?>
        </div>
      </div>
    </nav>