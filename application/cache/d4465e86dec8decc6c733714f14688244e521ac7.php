<?php $__env->startSection('content'); ?>
<style>
    .btn{
        min-height: 23vh;
        margin-top: 10px;
        font-size: 10vh;
    }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <button id="pauseBtn" class="btn btn-primary btn-block"><i class="fa fa-pause"></i></button>
        </div>
        <div class="col-md-4">
          <button id="startBtn" class="btn btn-success btn-block"><i class="fa fa-play"></i></button>
        </div>
        <div class="col-md-4">
          <button id="stopBtn" class="btn btn-danger btn-block"><i class="fa fa-stop"></i></button>
        </div>
      </div>
    </div>
  </section>
  </div><!-- ./wrapper -->

    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script>
    // Function to send the current timer value to Page A
function sendTimerValue(time) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '<?= base_url() ?>application/views/contents/papan-skor/page_a_timer.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('time=' + encodeURIComponent(time));
}

// Timer logic
let timerInterval;
let timerPaused = false;
let millisecondsRemaining = 0;

function updateTimerDisplay() {
    let hours = Math.floor(millisecondsRemaining / 3600000);
    let minutes = Math.floor((millisecondsRemaining % 3600000) / 60000);
    let seconds = Math.floor((millisecondsRemaining % 60000) / 1000);
    let milliseconds = millisecondsRemaining % 1000;

    let formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    sendTimerValue(formattedTime); // Send the current time to Page A
}

function startTimer() {
    if (timerPaused) {
        timerPaused = false;
    } else {
        millisecondsRemaining = 120000; // Set the timer to the initial value (10 seconds)
        const audio = new Audio('<?= base_url() ?>dist/sounds/sempritan.mp3');
        audio.play();
    }

    updateTimerDisplay();

    timerInterval = setInterval(function () {
        if (millisecondsRemaining > 0) {
            millisecondsRemaining -= 1000; // ini waktu intervalnya jadi jamnya berubah setiap 1 detik
            updateTimerDisplay();
        } else {
            const audio = new Audio('<?= base_url() ?>dist/sounds/timer-habis.mp3');
            audio.play();
            stopTimer();
        }
    }, 1000); // ini waktu intervalnya jadi jamnya berubah setiap 1 detik
}

function pauseTimer() {
    timerPaused = true;
    clearInterval(timerInterval);
}

function stopTimer() {
    timerPaused = false;
    clearInterval(timerInterval);
    millisecondsRemaining = 0;
    updateTimerDisplay();
}

document.getElementById('startBtn').addEventListener('click', startTimer);
document.getElementById('pauseBtn').addEventListener('click', pauseTimer);
document.getElementById('stopBtn').addEventListener('click', stopTimer);
  </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.themplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/www/penjurian/application/views/contents/papan-skor/tombol.blade.php ENDPATH**/ ?>