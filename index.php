
<!DOCTYPE html>
<?php
/*
  Created on : 26 May, 2019
  Author     : Girish Lokapure (lokapure.girish at gmail.com)
  Description: Framegame
 */

//ini_set('display_errors', 1);
//error_reporting(E_ALL);
require 'game/config/config.php';
?>



<html>
    <?php require 'layout/header.php'; ?>
    <body>

        <div class="container">
            <br/>
            <div class="row">
                <div class="col-md-1">
                    <button class="btn btn-primary" id="newGame">New Game</button>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-success" id="feed">Feed</button>
                </div>
            </div>
            <br/>

            <h2 id="result">Result :-</h2>                        

            <table class="table table-bordered feed_table">
                <thead>
                    <tr>
                        <th><img src="images/time.png" alt="Round"/></th>
                        <th><img src="images/farmer.png" alt="Famer"/></th>
                        <th><img src="images/cow.png" alt="Cow 1"/>1</th>
                        <th><img src="images/cow.png" alt="Cow 2"/>2</th>
                        <th><img src="images/bunny.png" alt="Bunny 1"/>1</th>
                        <th><img src="images/bunny.png" alt="Bunny 2"/>2</th>
                        <th><img src="images/bunny.png" alt="Bunny 3"/>3</th>
                        <th><img src="images/bunny.png" alt="Bunny 4"/>4</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </body>
</html>
