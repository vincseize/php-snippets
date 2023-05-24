<?php

/**
 * Disk Status Class - Example
 *
 * http://pmav.eu/stuff/php-disk-status/
 *
 * 22/Aug/2009
 */

require_once 'php/DiskStatus.class.php';
require_once 'php/Mobile-Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;

// $agent = $_SERVER['HTTP_USER_AGENT'];

// if(preg_match('/Linux/',$agent)) $os = 'Linux';
// elseif(preg_match('/Win/',$agent)) $os = 'Windows';
// elseif(preg_match('/Mac/',$agent)) $os = 'Mac';
// else $os = 'UnKnown';

// set partition
// if( $os == 'Linux')  $fs = "/";
// elseif($os == 'Windows') $fs = 'c:';
 
$fs = "/";
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $fs = 'c:';
} else {
    $fs = "/";
}


// echo $os;

try {

  $diskStatus = new DiskStatus($fs);

  $usedBg = " usedBgGreen ";
  $barWidthPx = 400;

  $totalSpace = $diskStatus->totalSpace();
  $freeSpace = $diskStatus->freeSpace();
  $usedSpace = explode(" ",$totalSpace)[0]-explode(" ",$freeSpace)[0]." ".explode(" ",$freeSpace)[1];
  $usedSpaceP = $diskStatus->usedSpace();
  $barWidth = ($usedSpaceP/100) * $barWidthPx;

    if( $usedSpaceP < 30)  $usedBg = " usedBgGreen ";
    elseif($usedSpaceP > 30) $usedBg = " usedBgBlue ";
    elseif($usedSpaceP > 60) $usedBg = " usedBgOrange ";
    elseif($usedSpaceP > 80) $usedBg = " usedBgRed ";
  

} catch (Exception $e) {
  echo 'Error ('.$e->getMessage().')';
  exit();
}

?>

<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <style>
        .aParent div{
            float: left;
            clear: none; 
            font-size: 10px;
        }

      .disk{
        border: 1px solid grey;
        width: <?= $barWidthPx ?>px;
        padding: 2px;
      }

      .used {
        display block;
        text-align: right;
        padding: 0 0 0 0;
        color: white;
        width: <?= $barWidth ?>px;
      }

      .usedBgGreen {
        background: #1CAC78;
      }

      .usedBgBlue {
        background: #318CE7;
      }

      .usedBgOrange {
        background: orange;
      }

      .usedBgRed {
        background: red;
      }

      .total{
        padding: 2px;
        padding-left: 10px;
        color: grey;
      }

      @media (max-width : 640px) {
        .aParent div {
            font-size: 11px;
        }

        .disk{
            width: 40%;
        }

        .used {
            width: 40%;
      }

    }

    </style>

    <div class="aParent">
        <div class="disk">
            <div class="used <?= $usedBg ?>" styleX="width: <?= $barWidth ?>px"><?= $usedSpaceP ?>%&nbsp;</div>
        </div>
        <div class="total" style="float:right;">
            <?php
                if ( !$detect->isMobile() ) {
                    echo "Total : ".$totalSpace." | ";
                    echo "Free : ".$freeSpace." | ";
                    echo "Used : ".$usedSpace." | ";
                } else {
                    echo "Total : ".$totalSpace." | ";
                    echo "Free : ".$freeSpace." "; 
                }
                
            ?>
        </div>
    </div>
